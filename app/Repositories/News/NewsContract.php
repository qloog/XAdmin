<?php

namespace App\Repositories\News;

interface NewsContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
