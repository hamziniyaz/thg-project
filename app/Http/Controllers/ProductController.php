<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->image){
            $path = public_path('images/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
    
            $request->image = $imageName;
        }
        
        Product::create($request->post());
 
        return redirect()->route('products.index')->with('success','Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required'
        ]);

        if($request->image != $product->image){
            $path = public_path('images/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
    
            $product->image = $imageName;
            $product->save();
        }
        $product->fill($request->post())->save();

        return redirect()->route('products.index')->with('success','Product Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function imageDeletion(Request $request)
    {
        $file = public_path('images/'.$request->image);
        File::delete($file);
        
        Product::find($request->id)->fill(['image'=>''])->save();

        return response()->json(['id' => $request->id]);    
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Student $student
    * @return \Illuminate\Http\Response
    */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product has been deleted successfully');
    }

}
