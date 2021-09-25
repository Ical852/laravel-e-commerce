<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        return view('welcome', [
            'products' => Product::take(3)->get()
        ]);
    }
}
