<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('post.all_category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add_category');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);
        $category = new Category;
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $category = DB::table('categories')->where('id', $id)->first();
        $category = Category::findorfail($id);
        return view('post.view_category', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $category = DB::table('categories')->where('id', $id)->first()
          $category = Category::findorfail($id);
        return view('post.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);
        $category = Category::findorfail($id);
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        if ($category) {
            $notification=array(
                'messege'=>'Successfully Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->to('category')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Nothing to updated',
                'alert-type'=>'error'
            );
            return Redirect()->to('category')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $category = DB::table('categories')->where('id', $id)->delete();
        $category = Category::findorfail($id);
        $category->delete();
        $notification=array(
            'messege'=>'Successfully Category Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
