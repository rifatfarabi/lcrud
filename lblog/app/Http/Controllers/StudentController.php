<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Session;

class StudentController extends Controller
{
    public function index(){

        // $students = Student::all();
        $students = Student::paginate(5);
        // $students = Student::simplePaginate(5);
        return view('welcome',compact('students'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required' 
        ]);
         $student = new Student;
         $student->first_name = $request->firstname;
         $student->last_name = $request->lastname;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->save();
         return redirect(route('home'))->with('successMsg','Student Successfully Added');
    }

        // Model e fillable dile eivabe kore
        // $student = Student::create([
        //     'first_name'=> $request->firstname,
        //     'last_name'=> $request->lastname,
        //     'email'=> $request->email,
        //     'phone'=> $request->phone 
        // ]);

    public function edit($id){
        $student = Student::find($id);
        return view('edit',compact('student'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required' 
        ]);
         $student = Student::find($id);
         $student->first_name = $request->firstname;
         $student->last_name = $request->lastname;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->save();
         return redirect(route('home'))->with('successMsg','Student Successfully Updated');
    }

    public function deleteData($id=null){
        $student = Student::find($id);
        $student->delete();
        Session::flash('successMsg','Student Successfully Deleted');
        return redirect(route('home'));
        // ->with('successMsg','Student Successfully Delete')
    }

}
