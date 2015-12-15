<?php

namespace App\Repositories\Backend\Role;

use App\Exceptions\GeneralException;
use App\Models\Role;

/**
 * Class RoleRepository
 * @package App\Repositories\Backend\Role
 */
class RoleRepository implements RoleContract
{

    /**
     * @param            $id
     * @param bool|false $withPermissions
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws GeneralException
     */
    public function find($id, $withPermissions = false)
    {
        $role = Role::find($id);
        if (!is_null($role)) {
            if ($withPermissions) {
                return Role::with('permissions')->find($id);
            }
            return $role;
        }
        throw new GeneralException('That role does not exist.');
    }
    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Role::with('permissions')->orderBy($order_by, $sort)->paginate($per_page);
    }
    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllRoles($order_by = 'id', $sort = 'asc', $withPermissions = false)
    {
        if ($withPermissions) {
            return Role::with('permissions')->orderBy($order_by, $sort)->get();
        }
        return Role::orderBy($order_by, $sort)->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        if (Role::where('role_name', $input['role_name'])->first()) {
            throw new GeneralException('That role already exists. Please choose a different name.');
        }

        if (count($input['assignees_permissions']) == 0) {
            throw new GeneralException('You must select at least one permission for this role.');
        }
        $role       = new Role;
        $role->role_name = $input['role_name'];
        $role->role_slug = $input['role_slug'];
        $role->role_description = $input['role_description'];
        if ($role->save()) {
            $current     = $input['assignees_permissions'];
            $permissions = [];
            if (count($current)) {
                foreach ($current as $perm) {
                    if (is_numeric($perm)) {
                        array_push($permissions, $perm);
                    }
                }
            }
            $role->attachPermissions($permissions);
            return true;
        }
        throw new GeneralException('There was a problem creating this role. Please try again.');
    }
    /**
     * @param  $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $role = $this->find($id);
        if (count($input['assignees_permissions']) == 0) {
            throw new GeneralException('You must select at least one permission for this role.');
        }
        $role->role_name = $input['role_name'];
        $role->role_slug = $input['role_slug'];
        $role->role_description = $input['role_description'];
        if ($role->save()) {
            //Remove all roles first
            $role->permissions()->sync([]);
            //Attach permissions if the role does not have all access
            $current     = $input['assignees_permissions'];
            $permissions = [];
            if (count($current)) {
                foreach ($current as $perm) {
                    if (is_numeric($perm)) {
                        array_push($permissions, $perm);
                    }
                }
            }
            $role->attachPermissions($permissions);
            return true;
        }
        throw new GeneralException('There was a problem updating this role. Please try again.');
    }
    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        //Would be stupid to delete the administrator role
        if ($id == 1) //id is 1 because of the seeder
        {
            throw new GeneralException('You can not delete the Administrator role.');
        }
        $role = $this->find($id, true);
        //Don't delete the role is there are users associated
        if ($role->users()->count() > 0) {
            throw new GeneralException('You can not delete a role with associated users.');
        }
        //Detach all associated roles
        $role->permissions()->sync([]);
        if ($role->delete()) {
            return true;
        }
        throw new GeneralException('There was a problem deleting this role. Please try again.');
    }
    /**
     * @return mixed
     */
    public function getDefaultUserRole()
    {
        if (is_numeric(config('access.users.default_role'))) {
            return Role::where('id', (int) config('access.users.default_role'))->first();
        }
        return Role::where('name', config('access.users.default_role'))->first();
    }
}
