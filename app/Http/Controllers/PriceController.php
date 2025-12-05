<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price = Price::with('program')->get();

        if ($price->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Prices Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Prices',
            'data' => $price
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_id' => 'required|exists:programs,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // CEK JENIS PEMBAYARAN PROGRAM
        $program = \App\Models\Program::find($request->program_id);

        if ($program->payment_type === 'akhir') {
            return response()->json([
                'success' => false,
                'message' => 'Program ini menggunakan pembayaran di akhir, tidak boleh memiliki price.',
            ], 400);
        }

        $price = Price::create([
            'program_id' => $request->program_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Price Added Successfully!',
            'data' => $price,
        ], 201);
    }

    public function show(string $id)
    {
        $price = Price::find($id);

        if (!$price) {
            return response()->json([
                "success" => false,
                "message" => "Price Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Price',
            'data' => $price
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $price = Price::find($id);

        if (!$price) {
            return response()->json([
                "success" => false,
                "message" => "Price Not Found!"
            ]);
        }

        $validator = Validator::make($request->all(), [
            'program_id' => 'required|exists:programs,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $price->update([
            'program_id' => $request->program_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Price Updated Successfully!',
            'data' => $price,
        ], 200);
    }

    public function destroy($id)
    {
        $price = Price::find($id);

        if (!$price) {
            return response()->json([
                "success" => false,
                "message" => "Price Not Found!"
            ]);
        }

        $price->delete();

        return response()->json([
            'success' => true,
            'message' => 'Price Deleted Successfully!',
            'data' => $price,
        ], 200);
    }
}
