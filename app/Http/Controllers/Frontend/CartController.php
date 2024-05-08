<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {

        return view('frontend.cart.index');
    }
}
