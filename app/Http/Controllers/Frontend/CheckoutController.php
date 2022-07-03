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

        // $old_cartitems = Cart::where('user_id', Auth::id())->get();
        // foreach($old_cartitems as $item)
        // {
        //     if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
        //     {
        //         $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
        //         $removeItem->delete();
        //     }
        // }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        $categories = Category::get();
        $order = Order::where('user_id',Auth::id())->first();        
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

    public function placeorder(Request $request)
    {
        $mid = date("sHmdY");   
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->provinsi = $request->input('province_destination');
        $order->kota = $request->input('kota');
        $order->kecamatan = $request->input('kecamatan');
        $order->kelurahan = $request->input('kelurahan');
        $order->kode_pos = $request->input('kode_pos');
        $order->ongkir = $request->input('shipping');
        $order->mid = $mid;

        // to calculate total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();

        // dd($cartitems_total);
        foreach($cartitems_total as $prod)
        {
            // $total += $prod->products->selling_price;
            // $total += $prod->products->selling_price * $prod->prod_qty;
            $total += $prod->products->selling_price * $prod->prod_qty;
        }

        $order->total_price = $total + $request->input('shipping');

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
                'color'=>$item->color,
                'size'=>$item->size,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

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
                'order_id' => $mid,
                'gross_amount' => (int) $order->total_price
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
            die();
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }
        // return redirect('/')->with('status', "Order Successfully");
    }

}