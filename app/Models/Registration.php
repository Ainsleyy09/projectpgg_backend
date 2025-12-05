<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';
    protected $fillable = ['user_id', 'schedule_id', 'order_number', 'name', 'region', 'phone', 'email', 'instagram', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule(): mixed
    {
        return $this->belongsTo(Schedule::class);
    }
}
