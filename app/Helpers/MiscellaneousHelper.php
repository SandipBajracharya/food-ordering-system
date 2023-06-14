<?php

// this is autoload file

use App\Models\User;
use App\Services\CartService;

function getVendorApprovalStatus($id)
{
    $vendor = User::doesntHave('vendor')->where('is_vendor', 1)->where('id', $id)->first();
    if (!empty($vendor)) {
        $is_approved = false;
    } else {
        $is_approved = true;
    }

    return $is_approved;
}

function getCartItemsCount()
{
    if (auth()->check()) {
        $obj = new CartService();
        $cart_id = $obj->getUsersCart(auth()->user()->id);
        $cart_items_count = $obj->getCartCount($cart_id);
    } else {
        $cart_items_count = 0;
    }
    return $cart_items_count;
}
