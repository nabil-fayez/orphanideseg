<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['address', 'items.product'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required|exists:addresses,id',
            // 'pickup_time' => 'required|date_format:H:i',
            // 'pickup_date' => 'required|date|after:today',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }


        $subtotal = 0;
        $deliveryCost = 0;
        $discount = 0;
        foreach ($request['items'] as $item) {
            $subtotal += $item["total_price"];
        }
        $totalAmount = $subtotal + $deliveryCost - $discount;

        // إنشاء الطلب
        $order = Order::create([
            'user_id' => $request->user()->id,
            'address_id' => $request->address_id,
            'pickup_time' => $request->pickup_time ?? now(),
            'pickup_date' => $request->pickup_date ?? today(),
            'notes' => $request->notes,
            'delivery_cost' => $deliveryCost,
            'discount' => $discount,
            'subtotal' => $subtotal,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);
        $orderItems = $request['items'];
        foreach ($orderItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['unit_price']
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order->load(['address', 'items'])
        ]);
    }

    public function show(Request $request, $id)
    {
        $order = Order::with(['address', 'items.product'])
            ->where('user_id', $request->user()->id)
            ->where('id', $id)
            ->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }

        if (!in_array($order->status, ['pending', 'confirmed'])) {
            return response()->json([
                'success' => false,
                'message' => 'Order cannot be cancelled at this stage'
            ], 400);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json([
            'success' => true,
            'message' => 'Order cancelled successfully',
            'data' => $order
        ]);
    }
}
