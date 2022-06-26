<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index(Request $request)
    {
        if($request->destination && $request->courier) {
            $origin = 23;
            $destination = $request->destination;
            $weight = 1000;
            $courier = $request->courier;

            $response = Http::withHeaders([
                'key' => '83624db318a1398f617240e141350d5b'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
            ]);
        $cekongkir = $response['rajaongkir']['results'][0]['costs'];
        }
        else{
            $origin = 23;
            $destination = '';
            $weight = 1000;
            $courier = '';
            $cekongkir = null;
        }

        // dd($request->all());
        $provinces = Province::all(); 
        $categories = Category::get();
        return view('frontend.shippingcost', compact('categories', 'provinces', 'cekongkir'));

        // $categories = Category::get();
        // return view('frontend.shippingcost', compact('categories'));
    }

    // public function test()
    // {
    //     # code...
    //     $categories = Category::get();
    //     return view('frontend.shippingcost', compact('categories'));
    // }

    public function ajax($id)
    {
        $cities = City::where('province_id','=', $id)->pluck('city_name','id');       
    
        return json_encode($cities);
    }

}