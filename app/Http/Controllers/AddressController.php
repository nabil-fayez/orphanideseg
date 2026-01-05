<?php
// app/Http/Controllers/AddressController.php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = Address::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $addresses
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'building_number' => 'required|string|max:50',
            'apartment_number' => 'nullable|string|max:50',
            'street_name' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'floor' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $address = Address::create([
            'user_id' => $request->user()->id,
            'building_number' => $request->building_number,
            'apartment_number' => $request->apartment_number,
            'street_name' => $request->street_name,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'floor' => $request->floor,
            'notes' => $request->notes,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Address added successfully',
            'data' => $address
        ]);
    }

    public function update(Request $request, $id)
    {
        $address = Address::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->first();

        if (!$address) {
            return response()->json([
                'success' => false,
                'message' => 'Address not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'building_number' => 'required|string|max:50',
            'apartment_number' => 'nullable|string|max:50',
            'street_name' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'floor' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $address->update([
            'building_number' => $request->building_number,
            'apartment_number' => $request->apartment_number,
            'street_name' => $request->street_name,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'floor' => $request->floor,
            'notes' => $request->notes,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Address updated successfully',
            'data' => $address
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $address = Address::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->first();
        if (!$address) {
            return response()->json([
                'success' => false,
                'message' => 'Address not found'
            ], 404);
        }

        if ($address->orders()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete address that is used in orders'
            ], 400);
        }

        $address->delete();

        return response()->json([
            'success' => true,
            'message' => 'Address deleted successfully'
        ]);
    }

    public function setDefault(Request $request, $id)
    {
        $address = Address::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->first();
        if (!$address) {
            return response()->json([
                'success' => false,
                'message' => 'Address not found'
            ], 404);
        }

        // إلغاء التعيين الافتراضي من جميع عناوين المستخدم
        Address::where('user_id', $request->user()->id)
            ->update(['is_default' => false]);

        // تعيين العنوان الحالي كافتراضي
        $address->update(['is_default' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Address set as default successfully',
            'data' => $address
        ]);
    }

    public function getDefault(Request $request)
    {
        $address = Address::where('user_id', $request->user()->id)
            ->where('is_default', true)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $address
        ]);
    }
}