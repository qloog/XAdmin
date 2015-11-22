<?php

namespace App\Repositories\Backend\Comment;

use App\Models\Comment;

class CommentRepository implements CommentContract
{

    /**
     * Create a new CommentRepository instance.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAll($per_page, $order_by = 'id', $sort = 'desc') {
        return $this->model->orderBy($order_by, $sort)->paginate($per_page);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
