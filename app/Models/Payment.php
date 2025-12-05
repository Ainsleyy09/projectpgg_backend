<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['registration_id','order_id', 'amount', 'payment_method', 'transaction_id', 'payment_date', 'status'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
