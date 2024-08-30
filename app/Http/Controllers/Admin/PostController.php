<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Post::latest('id')->get();
        return view('admins.posts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        $data = $request->except('_token', 'image');
        $data['image'] = uploadImage($request->file('image'), 'posts');
        $data['user_id'] = Auth::guard('admin')->id();
        Post::create($data);

        return redirect()->route('admin.Post.index')
            ->with('msg', 'Post Created Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Post::findOrFail($id);
        return view('admins.posts.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $item = Post::findOrFail($id); // get the item
        $data = $request->except('_token', 'image');
        if ($request->hasFile('image')) {
            deleteImage($item->image, 'posts');
            $data['image'] = uploadImage($request->file('image'), 'posts');
        }

        $item->update($data);

        return redirect()->route('admin.Post.index')
            ->with('msg', 'Post Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $Post)
    {
        deleteImage($Post->image, 'posts');
        $Post->delete();
        return redirect()->route('admin.Post.index')
            ->with('msg', 'Post Deleted Successfully')->with('type', 'danger');
    }
}
