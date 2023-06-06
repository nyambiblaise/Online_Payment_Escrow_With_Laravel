<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatNotification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['formatted_date'];


    public function getFormattedDateAttribute(){
        return $this->created_at->format('M d, Y h:i A');
    }

    public function escrow()
    {
        return $this->belongsTo(Escrow::class,'escrow_id');
    }
    public function chatNotificational()
    {
        return $this->morphTo();
    }


}
