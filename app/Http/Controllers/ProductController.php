<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('products.create', [
            'product' => $product, 
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        if($request->hasFile("image")){
            $nameimage = '';
            $path = public_path("storage\img\p");

            if ( ! file_exists($path) ) {
                mkdir($path, 0777, true);
            }

            $file = $request->file("image");
            $nameimage = uniqid() . '_' . Str::slug($request->title).".".$file->guessExtension();

            $file->move($path,$nameimage);
        }

        $product = $request->user()->product()->create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $nameimage,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'isbn' => $request->isbn,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'active' => $request->active ? 1 : 0
        ]);

        return redirect()->route('products.edit', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('products.edit', [
            'product' => $product, 
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // $product->update($request->all());
        if($request->hasFile("image")){
            $nameimage = '';
            $path = public_path("storage\img\p");

            if ( ! file_exists($path) ) {
                mkdir($path, 0777, true);
            }

            $file = $request->file("image");
            $nameimage = uniqid() . '_' . Str::slug($request->title).".".$file->guessExtension();

            $file->move($path,$nameimage);

            $product->image = $nameimage;
        }

        $product->update([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'isbn' => $request->isbn,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'active' => $request->active ? 1 : 0
        ]);

        return to_route('products.edit', $product)->with('status', 'Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }
}
