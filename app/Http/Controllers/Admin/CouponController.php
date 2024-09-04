<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Coupon::latest('id')->get();
        return view('admins.coupons.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'percentage' => 'required',
            'code' => 'required',
        ]);

        $data = $request->except('_token');

        Coupon::create($data);

        return redirect()->route('admin.Coupon.index')
            ->with('msg', 'Coupon Created Successfully')->with('type', 'success');
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
        $item = Coupon::findOrFail($id);
        return view('admins.coupons.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Coupon::findOrFail($id);
        $request->validate([
            'percentage' => 'required',
            'code' => 'required',
        ]);
        $data = $request->except('_token');

        $item->update($data);

        return redirect()->route('admin.Coupon.index')
            ->with('msg', 'Coupon Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Coupon::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.Coupon.index')
            ->with('msg', 'Coupon Deleted Successfully')->with('type', 'danger');
    }
}
