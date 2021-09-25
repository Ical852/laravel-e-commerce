<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null) {
        return view('shop/index', [
            'products' => Product::where('name', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('price', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('desc', 'LIKE', '%'.$request->search.'%')
                                ->paginate(6),
            'categories' => Category::all(),
            'id' => $id
        ]);
    }

    public function category($id) {
        return view('shop/index', [
            'products' => Product::where('category_id', $id)->paginate(6),
            'categories' => Category::all(),
            'id' => $id
        ]);
    }

    public function show($id) {
        return view('shop/show', [
            'product' => Product::firstWhere('id', $id)
        ]);
    }
}
