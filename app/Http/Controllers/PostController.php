<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Index(){
        $posts =Post::orderBy('id','desc')->take(10)->get();
        return view('post.index')->withPosts($posts);
    }

    public function Edit($id){
        $post =Post::find($id);
        return view('post.edit')->withPost($post);
    }

    public function Create(){
        return view('post.create');
    }

    public function CreateSave(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $new =new Post();
        $new->title = $request->input('title');
        $new->body = $request->input('body');
        $new->save();

        return redirect()->route('post.index')->withSuccess('Record added');
    }

    public function EditSave(Request $request, $id){
        Post::find($id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);
        //$new =new Post();
        // $new->title = $request->input('title');
        // $new->body = $request->input('body');
        return redirect()->route('post.index')->withSuccess('Record updated');
    }

    
    public function Delete($id){
        Post::find($id)->delete();
        return redirect()->route('post.index')->withSuccess('Record Deleted');
    }
   
}
