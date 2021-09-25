<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }

    
}