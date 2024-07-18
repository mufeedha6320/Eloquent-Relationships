<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManyToMany;
use App\Http\Controllers\OneToMany;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('one-to-one',[HomeController::class,'one'])->name('one.to.one');
Route::get('one-to-many',[HomeController::class,'ToMany'])->name('one.to.many');
Route::get('many-to-many',[HomeController::class,'Many_Many'])->name('many.to.many');

//relations - POSTS & TAGS
Route::get('post-table',[HomeController::class,'post_table'])->name('post.table');
Route::get('tag-table',[HomeController::class,'tag_table'])->name('tag.table');

Route::get('post-to-tags',[HomeController::class,'post_to_tags'])->name('post.to.tags');
Route::get('tag-to-posts',[HomeController::class,'tag_to_posts'])->name('tag.to.posts');
Route::post('save-post',[HomeController::class,'save_post'])->name('save.post');
Route::post('save-tag',[HomeController::class,'save_tag'])->name('save.tag');
//detach
Route::get('edit-post/{id}',[HomeController::class,'edit_post'])->name('edit.post');
Route::get('edit-tag/{id}',[HomeController::class,'edit_tag'])->name('edit.tag');
Route::get('{tagId}/detach-post/{postId}',[HomeController::class,'detach_post'])->name('detach.post');
Route::get('{postId}/detach-tag/{tagId}',[HomeController::class,'detach_tag'])->name('detach.tag');
Route::get('destroy-post/{id}',[HomeController::class,'destroy_post'])->name('destroy.post');



Route::prefix('one-to-many')->group(function () {
    Route::post('/save',[OneToMany::class,'save'])->name('om.save');
    Route::get('/delete/{id}',[OneToMany::class,'omDelete'])->name('om.delete');
});

Route::prefix('many-to-many')->group(function () {
    Route::post('/save',[ManyToMany::class,'save'])->name('mm.save');
    Route::post('/to-tag',[ManyToMany::class, 'toTag'])->name('to.tag');
    Route::post('/to-post',[ManyToMany::class, 'toPost'])->name('to.post');
});


Route::get('/seeder', function () {
    /***\App\Models\Tag::create([
        'tag_name' =>'Laravel'
    ]);
    \App\Models\Tag::create([
        'tag_name' =>'PHP'
    ]);
    \App\Models\Tag::create([
        'tag_name' =>'Jet'
    ]);
    $tags = \App\Models\Tag::first();
    $post = \App\Models\Post::first();
    $post->tags()->attach([$tags]); ***/

});
