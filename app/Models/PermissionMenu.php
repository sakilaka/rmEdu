<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionMenu extends Model
{
    use HasFactory;
    function sub_menus(){
        return $this->hasMany(PermissionMenu::class,'parent_id','id');
    }
}
