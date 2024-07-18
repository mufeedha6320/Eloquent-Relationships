<?php

namespace App\Http\Controllers;

use App\Models\MyPost;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Traveller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //one traveller has one address
    public function one(){
        $travellers = Traveller::with('address')->get();
        // $travellers = Traveller::doesntHave('posts')->get(); //take users without posts
        // dd($travellers);
        return view('one',compact('travellers'));
    }

    //one traveller have many posts
    public function ToMany(){
        $travellers = Traveller::with('address','posts')->get();
        $myposts = MyPost::all()->keyBy('id');;
        return view('to_many', compact('travellers','myposts'));
    }

    //a post can have many tags | a tag can have many posts
    public function Many_Many(){
        $myposts = MyPost::all();
        $tags = Tag::all();
        return view('many_many', compact('myposts','tags'));
    }

    //relations
    public function post_table(){
        $myposts = MyPost::latest()->get();
        $tags = Tag::all();
        return view('show_tables.post_tb',compact('myposts','tags'));
    }
    public function tag_table(){
        $tags = Tag::all();
        return view('show_tables.tag_tb',compact('tags'));
    }
    public function post_to_tags(){
        $myposts = MyPost::all();
        $tags = \App\Models\Tag::all();
        return view('show_tables.post_to_tags',compact('myposts','tags'));
    }
    public function tag_to_posts(){
        $myposts = MyPost::all();
        $tags = \App\Models\Tag::all();
        return view('show_tables.tag_to_posts',compact('myposts','tags'));
    }


    // ******************************************
    public function save_post(Request $request){
        try{
            $request->validate([
                'post' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'nullable|string',
            ]);
            $post = MyPost::create([
                'post_name' => $request->input('post'),
            ]);

            $enteredTags = $request->input('tags', []);

            foreach ($enteredTags as $tag) {
                if (!empty($tag)) {
                    $existingTag = Tag::firstOrCreate(['tag_name' => $tag]);
                    $post->tags()->attach([
                        $existingTag->id =>  [ 'status' => 'approved'],
                    ]);
                }
            }
        }
        catch(Exception $e){
            dd($e);
        }


        return redirect()->route('post.table')->with('success','added');
    }
    public function save_tag(Request $request){
        Tag::create([
            'tag_name' => $request->input('tag')
        ]);
        return redirect()->route('tag.table')->with('success','tag added');
    }
    public function edit_post($id){
        $mypost = MyPost::findOrFail($id);
        return view('show.edit_post', compact('mypost'));
    }

    public function edit_tag($id){
        $tag = Tag::findOrFail($id);
        return view('show.edit_tag', compact('tag'));
    }
    public function detach_post($tagId,$postId){
        $tag = Tag::find($tagId);
        $tag->myposts()->detach([$postId]);
        return redirect()->back()->with('success','Post removed successfully');

    }
    public function detach_tag($postId,$tagId){
        $post = MyPost::find($postId);
        $post->tags()->detach([$tagId]);
        return redirect()->back()->with('success','Tag removed successfully');
    }
    public function destroy_post($postId)
    {
        $post = MyPost::findOrFail($postId);
        $post->delete(); //MyPost.php has detach operation
        return redirect()->back()->with('success', 'Post and its tags have been successfully removed');
    }
}

 // // query to find developers
        // $developers = Traveller::whereHas('posts', function($query){
        //     $query->where('posts', 'like', '%developer%');
        // });

