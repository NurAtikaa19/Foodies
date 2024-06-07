<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function addItem(Request $request)
    {
        $itemId = $request->input('itemId');
        $itemName = $request->input('itemName');
        $itemPrice = $request->input('itemPrice');
        $itemDescription = $request->input('itemDescription');
        $itemImage = $request->input('itemImage');
        
        $cartItems = session()->get('cart_items', []);
        $cartItems[] = [
            'id' => $itemId,
            'name' => $itemName,
            'price' => $itemPrice,
            'description' => $itemDescription,
            'image' => $itemImage,
            'quantity' => 1, // Atur jumlah default ke 1
        ];
        
        session()->put('cart_items', $cartItems);
        
        return response()->json(['message' => 'Item added to cart successfully'], 200);
    }
}    