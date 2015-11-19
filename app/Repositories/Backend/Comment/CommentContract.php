<?php

namespace App\Repositories\Comment;

interface CommentContract
{

    public function getAll($per_page, $order_by = 'id', $sort = 'desc');

}
