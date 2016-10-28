<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\RoleRepository;
use App\Models\Role;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Repositories\Eloquent\Backend;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
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
        if (Role::where('name', '=', $input['name'])->first()) {
            throw new GeneralException('That role already exists. Please choose a different name.');
        }

        if (isset($input['assignees_permissions']) && count($input['assignees_permissions']) == 0) {
            throw new GeneralException('You must select at least one permission for this role.');
        }
        $role = new Role;
        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->description = $input['description'];
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
    public function update(array $input, $id)
    {
        $role = Role::find($id);
        if (count($input['assignees_permissions']) == 0) {
            throw new GeneralException('You must select at least one permission for this role.');
        }

        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->description = $input['description'];
        if ($role->save()) {
            $role->savePermissions($input['assignees_permissions']);
            return true;
        }
        throw new GeneralException('There was a problem updating this role. Please try again.');
    }
}
