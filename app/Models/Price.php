<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = ['program_id', 'price', 'description'];

    public function program(){
        return $this->belongsTo(Program::class);
    }
}
