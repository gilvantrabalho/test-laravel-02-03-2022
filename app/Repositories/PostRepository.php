<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    private $postModel;

    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    public function findAll()
    {
        return $this->postModel->orderBy('id', 'DES')->get();
    }

    public function findById($id)
    {
        return $this->postModel
            ->where('posts.id', '=', $id)
            ->leftJoin('tag_post', 'post_id', '=', 'posts.id')
            ->first();
    }

    public function create($data)
    {
        return $this->postModel->create($data);
    }
}
