<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    use HasFactory;
    protected $guarded = [];

    // one address
    public function address(){
        return $this->hasOne(Address::class,'travel_id','id'); //(model_name, 'foreign_key', 'local_primary_key')

    }
    // many posts
    public function posts(){
        return $this->hasMany(Post::class,'travel_id','id');
    }

}
