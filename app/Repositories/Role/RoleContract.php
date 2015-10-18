<?php namespace App\Repositories\Role;

interface RoleContract
{
    
    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
