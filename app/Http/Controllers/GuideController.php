<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();

        if ($guides->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Guides Not Found!"
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Get All Guides",
            "data" => $guides
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:guides,email',
            'instagram' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $image = $request->file('photo');
        $image->store('guides', 'public');

        $guide = Guide::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->role,
            'email' => $request->email,
            'bio' => $request->bio,
            'instagram' => $request->instagram,
            'photo' => $image->hashName(),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Guide Added Successfully!",
            "data" => $guide
        ], 201);
    }


    public function show(string $id)
    {
        $guides = Guide::find($id);

        if (!$guides) {
            return response()->json([
                "success" => false,
                "message" => "Guides Not Found!"
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Get Detail Guides",
            "data" => $guides
        ]);
    }

    public function update(Request $request, $id)
    {
        $guide = Guide::find($id);

        if (!$guide) {
            return response()->json([
                "success" => false,
                "message" => "Guide Not Found",
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:guides,email,' . $id,
            'bio' => 'nullable|string',
            'instagram' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->role,
            'email' => $request->email,
            'bio' => $request->bio,
            'instagram' => $request->instagram,
        ];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('guides', 'public');

            if ($guide->photo) {
                Storage::disk('public')->delete('guides/' . $guide->photo);
            }

            $data['photo'] = $image->hashName();
        }

        $guide->update($data);

        return response()->json([
            "success" => true,
            "message" => "Guide Updated Successfully!",
            "data" => $guide
        ], 200);
    }

    public function destroy($id)
    {
        $guide = Guide::find($id);

        if (!$guide) {
            return response()->json([
                "success" => false,
                "message" => "Guide Not Found",
            ], 404);
        }

        if ($guide->photo) {
            Storage::disk('public')->delete('guides/' . $guide->photo);
        }

        $guide->delete();
        return response()->json([
            "success" => true,
            "message" => "Guide Deleted Successfully!",
        ], 200);
    }
}
