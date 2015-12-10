<?php

namespace App\Repositories\Backend\User;

interface UserContract
{

    public function find($id);

    public function getUsersPaginated($per_page, $order_by = 'id', $sort = 'desc');

    public function getDeletedUsersPaginated($per_page);

    public function getAllUsers($order_by = 'id', $sort = 'asc');

    public function destroy($id);

}
