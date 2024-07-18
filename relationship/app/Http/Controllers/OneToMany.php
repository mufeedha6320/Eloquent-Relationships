<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\MyPost;
use App\Models\Post;
use App\Models\Traveller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class OneToMany extends Controller
{
    public function save(Request $request){

        $myposts = MyPost::all();
        $traveller = new Traveller([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $traveller->save();

        //ONE-TO-ONE
        // Create a new Address instance and associate it with the Traveller
        $address = new Address([
            'place' => $request->input('place'),
        ]);
        $address->travel()->associate($traveller);
        $address->save();

        //ONE-TO-MANY
        // Check if the request has 'post' data


        if ($request->has('posts')) {
            foreach ($request->input('posts') as $post) {
                if($post != Null){
                    $traveller->posts()->create([
                        'mypost_id' => $post,
                    ]);
                }
            }
        }
        return redirect()->route('one.to.many');
    }

    public function omDelete($id){
        $traveller = Traveller::findOrFail($id);
        $traveller->delete();

        return redirect()->route('one.to.many')->with('success', 'Traveller and related address and posts deleted successfully');
    }
}
