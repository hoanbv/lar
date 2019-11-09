<?php

namespace App\Http\Controllers\backend;
use  App\Http\Requests\AddProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getProduct()
    {
        return view('backend.product.listproduct');
    }
    function postAddProduct(AddProductRequest $r){

    }
    function getAddProduct()
    {
        return view('backend.product.addproduct');
    }
    function getEditProduct()
    {
        return view('backend.product.editproduct');
    }
}
