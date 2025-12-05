<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = ['program_id', 'start_point', 'end_point', 'route_coordinates'];
    protected $casts = [
        'route_coordinates' => 'array',
    ];

    public function program(){
        return $this->belongsTo(Program::class);
    }
}
