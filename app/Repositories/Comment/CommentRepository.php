<?php namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepository implements CommentContract
{
    
    public function getAll()
    {
        return Comment::all();
    }
}
