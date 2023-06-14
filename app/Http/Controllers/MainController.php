<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Services\VendorService;
use App\Services\ProductService;
use App\Jobs\WriteFileJob;
use App\Jobs\SendEmailJob;
use App\Services\CartService;

class MainController extends Controller
{
    private $sliderService, $vendorService, $productService, $cartService;

    public function __construct(SliderService $slider, VendorService $vendorService, ProductService $productService, CartService $cartService)
    {
        $this->sliderService = $slider;
        $this->vendorService = $vendorService;
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function main()
    {
        $sliders = $this->sliderService->findAll();
        return view('main', compact('sliders'));
    }

    public function showRestaurants()
    {
        $conditions = [
            'is_active' => 1
        ];
        $vendors = $this->vendorService->findAll(null, null, $conditions);
        return view('pages.restaurants', compact('vendors'));
    }

    public function ShowRestaurantsDetail($vendorid)
    {
        $vendor = $this->vendorService->findOneById($vendorid);
        $productsRes = $this->productService->findProductByUserId($vendor->user_id);
        $products = $productsRes['products'];
        return view('pages.restaurantsDetail', compact('vendor', 'products'));
    }

    public function dispatchJob()
    {
        // WriteFileJob::dispatch();
        SendEmailJob::dispatch();
        dd('Mail queued');
    }

    public function getActiveCartItems()
    {
        $cart = $this->cartService->getUsersCart(auth()->user()->id);
        $cartItems = $this->cartService->getCartItem($cart);
        return view('pages.cartList', compact('cartItems'));
    }

    public function searchRestaurant(Request $request)
    {
        $inputs = $request->all();
        $vendors = $this->vendorService->searchVendor($inputs);
        $key = $inputs['search'];
        return view('pages.restaurants', compact('vendors', 'key'));
    }
}
