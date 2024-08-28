<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Service::latest('id')->paginate(15);

        return view('admins.services.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.services.create');
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

        $data = $request->except('_token');
        $data['image'] = uploadImage($request->image, 'services');

        Service::create($data);

        return redirect()->route('admin.Service.index')
        ->with('msg', 'Service Created Successfully')->with('type', 'success');
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
        $item = Service::findOrFail($id);
        return view('admins.services.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Service::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->except('image');
        if($request->hasFile('image')){
            deleteImage($item->image, 'services');
            $data['image'] = uploadImage($request->image, 'services');
        }

        $item->update($data);



        return redirect()->route('admin.Service.index')
        ->with('msg', 'Service Updated Successfully')->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Service::findOrFail($id);
        deleteImage($item->image, 'services');
        $item->delete();
        return redirect()->route('admin.Service.index')
        ->with('msg', 'Service Deleted Successfully')->with('type', 'success');
    }
}
