<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        // البحث حسب القسم
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // البحث حسب العلامة التجارية
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // المنتجات المميزة
        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        // البحث
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_ar', 'like', "%{$search}%")
                    ->orWhere('name_en', 'like', "%{$search}%");
            });
        }

        $products = $query->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    public function featured()
    {
        $products = Product::with(['category', 'brand'])
            ->where('is_featured', true)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'q' => 'required|string|min:2'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $products = Product::with(['category', 'brand'])
            ->where('name_ar', 'like', "%{$request->q}%")
            ->orWhere('name_en', 'like', "%{$request->q}%")
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}