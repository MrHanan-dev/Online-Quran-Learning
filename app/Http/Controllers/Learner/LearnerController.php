<?php

namespace App\Http\Controllers\Learner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Learner;
use App\Models\Tutor;
use App\Models\Course;
use App\Models\LearningMaterial;


class LearnerController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'learner_name'=>'required',
              'email'=>'required|email|unique:learners,email',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $learner = new Learner();
          $learner->learner_name = $request->learner_name;
          $learner->email = $request->email;
          $learner->gender = $request->gender;
          $learner->age = $request->age;
          $learner->phone = $request->phone;
          $learner->country = $request->country;
          $learner->toLearn = $request->toLearn;
          $learner->password = \Hash::make($request->password);
          $save = $learner->save();

          if( $save ){
              return redirect('/learner/login')->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:learners,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('learner.home');
        }else{
            return redirect()->route('learner.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function editProfile($id)
      {
        $learner = Learner::find($id);
        return view('learner.dashboard.editProfile')->with('learner', $learner);
      }

      public function viewProfile($id)
        {
          $learner = Learner::find($id);
          return view('learner.dashboard.viewProfile')->with('learner', $learner);
        }

    public function updateProfilePhoto(Request $request ,$id)
    {

      $learner = Learner::find($id);

      $photo=$request->file('image')->getClientOriginalName();
      $learner->photo=$photo;
      $request->file('image')->move(public_path('/assets/images/learnerProfile-Pictures/'),$photo);
      $save = $learner->save();

      return redirect()->back()->with('success' , 'Record Updated');
    }

    public function updatePersonalInfo(Request $request ,$id)
    {

      $learner = Learner::find($id);
      $learner->learner_name = request('learner_name');
      $learner->email = $request->email;
      $learner->age = $request->age;
      $learner->phone = $request->phone;
      $learner->gender = $request->gender;
      $learner->toLearn = $request->toLearn;

      $save = $learner->save();

      return redirect()->back()->with('success' , 'Record Updated');
    }

    public function updatePassword(Request $request ,$id)
    {

      $request->validate([
          'password'=>'required|min:5|max:30',
          'cpassword'=>'required|min:5|max:30|same:password'
      ]);

      $learner = Learner::find($id);
      $learner->password = \Hash::make($request->password);
      $save = $learner->save();

      if( $save ){
            return redirect()->back()->with('success' , 'Password Updated');
      }else{
          return redirect()->back()->with('fail' , 'Something went wrong failed to register');
      }

    }

    public function findTutor()
    {

      $learner = Tutor::all();

      return view('learner.dashboard.findTutor')->with( 'learner', $learner);
    }

    public function showTutor($id)
    {
      $tutor = Tutor::find($id);

      $courses= Course::where('tutor_id' , $id)->get();

      return view('learner.dashboard.viewTutor')->with(compact('tutor'))->with(compact('courses'));
    }

    public function viewCourse($id)
    {
        $course= Course::find($id);
        $material = LearningMaterial::where('course_id' , $id)->get();

        return view('learner.dashboard.viewCourse')
        ->with(compact('course'))
        ->with(compact('material'));
    }

    public function myCourses()
    {

      $learner_id = Auth::guard('web')->user()->id;

      $courses = DB::table('enrolled_learners')
                 ->join('courses', 'enrolled_learners.course_id', '=', 'courses.id')
                 ->join('tutors', 'enrolled_learners.tutor_id', '=', 'tutors.id')
                 ->select('courses.*', 'tutors.id as tutorID', 'tutors.name as tutorName')
                 ->where('enrolled_learners.learner_id',$learner_id)
                 ->get();

      return view('learner.dashboard.myCourses')->with('courses', $courses);
    }


    public function viewEnrolledCourse($id)
    {

     $course= Course::find($id);
     $material = LearningMaterial::where('course_id' , $id)->get();

     return view('learner.dashboard.viewEnrolledCourse')
     ->with(compact('course'))
     ->with(compact('material'));
    }

    public function leaveCourse($id)
    {

      $course_id = $id;
      $learner_id = Auth::guard('web')->user()->id;

      $courses = DB::table('enrolled_learners')
                 ->join('courses', 'enrolled_learners.course_id', '=', 'courses.id')
                 ->join('tutors', 'enrolled_learners.tutor_id', '=', 'tutors.id')
                 ->select('courses.*', 'tutors.id as tutorID', 'tutors.name as tutorName')
                 ->where('enrolled_learners.learner_id',$learner_id)
                 ->where('enrolled_learners.course_id',$course_id)
                 ->delete();

      return redirect('/learner/myCourses')->with('leave, You Have Left The Course Successfully');

    }


}
