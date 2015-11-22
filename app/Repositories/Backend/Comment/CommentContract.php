<?php

namespace App\Repositories\Backend\Comment;

interface CommentContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
