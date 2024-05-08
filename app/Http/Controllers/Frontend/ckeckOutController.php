<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ckeckOutController extends Controller
{
    public function index()
    {
        return view('frontend.ckeckout.index');
    }
}
