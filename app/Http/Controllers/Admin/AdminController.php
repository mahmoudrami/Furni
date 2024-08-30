<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function profile()
    {
        $admin =  Auth::guard('admin')->user();
        return view('admins.auth.edit', compact('admin'));
    }

    public function editProfile(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        /** @var Admin Admin*/
        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;

        if ($request->hasFile('image')) {
            // return 4;
            $admin->image = uploadImage($request->image);
        }

        if ($request->has('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->back();
    }

    public function checkPassword(Request $request)
    {
        return Hash::check($request->password, Auth::guard('admin')->user()->password);
    }

    public function setting()
    {
        return view('admins.settings');
    }
    public function update_settings(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $data = $request->except('_token');
        $item = Setting::findOrFail(1);

        $item->update($data);

        return redirect()->back()->with('msg', 'Settings Updated')->with('type', 'success');
    }
}
