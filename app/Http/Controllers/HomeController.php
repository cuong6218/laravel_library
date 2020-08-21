<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getDesc();
        return view('home.shop.index', compact('products'));
    }
    public function showRegister()
    {
        return view('home.auth.register');
    }
    public function showLogin()
    {
        return view('home.auth.login');
    }
//    public function showCart()
//    {
//        return view('home.shop.shop-cart');
//    }

}
