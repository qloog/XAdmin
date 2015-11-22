<?php

namespace App\Repositories\Backend\Role;

use App\Models\Role;

class RoleRepository implements RoleContract
{

    /**
     * Create a new DbUserRepository instance.
     * @param Role $album
     */
    public function __construct(Role $album)
    {
        $this->model = $album;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id) {
        $obj = $this->model->findOrNew($id);
        if (! is_null($obj)) return $obj;
        return array();
    }

    /**
     * @param string $order_by
     * @param string $sort
     * @param bool $withPermissions
     * @return mixed
     */
    public function getAllRoles($order_by = 'sort', $sort = 'asc', $withPermissions = false) {
        if ($withPermissions) {
            return Role::with('permissions')->orderBy($order_by, $sort)->get();
        }
        return Role::orderBy($order_by, $sort)->get();
    }

}
