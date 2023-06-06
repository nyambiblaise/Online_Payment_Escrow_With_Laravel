<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PayoutMethod extends Model
{
    protected $guarded = ['id'];
    protected $table = 'payout_methods';

    protected $casts = [
        'input_form' => 'object',
    ];
}
