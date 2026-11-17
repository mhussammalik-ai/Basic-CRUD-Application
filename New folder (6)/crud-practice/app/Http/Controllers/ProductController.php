<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Products;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $products = Products::all();

       
          return view("index"   , compact('products'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('productForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Products::create([
         'productName' => $request->productName,
         'quantity' => $request->quantity,
         'price' => $request->price,
     ]);
    return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        return  view('edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $product = Products::findOrFail($id);
         $product->update([
            'productName' => $request->productName,
            'quantity' => $request->quantity,
            'price' => $request->price,

         ]);

    return redirect()->route('products.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('products.index');
    }
}
