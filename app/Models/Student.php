<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $fillable = ['first_name','last_name','gender','age','schoo_level_id'];
    protected $guarded = [''];


    public function school_level(){

        // u need always to write id with relationships 
        return $this->belongsTo(SchooLevel::class,'schoo_level_id');
    }
}
