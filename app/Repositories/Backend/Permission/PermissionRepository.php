<?php

namespace App\Repositories\Backend\Permission;

use App\Models\Permission;
use App\Repositories\Backend\Role\RoleContract;

/**
 * Class PermissionRepository
 * @package App\Repositories\Backend\Permission
 */
class PermissionRepository implements PermissionContract
{

    /**
     * @var RoleContract
     */
    protected $roles;


    /**
     * @param RoleContract $roles
     */
    public function __construct(RoleContract $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param  $id
     * @param  bool                                                                             $withRoles
     * @throws GeneralException
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
     */
    public function find($id, $withRoles = false)
    {
        if (!is_null(Permission::find($id))) {
            if ($withRoles) {
                return Permission::with('roles')->find($id);
            }
            return Permission::find($id);
        }
        throw new GeneralException('That permission does not exist.');
    }
    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getPermissionsPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Permission::with('roles')->orderBy($order_by, $sort)->paginate($per_page);
    }
    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withRoles
     * @return mixed
     */
    public function getAllPermissions($order_by = 'id', $sort = 'asc', $withRoles = true)
    {
        if ($withRoles) {
            return Permission::with('roles')->orderBy($order_by, $sort)->get();
        }
        return Permission::orderBy($order_by, $sort)->get();
    }

    /**
     * @param  $input
     * @param  $roles
     * @throws GeneralException
     * @return bool
     */
    public function create($input, $roles)
    {
        $permission               = new Permission;
        $permission->name         = $input['name'];
        $permission->display_name = $input['display_name'];
        $permission->system       = isset($input['system']) ? 1 : 0;
        $permission->group_id     = isset($input['group']) && strlen($input['group']) > 0 ? (int) $input['group'] : null;
        $permission->sort         = isset($input['sort']) ? (int) $input['sort'] : 0;
        if ($permission->save()) {
            //For each role, load role, collect perms, add perm to perms, flush perms, read perms
            if (count($roles['permission_roles']) > 0) {
                foreach ($roles['permission_roles'] as $role_id) {
                    //Get the role, with permissions
                    $role = $this->roles->findOrThrowException($role_id, true);
                    //Get the roles permissions into an array
                    $role_permissions = $role->permissions->lists('id')->all();
                    if (count($role_permissions) >= 1) {
                        //Role has permissions, gather them first
                        //Add this new permission id to the role
                        array_push($role_permissions, $permission->id);
                        //For some reason the lists() casts as a string, convert all to int
                        $role_permissions_temp = array();
                        foreach ($role_permissions as $rp) {
                            array_push($role_permissions_temp, (int) $rp);
                        }
                        $role_permissions = $role_permissions_temp;
                        //Sync the permissions to the role
                        $role->permissions()->sync($role_permissions);
                    } else {
                        //Role has no permissions, add the 1
                        $role->permissions()->sync([$permission->id]);
                    }
                }
            }
            //Add the dependencies of this permission if any
            if (isset($input['dependencies']) && count($input['dependencies'])) {
                foreach ($input['dependencies'] as $dependency_id) {
                    $this->dependencies->create($permission->id, $dependency_id);
                }
            }
            return true;
        }
        throw new GeneralException('There was a problem creating this permission. Please try again.');
    }
    /**
     * @param  $id
     * @param  $input
     * @param  $roles
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $permission                         = $this->find($id);
        $permission->permission_name        = $input['permission_name'];
        $permission->permission_slug        = $input['permission_slug'];
        $permission->permission_description = $input['permission_description'];

        if ($permission->save()) {
            //Detach permission from every role, then add the permission to the selected roles
            $currentRoles = $this->roles->getAllRoles();
            foreach ($currentRoles as $role) {
                $role->detachPermission($permission);
            }
//            if (count($roles['permission_roles']) > 0) {
//                //For each role, load role, collect perms, add perm to perms, flush perms, read perms
//                foreach ($roles['permission_roles'] as $role_id) {
//                    //Get the role, with permissions
//                    $role = $this->roles->findOrThrowException($role_id, true);
//                    //Get the roles permissions into an array
//                    $role_permissions = $role->permissions->lists('id')->all();
//                    if (count($role_permissions) >= 1) {
//                        //Role has permissions, gather them first
//                        //Add this new permission id to the role
//                        array_push($role_permissions, $permission->id);
//                        //For some reason the lists() casts as a string, convert all to int
//                        $role_permissions_temp = array();
//                        foreach ($role_permissions as $rp) {
//                            array_push($role_permissions_temp, (int) $rp);
//                        }
//                        $role_permissions = $role_permissions_temp;
//                        //Sync the permissions to the role
//                        $role->permissions()->sync($role_permissions);
//                    } else {
//                        //Role has no permissions, add the 1
//                        $role->permissions()->sync([$permission->id]);
//                    }
//                }
//            }
            return true;
        }
        throw new GeneralException('There was a problem updating this permission. Please try again.');
    }
    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $permission = $this->find($id);
        if ($permission->system == 1) {
            throw new GeneralException('You can not delete a system permission.');
        }
        //Remove the permission from all associated roles
        $currentRoles = $permission->roles;
        foreach ($currentRoles as $role) {
            $role->detachPermission($permission);
        }

        if ($permission->delete()) {
            return true;
        }
        throw new GeneralException('There was a problem deleting this permission. Please try again.');
    }
}
