<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;
use Inertia\ResponseFactory;

class PostController extends Controller
{

    public function lasted(): Response|ResponseFactory
    {
        $posts = Post::latest()->take(8)->with('categories')->get();
        // Надо менять на коллекцию?
        //$posts = Post::orderBy('created_at','desc')->take(4)->get();
        //$posts = PostResource::collection($posts)->resolve();
        return Inertia('Index', compact('posts'));
    }

    /**
     * Все посты (unused)
     */
    public function index(?PostCategory $category): Response
    {
        $category = null;
        if (!empty($category)) {
            $posts = Post::where('category_id', $category->id)->all()->take(8)->with('categories')->get();
        } else {
            $posts = Post::all();
        }
        $categories = PostCategory::all('title');

        return Inertia('Post/List', compact('posts', 'category', 'categories'));
    }

    public function show(Post $post): Response|ResponseFactory
    {
        return Inertia('Post/Show', compact('post'));
    }

    /**
     * Помещает созданный ресурс в хранилище
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->author_id = rand(1, 4);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $image = $request->file('image');
        if ($image) {
            $path = Storage::putFile('public', $image);
            $post->image = Storage::url($path);
        }
        $post->save();

        return redirect()->back();
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     */
    public function create()
    {
        return Inertia('Post/Create');
    }


    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  Post  $post
     * @return Response|ResponseFactory
     */
    public function edit(Post $post)
    {
        return Inertia('Post.Edit', compact('post'));
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  Request  $request
     * @param  Post  $post
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->back();
    }

    /**
     * Удаляет указанный ресурс из хранилища
     *
     * @param  Post  $post
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            abort(404);
        }

        $post = Post::findOrFail($request->input('id'));
        if ($post && $request->user()->can('update-post', $post)) {
            $post->delete();
            return redirect()->back();
        }

        abort(403);
    }
}
