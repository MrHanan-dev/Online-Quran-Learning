<?php

namespace App\Http\Controllers;
use App\Models\Reciept;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadRecieptController extends Controller
{
    public function UploadReciept(Request $request)
    {

      $name = $request->file('file')->getClientOriginalName();
      $path =  $request->file('file')->storeAs('Recipts', $name, 'public');

      $data = new Reciept();
      $data->fileName = $name;
      $data->path = $path;

      $id= Auth::guard('web')->user()->id;
      $data->course_id = request('course_id');
      $data->tutor_id = request('tutor_id');
      $data->learner_id = $id;
      $data->save();
      return redirect()->back()->with('data' , $data);
    }
    public function paymentHistory()
    {
      $learner = Auth::guard('web')->user()->id;
      $course = DB::table('reciepts')
                   ->join('courses', 'reciepts.course_id', '=', 'courses.id')
                   ->join('tutors', 'reciepts.tutor_id', '=', 'tutors.id')
                   ->select('tutors.*','courses.name as course_name', 'courses.id as course_id', 'tutors.id as tutorID', 'tutors.name as tutor_name','reciepts.fileName', 'reciepts.path')
                   ->where('reciepts.learner_id',$learner)
                   ->get();
      return view('learner.dashboard.paymentHistory')->with('learner',$course);
    }

    public function viewReciept($id)
    {
      $learner = Auth::guard('web')->user()->id;
      $file = request('file');
      $data = DB::table('reciepts')
                   ->join('courses', 'reciepts.course_id', '=', 'courses.id')
                   ->join('tutors', 'reciepts.tutor_id', '=', 'tutors.id')
                   ->select('tutors.*','courses.name as course_name', 'courses.id as course_id', 'tutors.id as tutorID', 'tutors.name as tutor_name','reciepts.fileName', 'reciepts.path')
                   ->where('reciepts.learner_id',$learner)
                   ->where('reciepts.fileName',$file)
                   ->where('reciepts.course_id',$id)
                   ->first();

     return view('learner.dashboard.viewReciept',compact('data'));
    }
    public function paymentLearnerHistory()
    {
      $tutor = Auth::guard('tutor')->user()->id;
      $course = DB::table('reciepts')
                   ->join('courses', 'reciepts.course_id', '=', 'courses.id')
                   ->join('learners', 'reciepts.learner_id', '=', 'learners.id')
                   ->select('learners.*','courses.name as course_name','courses.id as course_id','reciepts.fileName','reciepts.path')
                   ->where('reciepts.tutor_id',$tutor)
                   ->get();
      return view('tutor.dashboard.paymentLearnerHistory')->with('learner',$course);
    }
    public function viewLearnerpayment($id)
    {
      $tutor = Auth::guard('tutor')->user()->id;
      $file = request('file');
      $data = DB::table('reciepts')
                   ->join('courses', 'reciepts.course_id', '=', 'courses.id')
                   ->join('tutors', 'reciepts.tutor_id', '=', 'tutors.id')
                   ->select('tutors.*','courses.name as course_name', 'courses.id as course_id', 'tutors.id as tutorID', 'tutors.name as tutor_name','reciepts.fileName', 'reciepts.path')
                   ->where('reciepts.tutor_id',$tutor)
                   ->where('reciepts.fileName',$file)
                   ->where('reciepts.course_id',$id)
                   ->first();
        return view('tutor.dashboard.viewLearnerpayment',compact('data'));
    }
}
