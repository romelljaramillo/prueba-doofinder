<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
	{
		$search = $request->search;

		$products = Product::where('title', 'LIKE', "%{$search}%")
            ->where('active',1)
			->with('user')
			->latest()->paginate();

		return view('index', compact('products'));

        // return view('index'); 
    }

    public function product(Product $product) 
    {
        return view('product', ['product' => $product]);
    }
}
