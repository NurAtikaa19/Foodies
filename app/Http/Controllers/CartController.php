<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function update(Request $request, $id)
    {
        $cartItems = Session::get('cart_items', []);

        if (isset($cartItems[$id])) {
            // Update item sesuai dengan data yang diterima dari form
            $cartItems[$id]['name'] = $request->input('name');
            $cartItems[$id]['price'] = $request->input('price');
            $cartItems[$id]['description'] = $request->input('description');
            $cartItems[$id]['quantity'] = $request->input('quantity');

            Session::put('cart_items', $cartItems);

            return redirect()->route('cart.index')->with('success', 'Item updated successfully');
        } else {
            return redirect()->route('cart.index')->with('error', 'Item not found in cart');
        }
    }

    public function delete($id)
    {
        $cartItems = Session::get('cart_items', []);

        if (isset($cartItems[$id])) {
            // Hapus item dari session
            unset($cartItems[$id]);
            Session::put('cart_items', $cartItems);

            return redirect()->route('cart.index')->with('success', 'Item deleted successfully');
        } else {
            return redirect()->route('cart.index')->with('error', 'Item not found in cart');
        }
    }
}
