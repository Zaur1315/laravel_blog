<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function store(Request $request)
    {
        $request -> validate([
            'title'=>'required',
        ]);

        Tag::create($request->all());
//        $request->session()->flash('success', "Категория успешно добавлена");
        return redirect()->route('tags.index')->with('success', "Тег успешно добавлен");
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'title'=>'required',
        ]);
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', "Изменения сохранены");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Tag::destroy($id);
        return redirect()-> route('tags.index')->with('success', 'Тег удален');
    }
}
