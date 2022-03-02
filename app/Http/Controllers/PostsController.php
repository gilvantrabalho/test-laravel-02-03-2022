<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\TagPostRepository;
use Illuminate\Http\Request;

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

    //  View Listar posters
    public function read()
    {
        return view('posts.index', [
            'posts' => $this->postRepository->findAll()
        ]);
    }

    //  View mostrar form de cadastro
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'title' => 'required',
                'body' => 'required'
            ],
            [
                'required' => ':attribute é um campo obrigatório.'
            ]);

            $post = $this->postRepository->create([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            if ($request->tags) {
                foreach ($request->tags as $tag) {
                    $this->tagPostRepository->create([
                        'tag_id' => $tag,
                        'post_id' => $post->id
                    ]);
                }
            }

            return redirect('posts');

        }   catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }

    //  View de mostrar form para edição de registro
    public function edit($id)
    {
        $post = $this->postRepository->findById($id);

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        try {

            $this->validate($request, [
                'title' => 'required',
                'body' => 'required'
            ],
                [
                    'required' => ':attribute é um campo obrigatório.'
                ]);

            $post = $this->postRepository->findById($id);

            if (!$post) {
                throw new \Exception('Registro não foi encontrado!');
            }

            $post->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            $this->tagPostRepository->deleteByPostId($post->id);

            foreach ($request->tags as $tag_id) {
                $this->tagPostRepository->create([
                    'tag_id' => $tag_id,
                    'post_id' => $post->id
                ]);
            }

            return redirect('posts');

        }   catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }

    public function deletar($id)
    {
        try {

            $post = $this->postRepository->findById($id);

            if (!$post) {
                throw new \Exception('Registro não foi encontrado!');
            }

            $post->delete();
            $this->tagPostRepository->deleteByPostId($post->id);

            return redirect('posts');

        }   catch (\Exception $e) {
                echo response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }
}
