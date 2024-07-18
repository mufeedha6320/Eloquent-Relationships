<?php

namespace App\Http\Controllers;

use App\Models\MyPost;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManyToMany extends Controller
{
    // //Attach a tag to many posts
    // public function toTag(Request $request){
    //     try{
    //         $request->validate([
    //             'posts' => 'required|array',
    //             'posts.*' => 'nullable|exists:posts,id',
    //         ]);
    //         // Get the selected posts
    //         $selectedPosts = $request->input('posts', []);
    //         $success = '';
    //         $error = '';
    //         $tagId=Tag::find($request->tag);
    //         // dd($selectedPosts, $tagId);
    //         foreach ($selectedPosts as $postId) {
    //             if (!empty($postId)) {
    //                 // Check if the post is already attached to the tag
    //                 $exists = DB::table('post_tag')
    //                             ->where('tag_id', $tagId->id)
    //                             ->where('post_id', $postId)
    //                             ->exists();
    //                 if (!$exists) {
    //                     // Attach the post to the tag
    //                     $tagId->myposts()->attach($postId);
    //                     $success = 'Tags are attached to the post';
    //                 } else {
    //                     $error = 'Already attached tags are found';
    //                 }
    //             }
    //         }
    //         return redirect()->route('many.to.many')->with('success',$success . ' ' . $error );
    //     } catch (Exception $e){
    //         dd("caught : ", $e);
    //     }
    // }

    //attach post with many tags
    public function toPost(Request $request){
        $request->validate([
            'tags' => 'required|array',
            'tags.*' => 'nullable|exists:tags,id',
        ]);
        $selectedtags = $request->input('tags', []);

        $postId=MyPost::find($request->post);
        foreach ($selectedtags as $tagId) {
            if (!empty($tagId)) {
                $exists = DB::table('post_tag')
                                ->where('tag_id', $tagId)
                                ->where('post_id', $postId->id)
                                ->exists();
                    if (!$exists) {
                        $postId->tags()->attach([ $tagId ]);
                    }
                }
        }
        return redirect()->route('many.to.many')->with('success','Posts are attached to the tag without duplication!');
    }
}

