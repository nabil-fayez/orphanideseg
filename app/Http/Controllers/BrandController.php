<?php
// app/Http/Controllers/BrandController.php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('products')->get();

        return response()->json([
            'success' => true,
            'data' => $brands
        ]);
    }

    public function show($id)
    {
        $brand = Brand::with(['products' => function ($query) {
            $query->with('category');
        }])->find($id);

        if (!$brand) {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $brand
        ]);
    }

    public function products($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found'
            ], 404);
        }

        $products = $brand->products()->with('category')->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}