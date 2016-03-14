<?php

namespace App\Repositories\Backend\News;

interface NewsContract
{

    /**
     * @param        $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc');


    public function getAllCategory($order_by = 'id', $sort = 'asc');

}
