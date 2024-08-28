<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::latest('id')->paginate(15);

        return view('admins.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'quantity' => 'required',
        ]);

        $data = $request->except('image', '_token');
        $data['image'] = uploadImage($request->image, 'products');

        Product::create($data);

        return redirect()->route('admin.Product.index')
        ->with('msg', 'Product Created Successfully')->with('type', 'success');
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
        $item = Product::findOrFail($id);
        return view('admins.products.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $data = $request->except('image', '_token');
        if($request->hasFile('image')){
            deleteImage($item->image, 'products');
            $data['image'] = uploadImage($request->image, 'products');
        }

        $item->update($data);



        return redirect()->route('admin.Product.index')
        ->with('msg', 'Product Updated Successfully')->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        deleteImage($item->image, 'products');
        $item->delete();
        return redirect()->route('admin.Product.index')
        ->with('msg', 'Product Deleted Successfully')->with('type', 'success');
    }
}
