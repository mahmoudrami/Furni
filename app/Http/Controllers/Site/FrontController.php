<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\Post;
use App\Models\Admin;
use App\Models\coupon;
use App\Models\Member;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;
use App\Models\CartItem;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewCartNotification;

class FrontController extends Controller
{
    public function index()
    {
        $services = Service::get()->random(4);
        $products = Product::get()->random(3);

        $productsIds = CartItem::latest('quantity')->take(3)->get('product_id')->pluck('product_id')->toArray();
        $popular = Product::whereIn('id', $productsIds)->get();
        $testimonials = Testimonial::latest('id')->take(4)->get();
        $blogs = Post::latest('id')->take(3)->get();

        return view('website.index', compact('services', 'products', 'popular', 'testimonials', 'blogs'));
    }

    public function shop()
    {
        $products = Product::where('quantity', '!=', 0)->latest('id')->paginate(15);
        return view('website.shop', compact('products'));
    }

    public function about()
    {
        $services = Service::latest('id')->take(4)->get();
        $teams = Member::latest('id')->take(4)->get();
        $testimonials = Testimonial::latest('id')->take(4)->get();
        return view('website.about', compact('services', 'teams', 'testimonials'));
    }

    public function Services()
    {
        $services = Service::latest('id')->get();
        $testimonials = Testimonial::latest('id')->take(4)->get();
        $products = Product::latest('id')->take(3)->get();
        return view('website.services', compact('services', 'testimonials', 'products'));
    }

    public function Post()
    {
        $blogs = Post::latest('id')->paginate(9);

        return view('website.blogs', compact('blogs'));
    }

    public function Contact()
    {
        return view('website.contact');
    }

    public function ContactUs(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $data = $request->except('_token');

        Contact::create($data);

        return redirect()->route('index');
    }

    public function Cart()
    {
        $cart = Cart::latest('id')->where('user_id', Auth::id())->first();

        return view('website.cart', compact('cart'));
    }

    public function addCart($id)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id()]
        );

        $admin = Admin::first();

        $admin->notify(new NewCartNotification(Auth::user()));

        $product = Product::findOrFail($id);

        if ($product->quantity > 0) {
            $item =  CartItem::firstOrCreate([
                'cart_id' => $cart->id,
                'product_id' => $id,
            ], [
                'cart_id' => $cart->id,
                'product_id' => $id,
                'price' => $product->price
            ]);

            $product->update([
                'quantity' => $product->quantity > 0 ? $product->quantity - 1 : 0
            ]);
            $item->quantity = $item->quantity + 1;
            $item->price = $product->price * $item->quantity;
            $item->save();
            return true;
        } else {
            return false;
        }
    }

    public function addProduct($id, Request $request)
    {

        $cart = Cart::where('user_id', Auth::id())->first();
        $item = CartItem::where('product_id', $id)->where('cart_id', $cart->id)->first();
        $product = Product::findOrFail($id);
        if ($request->quantity == 0) {
            $product->update([
                'quantity' => $product->quantity + 1
            ]);
            $item->delete();
            return false;
        } else {
            if ($product->quantity > 0 || $request->decrement == 'true') {
                if ($request->decrement == 'true') {
                    if ($request->quantity < $item->quantity) {
                        $product->update([
                            'quantity' => $product->quantity + 1
                        ]);
                    } else {
                        return 'false';
                    }
                } else {
                    $product->update([
                        'quantity' => $product->quantity > 0 ? $product->quantity - 1 : 0
                    ]);
                }
                $item = CartItem::where('product_id', $id)->where('cart_id', $cart->id)->first();
                $item->quantity = $request->quantity;
                $item->price = $product->price * $request->quantity;
                $item->save();
                $cart->total = CartItem::where('cart_id', $cart->id)->sum('price');
                $cart->save();
                return response()->json(['item' => $item, 'added' => true, 'total' => $cart->total, 'quantity' => 0]);
            } else {
                return response()->json(['added' => false]);
            }
        }
    }

    public function deleteProduct($id)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $item = CartItem::where('product_id', $id)->where('cart_id', $cart->id)->first();
        $product = Product::findOrFail($id);
        $product->update([
            'quantity' => $item->quantity + $product->quantity
        ]);
        $item->delete();
        return true;
    }
    public function applyCoupon($id, Request $request)
    {
        $checkCoupon = coupon::where('code', $request->code)->first();
        if (isset($checkCoupon)) {
            $item = Cart::findOrFail($id);
            if ($item->use_coupon == 'no') {
                $item->update([
                    'total' => $item->total - ($item->total * ($checkCoupon->percentage / 100)),
                    'use_coupon' => 'yes'
                ]);
                return response()->json(['status' => true, 'msg' => 'Done', 'total' => $item->total, 'type' => 'success']);
                return;
            } else {
                return response()->json(['status' => true, 'msg' => 'You Are use Coupon', 'total' => $item->total, 'type' => 'error']);
            }
        } else {
            return response()->json(['status' => false, 'msg' => 'The Coupon Not Fount']);
        }
    }

    public function userProfile()
    {
        $user = Auth::user();
        return view('website.profile', compact('user'));
    }

    public function checkPassword(Request $request)
    {
        return Hash::check($request->password, Auth::user()->password);
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        /** @var User $item */
        $item = Auth::user();
        $item->name = $request->name;
        if ($request->hasFile('image')) {
            $item->image = uploadImage($request->file('image'), 'users');
        }

        if ($request->has('password')) {
            $item->password = bcrypt($request->password);
        }
        $item->save();

        return redirect()->back()->with('msg', 'Profile Updated')->with('type', 'success');
    }
}
