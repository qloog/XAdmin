<?php

namespace App\Repositories\Event;

interface EventContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
