<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerBankAccount extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function bank(): HasOne
    {
        return $this->hasOne(Bank::class,'id','bank_id');
    }
}
