<?php

namespace App\Http\Controllers\API\v1\Orders;

use App\Http\Controllers\Controller;
use App\Models\UserCarts;
use App\Http\Resources\Orders\UserCartsResource;

class UserCartsController extends Controller
{
    /**
     * ! I think UserCarts can't be deleted or updated.. View Only
     */
    public function index()
    {
        $userCarts = UserCarts::paginate(10);
        return UserCartsResource::collection($userCarts);
    }

    public function show(string $id) // ? UserCarts $id not working for some reason
    {
        $userCarts = UserCarts::find($id);

        return $userCarts == null ? response()->json([
            'status' => 'Error',
            'message' => 'Cart Not Found' 
        ], 404) : new UserCartsResource($userCarts);
    }
}
