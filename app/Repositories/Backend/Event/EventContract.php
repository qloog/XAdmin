<?php

namespace App\Repositories\Backend\Event;

interface EventContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
