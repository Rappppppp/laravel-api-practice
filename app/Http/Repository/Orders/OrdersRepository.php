<?php

namespace App\Http\Repository\Orders;

use App\Models\CartItems;
use App\Models\CDs;

class OrdersRepository
{
    private function updateCDQuantity($cdId, $quantity)
    {
        $cd = CDs::findOrFail($cdId);
        $cd->quantity -= $quantity;
        $cd->save();
    }

    private function checkQuantity($cdId, $quantity)
    {
        $cd = CDs::findOrFail($cdId);
        return $cd->quantity >= $quantity;
    }

    public function store($request)
    {
        $cdId = $request['cd_id'];
        $quantity = $request['quantity'];

        // This method checks the quantity that will be stored is enough or not
        if (!$this->checkQuantity($cdId, $quantity)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Not enough stock'
            ], 400);
        }

        CartItems::create([
            'cart_id' => $request['cart_id'],
            'cd_id' => $cdId,
            'quantity' => $quantity,
        ]);

        // After Creating, update the quantity by decrementing the value
        $this->updateCDQuantity($cdId, $quantity);
    }

    public function update($request, $id)
    {
        CartItems::findOrFail($id)->update([
            'cd_id' => $request['cd_id'],
            'quantity' => $request['quantity'],
        ]);
    }

    public function destroy($cartItem)
    {
        CartItems::findOrFail($cartItem)->delete();
    }
}