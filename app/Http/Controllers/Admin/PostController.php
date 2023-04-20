<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
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


        return redirect()->route('posts.index')->with('success', "Статья успешно добавлена");
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $id)
    {

        return view('admin.posts.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'title'=>'required',
        ]);

        return redirect()->route('posts.index')->with('success', "Изменения сохранены");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        $category = Category::find($id);
//        $category->delete();

        return redirect()-> route('posts.index')->with('success', 'Статья удалена');
    }
}
