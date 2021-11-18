<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\demo;
use App\Models\Tutor;
use App\Models\Learner;
use App\Models\Course;

use App\Models\demoClassInvitation;




class TutorController extends Controller
{
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:tutors,email',
             'age'=>'required',
             'gender'=>'required',
             'country'=>'required',
             'phone'=>'required',
             'about'=>'required',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $tutor = new Tutor();
          $tutor->name = $request->name;
          $tutor->email = $request->email;
          $tutor->age = $request->age;
          $tutor->phone = $request->phone;
          $tutor->country = $request->country;
          $tutor->gender = $request->gender;
          $tutor->about = $request->about;
          $tutor->password = \Hash::make($request->password);
          $save = $tutor->save();

          if( $save ){
              return redirect('/tutor/login')->with('success','You are now registered successfully as Tutor');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:tutors,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in tutors table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('tutor')->attempt($creds) ){
            return redirect()->route('tutor.home');
        }else{
            return redirect()->route('tutor.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('tutor')->logout();
        return redirect('/');
    }


    public function viewProfile($id)
    {
      $tutor = Tutor::find($id);
      $courses= Course::where('tutor_id' , $id)->get();
      return view('tutor.dashboard.viewProfile')->with(compact('tutor'))->with(compact('courses'));
    }


    public function editProfile($id)
    {
      $tutor = Tutor::find($id);
      return view('tutor.dashboard.editProfile')->with('tutor', $tutor);
    }

    public function updateProfilePhoto(Request $request ,$id)
    {

      $tutor = Tutor::find($id);

      $photo=$request->file('image')->getClientOriginalName();
      $tutor->photo=$photo;
      $request->file('image')->move(public_path('/assets/images/tutorProfile-Pictures/'),$photo);
      $save = $tutor->save();

      return redirect()->back()->with('success' , 'Record Updated');
    }

    public function updatePersonalInfo(Request $request ,$id)
    {

      $tutor = Tutor::find($id);
      $tutor->name = $request->name;
      $tutor->email = $request->email;
      $tutor->age = $request->age;
      $tutor->phone = $request->phone;
      $tutor->age = $request->age;
      $tutor->country = $request->country;
      $tutor->gender = $request->gender;
      //$tutor->about = $request->about;


      $save = $tutor->save();

      return redirect()->back()->with('success' , 'Record Updated');
    }

    public function updatePassword(Request $request ,$id)
    {

      $tutor = Tutor::find($id);
      $tutor->password = \Hash::make($request->password);
      $save = $tutor->save();

      return redirect()->back()->with('success' , 'Record Updated');
    }


    public function findLearner()
     {

       $learner = Learner::all();

       return view('tutor.dashboard.findLearner')->with( 'learner', $learner);
     }

     public function showLearner($id)
     {
       $learner = Learner::find($id);
       return view('tutor.dashboard.viewLearner')->with('learner' , $learner);
     }






}
