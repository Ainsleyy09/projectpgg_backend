<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $fillable = ['name', 'description', 'payment_type', 'program_type', 'duration', 'program_photo', 'status'];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
