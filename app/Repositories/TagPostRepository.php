<?php

namespace App\Repositories;

class TagPostRepository
{
    public function findAllByPostId($postId)
    {
        return \DB::table('tag_post')->where('post_id', '=', $postId)
            ->join('tags', 'tag_post.tag_id', '=', 'tags.id')
            ->get();
    }

    public function create($data)
    {
        \DB::table('tag_post')->insert($data);
    }

    public function deleteByPostId($id)
    {
        return \DB::table('tag_post')->where('post_id', '=', $id)->delete();
    }
}
