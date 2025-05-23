<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Contact::latest('id')->paginate(15);

        return view('admins.contactUs.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.contactUs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = $request->except('_token');

        Contact::create($data);

        return redirect()->route('admin.Contact.index')
            ->with('msg', 'Contact Created Successfully')->with('type', 'success');
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
        $item = Contact::findOrFail($id);
        $item->update(['is_open' => 1]);
        return view('admins.contactUs.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $item = Contact::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            deleteImage($item->image, 'contactUs');
            $data['image'] = uploadImage($request->image, 'contactUs');
        }

        $item->update($data);



        return redirect()->route('admin.Contact.index')
            ->with('msg', 'Contact Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Contact::findOrFail($id);
        deleteImage($item->image, 'contactUs');
        $item->delete();
        return redirect()->route('admin.Contact.index')
            ->with('msg', 'Contact Deleted Successfully')->with('type', 'success');
    }
}
