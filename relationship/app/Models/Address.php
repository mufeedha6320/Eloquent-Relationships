<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function travel(){
        return $this->belongsTo(Traveller::class); //FK : funName_id , here travel_id
    }
}
