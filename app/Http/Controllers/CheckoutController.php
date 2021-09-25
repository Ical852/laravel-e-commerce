<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutMail;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store() {
        $carts = Cart::where('user_id', Auth::user()->id);
        $cartUser = $carts->get();
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);

        foreach ($cartUser as $cart) {
            $transaction->transactionDetail()->create([
                'product_id' => $cart->product_id,
                'qty' => $cart->qty
            ]);
        }

        Mail::to($carts->first()->user->email)->send(new CheckoutMail($cartUser));

        $carts->delete();
        return redirect('/');
        
    }
}
