<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();

        if ($program->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Programs Not Found!'
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Get All Programs",
            "data" => $program
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'payment_type' => 'required|in:awal,akhir',
            'program_type' => 'required|in:regular,event,private,special',
            'duration' => 'required|string|max:100',
            'program_photo' => 'required|image|mimes:jpeg,jpg,png|max:10240',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        $image = $request->file('program_photo');
        $image->store('programs', 'public');

        $program = Program::create([
            'name' => $request->name,
            'description' => $request->description,
            'payment_type' => $request->payment_type,
            'program_type' => $request->program_type,
            'duration' => $request->duration,
            'program_photo' => $image->hashName(),
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Program Added Successfully!",
            "data" => $program
        ], 201);
    }

    public function show(string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Programs Not Found!'
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Get Detail Programs",
            "data" => $program
        ]);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Programs Not Found!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'payment_type' => 'required|in:awal,akhir',
            'program_type' => 'required|in:regular,event,private,special',
            'duration' => 'required|string|max:100',
            'program_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'payment_type' => $request->payment_type,
            'program_type' => $request->program_type,
            'duration' => $request->duration,
            'status' => $request->status,
        ];

        if ($request->hasFile('program_photo')) {
            $image = $request->file('program_photo');
            $image->store('programs', 'public');

            if ($program->program_photo) {
                Storage::disk('public')->delete('programs/' . $program->program_photo);
            }

            $data['program_photo'] = $image->hashName();
        }

        $program->update($data);

        return response()->json([
            "success" => true,
            "message" => "Program Updated Successfully!",
            "data" => $program
        ], 200);
    }

    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Programs Not Found!'
            ]);
        }

        if ($program->program_photo) {
            Storage::disk('public')->delete('programs/' . $program->program_photo);
        }

        $program->delete();
        return response()->json([
            "success" => true,
            "message" => "Program Deleted Successfully!",
        ], 200);
    }
}
