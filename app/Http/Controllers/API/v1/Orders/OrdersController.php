<?php

namespace App\Http\Controllers\API\v1\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrdersResource;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Repositories\Orders\OrdersRepository;
use App\Models\CartItems;

class OrdersController extends Controller
{
    public $repository;
    public function __construct(OrdersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = CartItems::paginate(10);
        return OrdersResource::collection($orders);
    }

    public function store(StoreOrderRequest $request)
    {
        $this->repository->store($request);

        return response()->json([
            'status' => 'success',
            'message' => 'Cart item created successfully'
        ]);
    }

    public function show(string $id) // ? CartItems $id not working for some reason
    {
        $order = CartItems::find($id);

        return $order == null ? response()->json([
            'status' => 'Error',
            'message' => 'Order Not Found' 
        ], 404) : new OrdersResource($order); 
    }

    public function update(UpdateOrderRequest $request, string $id)
    {
        $this->repository->update($request, $id);

        return response()->json([
            'status' => 'Success',
            'message' => 'CDs Successfully Stored in the Database'
        ], 200);
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);

        return response()->json([
            'status' => 'Success',
            'message' => 'Order Successfully Deleted' 
        ]);
    }
}
