<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::with('user')->get();

        if ($feedback->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Feedback Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Feedbacks',
            'data' => $feedback
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $feedback = Feedback::create([
            'user_id'   => $request->user_id,
            'rating'    => $request->rating,
            'comments'  => $request->comments,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback added successfully!',
            'data' => $feedback,
        ], 201);
    }

    public function show(string $id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json([
                "success" => false,
                "message" => "Feedback Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Feedback',
            'data' => $feedback
        ], 200);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json([
                "success" => false,
                "message" => "Feedback Not Found!"
            ]);
        }

        $feedback->delete();

        return response()->json([
            'success' => true,
            'message' => 'Feedback Deleted Successfully!',
            'data' => $feedback,
        ], 200);
    }
}
