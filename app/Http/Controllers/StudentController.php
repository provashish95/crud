<?php

namespace App\Http\Controllers;

use App\Student;
use http\Env\Response;
use Illuminate\Http\Request;
//This DB for query builder...
use DB;
//This DB for query builder...
class StudentController extends Controller
{
   public function Student(){
      return view('student.create');
   }
    public function AllStudent(){
//        $student = DB::table('students')->latest()->get();
        $student = Student::all();
        return view('student.all_student', compact('student'));
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
   public function ViewStudent($id){
//       $student = DB::table('students')->where('id', $id)->first();
       $student =Student::findorfail($id);
       return view('student.view_student', compact('student'));
   }

   public function DeleteStudent($id){
//       $student = DB::table('students')->where('id', $id)->delete();

       $student =Student::findorfail($id);
       $student->delete();
       $notification=array(
           'messege'=>'Successfully Student Deleted',
           'alert-type'=>'success'
       );
       return Redirect()->back()->with($notification);
   }
   public function EditStudent($id){
//       $student = DB::table('students')->where('id', $id)->first();
       $student =Student::findorfail($id);
       return view('student.edit_student',compact('student'));
   }
   public function UpdateStudent(Request $request, $id){
       $validatedData = $request->validate([
           'name' => 'required|max:25',
           'phone' => 'required|max:12|min:9',
           'email' => 'required',
       ]);
//this is eloquent by model.....//this is eloquent by model.....
       $student =Student::findorfail($id);
       $student->name=$request->name;
       $student->email=$request->email;
       $student->phone=$request->phone;
       $student->save();
//this is eloquent by model.....//this is eloquent by model.....

//this is query builder...//this is query builder...
//       $data=array();
//       $data['name']=$request->name;
//       $data['email']=$request->email;
//       $data['phone']=$request->phone;
//       $student=DB::table('students')->where('id',$id)->update($data);
//this is query builder...//this is query builder...

       if ($student) {
           $notification=array(
               'messege'=>'Successfully students data Updated',
               'alert-type'=>'info'
           );
           return Redirect()->route('all.student')->with($notification);
       }else{
           $notification=array(
               'messege'=>'Nothing to updated',
               'alert-type'=>'error'
           );
           return Redirect()->route('all.student')->with($notification);
       }
   }


}
