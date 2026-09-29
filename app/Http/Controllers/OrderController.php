<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $q = $request->input('q');

        if ($status) {
            return Order::where('status', $status)->paginate(25);
        }

        $data = Order::confirmed()->when($q, function ($query, $q) {
            return $query->where('code', 'like', "%$q%");
        })
            ->paginate(25);

        $data = Order::status($status)->when($q, function ($query, $q) {
            return $query->where('code', 'like', "%$q%");
        })
            ->paginate(25);

        $data = Order::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->when($q, function ($query, $q) {
            return $query->where('code', 'like', "%$q%");
        })
            ->paginate(25);

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validatedData = $request->validated();
        
        $order = Order::create($validatedData);

        return $order;
        //if($order->total > 1000) {
        //hago algo
        //}
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        
    return new OrderResource($order->load('customer'));
    //return $order->load('customer');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'code' => [
                'required',
                'string',
                'max:4',
                Rule::unique('orders', 'code')->ignore($order->id)
            ],
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'status' => ['required', 'string', 'max:255'],
            'total' => ['required', 'numeric'],
        ]);

        $order->update($validatedData);

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }
}
