<?php

namespace App\Repositories\Backend\Role;

interface RoleContract
{

    public function getAllRoles($order_by = 'sort', $sort = 'asc', $withPermissions = false);

}
