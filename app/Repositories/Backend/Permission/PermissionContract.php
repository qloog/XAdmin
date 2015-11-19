<?php

namespace App\Repositories\Backend\Permission;

interface PermissionContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
