<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskQuestion extends Model
{
    use HasFactory;

    public function university(){
        return $this->belongsTo(University::class,"university_id",'id');
    }
}
