<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $route = Route::with('program')->get();

        if ($route->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Routes Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Routes',
            'data' => $route
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_id' => 'required|exists:programs,id',
            'start_point' => 'required|string|max:255',
            'end_point' => 'required|string|max:255',
            'route_coordinates' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $route = Route::create([
            'program_id' => $request->program_id,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'route_coordinates' => $request->route_coordinates,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Route Added Successfully!',
            'data' => $route,
        ], 201);
    }

    public function show(string $id)
    {
        $route = Route::find($id);

        if (!$route) {
            return response()->json([
                "success" => false,
                "message" => "Route Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Route',
            'data' => $route
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $route = Route::find($id);

        if (!$route) {
            return response()->json([
                "success" => false,
                "message" => "Route Not Found!"
            ]);
        }

        $validator = Validator::make($request->all(), [
            'program_id' => 'required|exists:programs,id',
            'start_point' => 'required|string|max:255',
            'end_point' => 'required|string|max:255',
            'route_coordinates' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $route->update([
            'program_id' => $request->program_id,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'route_coordinates' => $request->route_coordinates,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Route Updated Successfully!',
            'data' => $route,
        ], 200);
    }

    public function destroy($id)
    {
        $route = Route::find($id);

        if (!$route) {
            return response()->json([
                "success" => false,
                "message" => "Route Not Found!"
            ]);
        }

        $route->delete();

        return response()->json([
            'success' => true,
            'message' => 'Route Deleted Successfully!',
            'data' => $route,
        ], 200);
    }
}
