<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Services\VendorService;
use App\Services\ProductService;

class MainController extends Controller
{
    private $sliderService, $vendorService, $productService;

    public function __construct(SliderService $slider, VendorService $vendorService, ProductService $productService)
    {
        $this->sliderService = $slider;
        $this->vendorService = $vendorService;
        $this->productService = $productService;
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
}
