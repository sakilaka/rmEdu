<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    public function getCountry($country_id)
    {
        $country = Country::find($country_id);
        return $country['name'] ?? '';
    }
}
