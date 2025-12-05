<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedule = Schedule::with(['program', 'guide', 'price', 'registrations'])->get();

        if ($schedule->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Schedules Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Schedules',
            'data' => $schedule
        ], 200);
    }

    public function show(string $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                "success" => false,
                "message" => "Schedule Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Schedule',
            'data' => $schedule
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_id' => 'required|exists:programs,id',
            'guide_id' => 'required|exists:guides,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'quota' => 'required|integer|min:1',
            'price_id' => 'nullable|exists:prices,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $program = Program::find($request->program_id);

        // CEK PAYMENT TYPE
        if ($program->payment_type === 'awal' && !$request->price_id) {
            return response()->json([
                'success' => false,
                'message' => 'Program ini membutuhkan price_id karena bayar di awal.'
            ], 422);
        }

        if ($program->payment_type === 'akhir') {
            $request['price_id'] = null;
        }

        $schedule = Schedule::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Schedule Added Successfully!',
            'data' => $schedule,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                "success" => false,
                "message" => "Schedule Not Found!"
            ]);
        }

        $validator = Validator::make($request->all(), [
            'program_id' => 'required|exists:programs,id',
            'guide_id' => 'required|exists:guides,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'quota' => 'required|integer|min:1',
            'price_id' => 'nullable|exists:prices,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $program = Program::find($request->program_id);

        if ($program->payment_type === 'awal' && !$request->price_id) {
            return response()->json([
                'success' => false,
                'message' => 'Program ini membutuhkan price_id karena bayar di awal.'
            ], 422);
        }

        if ($program->payment_type === 'akhir') {
            $request['price_id'] = null;
        }

        // UPDATE DATA
        $schedule->update([
            'program_id' => $request->program_id,
            'guide_id' => $request->guide_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'quota' => $request->quota,
            'price_id' => $request->price_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Schedule Updated Successfully!',
            'data' => $schedule,
        ], 200);
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                "success" => false,
                "message" => "Schedule Not Found!"
            ]);
        }

        $schedule->delete();

        return response()->json([
            'success' => true,
            'message' => 'Schedule Deleted Successfully!',
            'data' => $schedule,
        ], 200);
    }
}
