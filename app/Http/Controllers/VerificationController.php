<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $record = DB::table('email_verifications')->where('token', $token)->first();

        if (!$record) {
            return "Token tidak valid atau sudah kadaluarsa!";
        }

        $user = User::find($record->user_id);

        if (!$user) {
            return "User tidak ditemukan!";
        }

        // verify email
        $user->email_verified_at = now();
        $user->save();

        // delete token
        DB::table('email_verifications')->where('token', $token)->delete();

        return "Email berhasil diverifikasi! Sekarang kamu bisa login.";
    }
}
