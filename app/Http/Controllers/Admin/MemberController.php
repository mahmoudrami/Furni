<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Member::latest('id')->get();
        return view('admins.members.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $data = $request->except('_token', 'image');
        $data['image'] = uploadImage($request->file('image'), 'members');
        Member::create($data);

        return redirect()->route('admin.Member.index')
            ->with('msg', 'Member Created Successfully')->with('type', 'success');
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
        $item = Member::findOrFail($id);
        return view('admins.members.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $item = Member::findOrFail($id); // get the item
        $data = $request->except('_token', 'image');
        if ($request->hasFile('image')) {
            deleteImage($item->image, 'members');
            $data['image'] = uploadImage($request->file('image'), 'members');
        }

        $item->update($data);

        return redirect()->route('admin.Member.index')
            ->with('msg', 'Member Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $Member)
    {
        deleteImage($Member->image, 'members');
        $Member->delete();
        return redirect()->route('admin.Member.index')
            ->with('msg', 'Member Deleted Successfully')->with('type', 'danger');
    }
}
