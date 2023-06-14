<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CartService;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    private $productService, $cartService;

    public function __construct(ProductService $productService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function addToCart($product_id)
    {
        // for success case
        $response = ['status' => 'success', 'message' => 'Added to cart successfully',  'item_count' => 0, 'statusCode' => 200];

        $product = $this->productService->findByProductId($product_id);

        if (!empty($product)) {
            $response = $this->cartService->handleAddToCart($product);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Product cannot be found.',
                'item_count' => 0,
                'statusCode' => 422
            ];
        }
        return response()->json($response, $response['statusCode']);
    }

    public function cartCheckout(Request $request)
    {
        $inputs = $request->all();
        $res = $this->cartService->checkoutCart($inputs);
        Alert::toast($res['message'], $res['status']);
        return redirect()->back();
    }
}
