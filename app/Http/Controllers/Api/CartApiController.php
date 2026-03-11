<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartApiController extends Controller
{
    /**
     * GET /api/cart
     * Fetch the authenticated user's cart items.
     */
    public function index()
    {
        $items = Cart::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->_id,
                    'title' => $item->title,
                    'subtitle' => $item->subtitle ?? $item->description ?? '',
                    'price' => (float) ($item->price ?? 0),
                    'quantity' => (int) ($item->quantity ?? 1),
                    'image' => $item->image ?? null,
                    'type' => $item->type ?? null,
                    'data_id' => $item->data_id ?? null,
                ];
            });

        return ResponseHelper::sendResponse([
            'items' => $items,
            'count' => $items->count(),
        ], 'Cart fetched successfully.');
    }

    /**
     * POST /api/cart/items
     * Add an item to the cart.
     * Payload: { title, subtitle, price, quantity, image?, type?, data_id? }
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Check if same item already in cart (by title or data_id)
        $existQuery = Cart::where('user_id', Auth::id());
        if ($request->has('data_id') && $request->data_id) {
            $existQuery->where('data_id', $request->data_id);
        } else {
            $existQuery->where('title', $request->title);
        }

        $existing = $existQuery->first();

        if ($existing) {
            // Update quantity instead of duplicating
            $existing->quantity = ($existing->quantity ?? 1) + ($request->quantity ?? 1);
            $existing->save();

            return ResponseHelper::sendResponse($this->formatCartItem($existing), 'Cart item quantity updated.');
        }

        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->title = $request->title;
        $cart->subtitle = $request->subtitle ?? '';
        $cart->price = (float) $request->price;
        $cart->quantity = (int) ($request->quantity ?? 1);
        $cart->image = $request->image ?? null;
        $cart->type = $request->type ?? 'product';
        $cart->data_id = $request->data_id ?? null;
        $cart->save();

        return ResponseHelper::sendResponse($this->formatCartItem($cart), 'Item added to cart.');
    }

    /**
     * PUT /api/cart/items/{id}
     * Update a cart item (quantity, etc.)
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::where('_id', $id)->where('user_id', Auth::id())->first();

        if (!$cart) {
            return ResponseHelper::sendResponse([], 'Cart item not found.', false, 404);
        }

        if ($request->has('quantity')) {
            $cart->quantity = max(1, (int) $request->quantity);
        }
        if ($request->has('title')) {
            $cart->title = $request->title;
        }
        if ($request->has('price')) {
            $cart->price = (float) $request->price;
        }

        $cart->save();

        return ResponseHelper::sendResponse($this->formatCartItem($cart), 'Cart item updated.');
    }

    /**
     * DELETE /api/cart/items/{id}
     * Remove a specific item from the cart.
     */
    public function destroy($id)
    {
        $cart = Cart::where('_id', $id)->where('user_id', Auth::id())->first();

        if (!$cart) {
            return ResponseHelper::sendResponse([], 'Cart item not found.', false, 404);
        }

        $cart->delete();

        return ResponseHelper::sendResponse([], 'Cart item removed.');
    }

    /**
     * POST /api/cart/clear
     * Remove all items from the user's cart.
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return ResponseHelper::sendResponse([], 'Cart cleared successfully.');
    }

    /**
     * Format a cart item for consistent API response.
     */
    private function formatCartItem($item)
    {
        return [
            'id' => $item->_id,
            'title' => $item->title,
            'subtitle' => $item->subtitle ?? '',
            'price' => (float) ($item->price ?? 0),
            'quantity' => (int) ($item->quantity ?? 1),
            'image' => $item->image ?? null,
            'type' => $item->type ?? null,
            'data_id' => $item->data_id ?? null,
        ];
    }
}
