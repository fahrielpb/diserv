<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $categories = Category::get();

        // $wishlist = Wishlist::where('user_id', Auth::id())->first();
        return view('frontend.wishlist', compact('wishlist','categories'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product added to Wishlist!"]);
            }
            else{
                return response()->json(['status' => "Product does not exist"]);
            }
        }
        else{
            return response()->json(['status' => "Login to continue!"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
       {
        $prod_id = $request->input('prod_id');
        if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
        {
          $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
          $wish->delete();
          return response()->json(['status' => "Favorite deleted!"]);
        }
      }
      else{
          return response()->json(['status' => "Login to Continue"]);
      }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
