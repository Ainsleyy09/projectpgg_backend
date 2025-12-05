<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Schedule;
use App\Notifications\GuideNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{

    public function index()
    {
        $registration = Registration::with([
            'user',
            'schedule.program',
            'schedule.price',
            'schedule.guide',
            'schedule.program.routes'
        ])->get();

        if ($registration->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Registration Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Registrations',
            'data' => $registration
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
            'name' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'instagram' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // user login
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        // Pastikan user tidak mendaftar dua kali di schedule yang sama
        $existing = Registration::where('user_id', $request->user_id)
            ->where('schedule_id', $request->schedule_id)
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu sudah terdaftar di jadwal ini!'
            ], 409);
        }

        // Generate order number
        $orderNumber = 'PGG-' . strtoupper(uniqid());

        $schedule = Schedule::findOrFail($request->schedule_id);

        if ($schedule->quota <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Kuota jadwal sudah penuh!'
            ], 400);
        }

        $registration = Registration::create([
            'user_id' => $request->user_id,
            'schedule_id' => $request->schedule_id,
            'order_number' => $orderNumber,
            'name' => $request->name,
            'region' => $request->region,
            'phone' => $request->phone,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'status' => 'menunggu',
        ]);

        // Kurangi quota
        $schedule->decrement('quota');

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil disimpan, menunggu konfirmasi admin.',
            'data' => $registration
        ], 201);
    }

    public function show(string $id)
    {
        $registration = Registration::with([
            'user',
            'schedule.program',
            'schedule.price',
            'schedule.guide',
            'schedule.program.routes'
        ])->find($id);

        if (!$registration) {
            return response()->json([
                "success" => false,
                "message" => "Registration Not Found!"
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Registration',
            'data' => $registration
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::with('schedule.program.routes', 'user')->find($id);

        if (!$registration) {
            return response()->json([
                "success" => false,
                "message" => "Registration Not Found!"
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:menunggu,dikonfirmasi,selesai,batal',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $registration->update([
            'status' => $request->status,
        ]);

        if ($request->status === 'dikonfirmasi') {

            $route = $registration->schedule->program->routes()->orderBy('id')->first();

            $startPoint = $route->start_point ?? '-';
            $endPoint   = $route->end_point   ?? '-';

            $paymentType = $registration->schedule->program->payment_type;

            $registration->user->notify(
                new GuideNotification($registration, $startPoint, $endPoint, $paymentType)
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Status pendaftaran berhasil diperbarui.',
            'data' => $registration
        ], 200);
    }

    public function destroy($id)
    {
        $registration = Registration::find($id);

        if (!$registration) {
            return response()->json([
                "success" => false,
                "message" => "Registration Not Found!"
            ], 400);
        }

        $registration->delete();
        return response()->json([
            "success" => true,
            "message" => "Registration Deleted Successfully!",
        ], 200);
    }
}
