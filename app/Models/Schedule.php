<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['program_id', 'guide_id', 'date', 'start_time', 'end_time', 'quota', 'price_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'schedule_id', 'id');
    }
}
