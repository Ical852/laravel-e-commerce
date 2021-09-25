<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('cart/index', [
            'carts' => Cart::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function store(Request $request) {
        $duplicate = Cart::where('product_id', $request->product_id)->first();

        if($duplicate) {
            return redirect('/cart')->with('error', 'Barang Sudah Ada di Cart');
        } else {
            Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => 1
            ]);
            return redirect('/cart')->with('success', 'Berhasil Menambah Barang ke Cart');
        }
        
    }

    public function update(Request $request, $id) {
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        return response()->json([
            'success' => true
        ]);
    }
}
