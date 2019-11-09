<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrdController extends Controller
{
    function getPrd(){
        return view('frontend.product.shop');
    }

    function getDetail(){
        return view('frontend.product.detail');
    }
}
