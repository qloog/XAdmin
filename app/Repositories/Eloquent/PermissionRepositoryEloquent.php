<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\PermissionRepository;
use App\Contracts\Repositories\RoleRepository;
use App\Models\Permission;

/**
 * Class PermissionRepositoryEloquent
 * @package namespace App\Repositories\Eloquent\Backend;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        $permission = new Permission;
        $permission->name = $input['name'];
        $permission->display_name = $input['display_name'];
        $permission->description = $input['description'];
        if ($permission->save()) {
            //For each role, load role, collect perms, add perm to perms, flush perms, read perms
            //if (isset($input['permission_roles']) && count($input['permission_roles']) > 0) {
            //    foreach ($input['permission_roles'] as $role_id) {
            //        //Get the role
            //        $role = $this->roles->find($role_id);
            //        //Get the roles permissions into an array
            //        $role_permissions = $role->permissions->lists('id')->all();
            //        if (count($role_permissions) >= 1) {
            //            //Role has permissions, gather them first
            //            //Add this new permission id to the role
            //            array_push($role_permissions, $permission->id);
            //            //For some reason the lists() casts as a string, convert all to int
            //            $role_permissions_temp = array();
            //            foreach ($role_permissions as $rp) {
            //                array_push($role_permissions_temp, (int) $rp);
            //            }
            //            $role_permissions = $role_permissions_temp;
            //            //Sync the permissions to the role
            //            $role->permissions()->sync($role_permissions);
            //        } else {
            //            //Role has no permissions, add the 1
            //            $role->permissions()->sync([$permission->id]);
            //        }
            //    }
            //}
            return true;
        }
        throw new GeneralException('There was a problem creating this permission. Please try again.');
    }
}
