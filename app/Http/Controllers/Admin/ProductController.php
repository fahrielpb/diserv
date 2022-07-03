<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
     
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        return view('admin.product.add', compact('category','size','color'));
    }

    public function insert(Request $request)
    {
        $products = new Product();


        if($request->hasfile('filenames'))
        {
            $i=1;
           foreach($request->file('filenames') as $file)
           {
            $i++;
               $name = time().'-'.$i.'.'.$file->extension();
               $file->move(public_path().'/assets/uploads/image/', $name);  
               $data[] = $name;  
           }
           $image = json_encode($data);       
           $products->image = $image;
        }

        
        $products->size = json_encode($request->input('size'));                
        $products->color = json_encode($request->input('color'));
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->save();
        return redirect('products')->with('status', "Product Added Successfully!");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $color = Color::all();
        $size = Size::all();
        return view('admin.product.edit', compact('products','size','color'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if($request->hasfile('filenames'))
        {
            $i=1;
           foreach($request->file('filenames') as $file)
           {
            $i++;
               $name = time().'-'.$i.'.'.$file->extension();
               $file->move(public_path().'/assets/uploads/image/', $name);  
               $data[] = $name;  
           }
           $image = json_encode($data);       
           $products->image = $image;
        }
        
        $products->size = json_encode($request->input('size'));                
        $products->color = json_encode($request->input('color'));
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->update();
        return redirect('products')->with('status',"Product Updated Successfully!");
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        $products->delete(); 
        return redirect('products')->with('status'."Product Deleted Successfully!");
    }
    
}
