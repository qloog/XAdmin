<?php namespace App\Repositories\Permission;

interface PermissionContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
