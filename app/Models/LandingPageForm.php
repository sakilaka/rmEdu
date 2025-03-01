<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageForm extends Model
{
    use HasFactory;

    protected $table = 'landing_page_form';
    protected $fillable = [
        'name',
        'contact',
        'education',
        'message',
    ];
}
