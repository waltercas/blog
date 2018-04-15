<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');  
    }

    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($Request->all());

        return redirect()->route('tags.edit', $tag->id)
            ->with('info', 'Etiqueta creada con exito');
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag = Tag::find($id);
 
        $tag->fill($request->all())->save();

        return redirect()->route('tags.edit', $tag->id)
            ->with('info', 'Etiqueta actualizada con exito');

    }

    public function destroy($id)
    {
        $tag = Tag::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
