<?php

namespace App\Http\Controllers\frontend;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function getCheckOut(){
        return view('frontend.checkout.checkout');
    }
    function postCheckout(CheckoutRequest $r){
        
    }
    function getComplete(){
        return view('frontend.checkout.complete');
    }
}
