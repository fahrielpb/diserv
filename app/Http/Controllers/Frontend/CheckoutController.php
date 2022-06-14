<?php

namespace App\Http\Controllers\Frontend;

use Midtrans;
use Midtrans\Snap;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Models\Courier;
use App\Models\Province;
use App\Models\City;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        $categories = Category::get();
        return view('frontend.checkout', compact('cartitems', 'categories')); 
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->provinsi = $request->input('provinsi');
        $order->kota = $request->input('kota');
        $order->kecamatan = $request->input('kecamatan');
        $order->kelurahan = $request->input('kelurahan');
        $order->kode_pos = $request->input('kode_pos');

        // to calculate total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            // $total += $prod->products->selling_price;
            $total += $prod->products->selling_price * $prod->prod_qty;
        }

        $order->total_price = $total;

        $order->tracking_no = 'dsrv'.rand(1111,9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->provinsi = $request->input('provinsi');
            $user->kota = $request->input('kota');
            $user->kecamatan = $request->input('kecamatan');
            $user->kelurahan = $request->input('kelurahan');
            $user->kode_pos = $request->input('kode_pos');
            $user->update();
        }   

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status', "Order Successfully");
    }

    public function paycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }
             $fname = $request->input('fname');
             $lname = $request->input('lname');
             $email = $request->input('email');
             $phone = $request->input('phone');
             $address1 = $request->input('address1');
             $address2 = $request->input('address2');
             $kota = $request->input('kota');
             $provinsi = $request->input('provinsi');
             $kecamatan = $request->input('kecamatan');
             $kelurahan = $request->input('kelurahan');
             $kode_pos = $request->input('kode_pos');

             return response()->json([
                'fname'=> $fname,
                'lname'=> $lname,
                'email'=> $email,
                'phone'=> $phone,
                'address1'=> $address1,
                'address2'=> $address2,
                'kota'=> $kota,
                'provinsi'=> $provinsi,
                'kecamatan'=> $kecamatan,
                'kelurahan'=> $kelurahan,
                'kode_pos'=> $kode_pos,
                'total_price'=> $total_price
             ]);
    }

}