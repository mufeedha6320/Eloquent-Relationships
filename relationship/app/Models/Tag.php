<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function myposts(){
        return $this->belongsToMany(MyPost::class,'post_tag','tag_id','post_id');
    }
}
