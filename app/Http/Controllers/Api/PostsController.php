<?php

namespace App\Http\Controllers\Api;

use App\Repositories\PostRepository;
use App\Repositories\TagPostRepository;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    private $postRepository;
    private $tagPostRepository;

    public function __construct(
        PostRepository $postRepository,
        TagPostRepository $tagPostRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->tagPostRepository = $tagPostRepository;
    }

    public function read()
    {
        try {

            $posts = $this->postRepository->findAll();

            $collection = collect();
            foreach ($posts as $post) {
                $tags = $this->tagPostRepository->findAllByPostId($post->id);
                $post->tags = $tags->pluck('name');
                $collection->push($post);
            }

            return $collection;

        }   catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }

    public function show($id)
    {
        try {
            $post = $this->postRepository->findById($id);
            $tags = $this->tagPostRepository->findAllByPostId($post->id);

            $post->tags = $tags->pluck('name');

            return response()->json($post);

        }   catch(\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }

    }
}
