<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escrow extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    public function invitee()
    {
        return $this->belongsTo(User::class, 'joiner_id');
    }
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
    public function favor()
    {
        return $this->belongsTo(User::class, 'favor_id');
    }


}
