<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function Student(){
      return view('student.create');
   }
   public function StoreStudent(Request $request){
            $validatedData = $request->validate([
                'name' => 'required|max:25',
                'phone' => 'required|unique:students|max:12|min:9',
                'email' => 'required|unique:students',
       ]);
         $student = new Student;
         $student->name = $request->name;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->save();
       if ($student){
           $notification=array(
               'messege'=>'Successfully  Inserted',
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
}
