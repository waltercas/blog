<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

use App\Http\Controllers\Controller;

use App\Tag;

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

 /**   public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'slug'=>'required|unique:tags,slug',
        ]);
        $tag = Tag::create($request->all());

        return redirect()->route('tags.edit', $tag->id)->with('info', 'Etiqueta creada con éxito');
    }*/        

    public function store(TagStoreRequest $request)
    {
         $tag = Tag::create($request->all());

        return redirect()->route('tags.edit', $tag->id)->with('info', 'Etiqueta creada con éxito');
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

    public function update(TagUpdateRequest $request, $id)
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
