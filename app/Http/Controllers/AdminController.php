<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Tutor;
use App\Models\Learner;
use App\Models\Course;
use App\Models\EnrolledLearners;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function total()
    {
        $learner = Learner::count();
        $tutor = Tutor::count();
        $enrolledlearner=EnrolledLearners::count();
        $income = collect($learner, $tutor);

        $income->all();
        return view('admin.home', compact('learner', 'tutor','enrolledlearner','income'));
    }
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function tutors()
    {
        $tutor = Tutor::all();
        return view('admin.tutor')->with('tutor',$tutor);
    }
    public function showTutor($id)
    {
      $tutor = Tutor::find($id);
      $course = Course::where('tutor_id',$id)->get();
      return view('admin.viewTutor')->with(compact('tutor'))->with(compact('course'));
    }
    public function destroy($id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();
        return redirect('/admin/tutor');
    }
    public function learners()
    {
        $tutor = Learner::all();
        return view('admin.learner')->with('tutor',$tutor);
    }
    public function showLearner($id)
    {
      $tutor = Learner::find($id);
      return view('admin.viewLearner')->with('tutor',$tutor);
    }
    public function destroyLearner($id)
    {
        $learner = Learner::find($id);
        $learner->delete();
        return redirect('/admin/learner');
    } 
}
