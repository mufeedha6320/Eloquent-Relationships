<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id')
        ->withTimestamps()
        ->withPivot('status');
        // pivot is the intermediate table , now migrate
        // Default, pivot table name comes in alphabetical order,
        // you can specify your pivot tb name if you not following that rule
        // php artisan make:migration create_post_tag_tb --create=post_tag
    }
    //Events
    // Boot method to define the deleting event
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($mypost) {
            // Detach all tags
            $mypost->tags()->detach();
        });
    }
}
