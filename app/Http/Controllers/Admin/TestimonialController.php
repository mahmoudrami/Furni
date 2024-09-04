<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Testimonial::latest('id')->get();
        return view('admins.testimonials.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('admins.testimonials.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->except('_token');

        Testimonial::create($data);

        return redirect()->route('admin.Testimonial.index')
            ->with('msg', 'Testimonial Created Successfully')->with('type', 'success');
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
        $item = Testimonial::findOrFail($id);
        $users = User::get();
        return view('admins.testimonials.edit', compact('item', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = TEstimonial::findOrFail($id);
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
        ]);
        $data = $request->except('_token');

        $item->update($data);

        return redirect()->route('admin.Testimonial.index')
            ->with('msg', 'Testimonial Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = TEstimonial::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.Testimonial.index')
            ->with('msg', 'Testimonial Deleted Successfully')->with('type', 'danger');
    }
}
