<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostAddController extends Controller
{
    public function WritePost(){
        $category=DB::table('categories')->get();
        return view('post.writepost', compact('category'));
    }
    public function StorePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function AllPost(){
        $post = DB::table('posts')->get();
        return view('post.all_post', compact('post'));
    }
}
