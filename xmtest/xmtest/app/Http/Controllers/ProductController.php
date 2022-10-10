<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  $product;
    public $image,$imageName,$imageDir,$imageUrl;

    public  function  saveImage($request)
    {
        $this->image        = $request->file('image');
        $this->imageName    = time()."_product".'.'.$this->image->getClientOriginalExtension();
        $this->imageDir     ='Upload/Product/';
        $this->image->move($this->imageDir,$this->imageName);
        $this->imageUrl     = ($this->imageDir.$this->imageName);

        return $this->imageUrl;

    }

    public  function newProduct(Request $request)
    {
        $this->product = new Product();

        $this->product->product_name        = $request->product_name;
        $this->product->category            = $request->category;
        $this->product->brand_name          = $request->brand_name;
        $this->product->price               = $request->price;
        $this->product->status              = $request->status;
        $this->product->description         = $request->description;
        $this->product->image               = $this->saveImage($request);

        $this->product->save();

        return back()->with('inserted','Product Inserted Successfully');
    }

    public  function productDelete($id)
    {
        $this->product = Product::find($id);
        if(file_exists($this->product->image))
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return back()->with('deleted','Product Deletd Successfully ...');
    }

    public function productEdit(Request $request)
    {
        $edit_id = Product::find($request->edit_id);
        return view('admin.product.edit',[
            'edit' => $edit_id
        ]);
    }

    public  function updateProduct(Request $request)
    {
        $this->product = Product::find($request->updated_id);

        $this->product->product_name        = $request->product_name;
        $this->product->category            = $request->category;
        $this->product->brand_name          = $request->brand_name;
        $this->product->price               = $request->price;
        $this->product->status              = $request->status;
        $this->product->description         = $request->description;

        if($request->file('image'))
        {
            if($this->product->image)
            {
                unlink($this->product->image);
                $this->product->image           = $this->saveImage($request);
            }
            else{
                $this->product->image           = $this->saveImage($request);
            }
        }
        $this->product->save();
        return redirect()->route('manage.product')->with('inserted','Product Updated Successfully');
    }

    public  function status($id)
    {
        $product = Product::find($id);

        if($product->status == 1){
            $product->status = 0;
            $product->save();
            return back();
        }
        else{
            $product->status = 1;
            $product->save();
            return back();
        }
    }


}
