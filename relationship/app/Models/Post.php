<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mypost(){
        return $this->hasMany(MyPost::class,'mypost_id');
    }
    public function travel(){
        return $this->belongsTo(Traveller::class); //FK : funName_id , here travel_id
    }

    

}
