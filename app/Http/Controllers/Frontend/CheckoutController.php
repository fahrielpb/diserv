<?php

namespace App\Http\Controllers\Frontend;


use Midtrans;
use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Category;

use App\Models\Province;
use App\Models\OrderItem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Midtrans\Config as ConfigMidtrans;

class CheckoutController extends Controller
{
    public function index()
    {
        $prov = $this->prov();        
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
        $order = Order::where('user_id',Auth::id())->first();
        // dd($order);
        return view('frontend.checkout', compact('cartitems', 'categories', 'order','prov')); 



    }


    private function prov()
    {
        $response = Http::withHeaders(
            [
                'key' => '83624db318a1398f617240e141350d5b'
            ]
        )->get('https://api.rajaongkir.com/starter/province');
        return  $response['rajaongkir']['results'];         
    }

    public function kota($id)
    {
        return $this->city($id);
    }

    private function city($id)
    {
        $response = Http::withHeaders(
            [
                'key' => '83624db318a1398f617240e141350d5b'
            ]
        )->get('https://api.rajaongkir.com/starter/city',[
            'province'=>$id,
        ]);
        return  $response['rajaongkir']['results'];              
    }

    public function tarif($des,$weight,$cour)
    {
        return $this->cost($des,$weight,$cour);             
    }


    private function cost($des,$weight,$cour)
    {
        $response = Http::withHeaders(
            [
                'key' => '83624db318a1398f617240e141350d5b'
            ]
        )->post('https://api.rajaongkir.com/starter/cost',[
            'origin'=>23,
            'destination'=>$des,
            'weight'=>$weight * 1000,
            'courier'=>$cour
        ]);                
        return  $response['rajaongkir']['results'];      
    }

    // public function placeorder(Request $request)
    // {
    //     $order = new Order();
    //     $order->user_id = Auth::id();
    //     $order->fname = $request->input('fname');
    //     $order->lname = $request->input('lname');
    //     $order->email = $request->input('email');
    //     $order->phone = $request->input('phone');
    //     $order->address1 = $request->input('address1');
    //     $order->address2 = $request->input('address2');
    //     $order->provinsi = $request->input('provinsi');
    //     $order->kota = $request->input('kota');
    //     $order->kecamatan = $request->input('kecamatan');
    //     $order->kelurahan = $request->input('kelurahan');
    //     $order->kode_pos = $request->input('kode_pos');

    //     // to calculate total price
    //     $total = 0;
    //     $cartitems_total = Cart::where('user_id', Auth::id())->get();
    //     foreach($cartitems_total as $prod)
    //     {
    //         // $total += $prod->products->selling_price;
    //         $total += $prod->products->selling_price * $prod->prod_qty;
    //     }

    //     $order->total_price = $total;

    //     $order->tracking_no = 'dsrv'.rand(1111,9999);
    //     $order->save();

    //     $cartitems = Cart::where('user_id', Auth::id())->get();
    //     foreach($cartitems as $item)
    //     {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'prod_id' => $item->prod_id,
    //             'qty' => $item->prod_qty,
    //             'price' => $item->products->selling_price,
    //         ]);

    //         $prod = Product::where('id', $item->prod_id)->first();
    //         $prod->qty = $prod->qty - $item->prod_qty;
    //         $prod->update();
    //     }

    //     if(Auth::user()->address1 == NULL)
    //     {
    //         $user = User::where('id', Auth::id())->first();
    //         $user->name = $request->input('fname');
    //         $user->lname = $request->input('lname');
    //         $user->phone = $request->input('phone');
    //         $user->address1 = $request->input('address1');
    //         $user->address2 = $request->input('address2');
    //         $user->provinsi = $request->input('provinsi');
    //         $user->kota = $request->input('kota');
    //         $user->kecamatan = $request->input('kecamatan');
    //         $user->kelurahan = $request->input('kelurahan');
    //         $user->kode_pos = $request->input('kode_pos');
    //         $user->update();
    //     }   

    //     $cartitems = Cart::where('user_id', Auth::id())->get();
    //     Cart::destroy($cartitems);

    //     return redirect('/')->with('status', "Order Successfully");
    // }

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

        // if(Auth::user()->address1 == NULL)
        // {
        //     // dd($request->phone);
        //     $user = Order::where('id', Auth::id())->first();
        //     // $user->name = $request->input('fname');
        //     // $user->lname = $request->input('lname');
        //     $user->phone = $request->input('phone');

        //     $user->address1 = $request->input('address1');
        //     $user->address2 = $request->input('address2');
        //     $user->provinsi = $request->input('provinsi');
        //     $user->kota = $request->input('kota');
        //     $user->kecamatan = $request->input('kecamatan');
        //     $user->kelurahan = $request->input('kelurahan');
        //     $user->kode_pos = $request->input('kode_pos');
        //     $user->update();
        // }   

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        //set konfigurasi midtrans
        
        ConfigMidtrans::$serverKey = config('midtrans.serverKey');
        ConfigMidtrans::$isProduction = config('midtrans.isProduction');
        ConfigMidtrans::$isSanitized = config('midtrans.isSanitized');
        ConfigMidtrans::$is3ds = config('midtrans.is3ds');
        
        // buat array u dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'MIDTRANSTEST-' . $order->id,
                'gross_amount' => (int) $total
            ],

            'customer_details' => [
                'firstname' => $order->name,
                'email' => $order->email
            ],

            'enabled_payments' => [
                'echannel', 'gopay', 'indomaret', 'shopeepay', 'bca_va', 'bni_va', 'bri_va', 'other_va'
            ],
            'vtweb' => []

        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;
            
            // Redirect to Snap Payment Page
            header('Location: ' . $paymentUrl); 
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }
        // return redirect('/')->with('status', "Order Successfully");
    }

    // public function paycheck(Request $request)
    // {
    //     $cartitems = Cart::where('user_id', Auth::id())->get();
    //     $total_price = 0;
    //     foreach($cartitems as $item)
    //     {
    //         $total_price += $item->products->selling_price * $item->prod_qty;
    //     }
    //          $fname = $request->input('fname');
    //          $lname = $request->input('lname');
    //          $email = $request->input('email');
    //          $phone = $request->input('phone');
    //          $address1 = $request->input('address1');
    //          $address2 = $request->input('address2');
    //          $kota = $request->input('kota');
    //          $provinsi = $request->input('provinsi');
    //          $kecamatan = $request->input('kecamatan');
    //          $kelurahan = $request->input('kelurahan');
    //          $kode_pos = $request->input('kode_pos');

    //          return response()->json([
    //             'fname'=> $fname,
    //             'lname'=> $lname,
    //             'email'=> $email,
    //             'phone'=> $phone,
    //             'address1'=> $address1,
    //             'address2'=> $address2,
    //             'kota'=> $kota,
    //             'provinsi'=> $provinsi,
    //             'kecamatan'=> $kecamatan,
    //             'kelurahan'=> $kelurahan,
    //             'kode_pos'=> $kode_pos,
    //             'total_price'=> $total_price
    //          ]);
    // }

}