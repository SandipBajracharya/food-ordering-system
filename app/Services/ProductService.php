<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function findByProductId($id)
    {
        return Product::find($id);
    }

    public function findAllProductsByUserId($userid)
    {
        return Product::where('user_id', $userid)->get();
    }

    public function addProduct($request)
    {
        try {
            $product = [
                'name' => $request['name'],
                'price' => $request['price'],
                'status' => isset($request['status'])? 1 : 0,
                'size_id' => $request['size_id'],
                'user_id' => Auth::user()->id
            ];
    
            Product::create($product);
            return ['status' => 'success', 'message' => 'Product is stored successfully.'];
        } catch (\Throwable $e) {
            Log::channel('product_error')->error($e->getMessage());
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function findProductByUserId($userId)
    {
        try {
            $products = Product::where('user_id', $userId)->get();
            return ['status' => 'success', 'message' => 'Product is fetched successfully.', 'products' => $products];
        } catch (\Throwable $e) {
            Log::channel('product_error')->error($e->getMessage());
            return ['status' => 'error', 'message' => $e->getMessage(), 'products' => []];
        }
    }
}