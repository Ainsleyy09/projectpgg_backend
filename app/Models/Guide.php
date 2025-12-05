<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = 'guides';
    protected $fillable = ['name', 'phone', 'role', 'email', 'bio', 'instagram', 'photo'];
}
