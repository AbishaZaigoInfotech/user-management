<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function setNameAttribute($value){
        $this->attributes['name']="Mr/Ms. ".$value;
    }
    public function getEmailAttribute($value){
        return ucFirst($value);
    }
}
