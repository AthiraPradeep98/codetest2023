<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard(){

        $post = Blog::latest()->limit(6)->get();

        return view('dashboard',compact('post'));

    }//end method

    public function AddPost(){
        return view('blog.blog_add');
    }//end
    public function StorePost(Request $request){

        Blog::insert([
            'post_title'=>$request->post_title,
            'post_content'=>$request->post_content,
            'created_at'=>Carbon::now(),
        ]);

        return view('dashboard');
    }//end

    public function EditPost($id){
        $blogpost = Blog::findOrFail($id);
        return view('blog.edit_post',compact('blogpost'));
    }//end

    public function ViewPost($id){
        $blogpost = Blog::findOrFail($id);
        return view('blog.view_post',compact('blogpost'));
    }//end

    public function UpdatePost(Request $request){

        $post_id=$request->id;

        Blog::findOrFail($post_id)->update([
            'post_title'=>$request->post_title,
            'post_content'=>$request->post_content,
            'updated_at'=>Carbon::now(),
        ]);

        return view('dashboard');
    }//end

    public function DeletePost($id){
        $post = Blog::findOrFail($id);
        Blog::findOrFail($id)->delete();

        return view('dashboard');
    }

}
