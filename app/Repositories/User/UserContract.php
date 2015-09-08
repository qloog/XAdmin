<?php

namespace App\Repositories\User;

interface UserContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
