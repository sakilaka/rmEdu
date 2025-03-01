<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCart extends Model
{
    use HasFactory;
    public function event(){
        return $this->belongsTo(Event::class,"event_id",'id');
    }
    public function order(){
        return $this->belongsTo(EventParticipant::class,"order_id",'id');
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id",'id');
    }




}
