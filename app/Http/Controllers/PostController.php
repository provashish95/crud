<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use DB;

class PostController extends Controller
{
    public function WritePost(){
       return view('post.writepost');
    }
    public function AddCategory(){
        return view('post.add_category');
    }

    //Category crud here..........
    //Category crud here..........
    //Data insert Start here......//Data insert Start here......
    public function StoreCategory(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->insert($data);

        if ($category){
            $notification=array(
                'messege'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //Data insert Ending here......//Data insert Ending here......

      public function AllCategory(){
        $category = DB::table('categories')->get();
        return view('post.all_category', compact('category'));
      }
      public function ViewCategory($id){
       $category = DB::table('categories')->where('id', $id)->first();
//       return view('post.view_category')->with('category', $category);
          return view('post.view_category', compact('category'));
      }
      public function DeleteCategory($id){
        $category = DB::table('categories')->where('id', $id)->delete();
          $notification=array(
              'messege'=>'Successfully Category Deleted',
              'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);
      }
}
