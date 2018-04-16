<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use App\Http\Controllers\Controller;

use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');  
    }        

    public function store(PostStoreRequest $request)
    {
         $post = Post::create($request->all());

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post creada con éxito');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
 
        $post->fill($request->all())->save();

        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Post actualizada con exito');

    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
