<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use App\Models\demoClassInvitation;
use App\Mail\demo;
use App\Models\Tutor;
use App\Models\Learner;
use App\Models\Course;


class DemoClassInvitationController extends Controller
{
    public function add()
    {
      $invitation = new demoClassInvitation();
      $invitation->course_id = request('course_id');
      $invitation->learner_id = request('learner_id');
      $invitation->tutor_id = request('tutor_id');
      $invitation->save();

      return redirect()->back()->with('success','Request for demo class has been sent, wait for approvel');
    }

    public function pendingDemoClassRequests()
    {
      $tutor = Auth::guard('tutor')->user()->id;

      $learner = DB::table('demo_class_invitations')
               ->join('learners', 'demo_class_invitations.learner_id', '=', 'learners.id')
               ->join('courses', 'demo_class_invitations.course_id', '=', 'courses.id')
               ->select('learners.*', 'demo_class_invitations.appovre', 'courses.name', 'courses.fees', 'courses.duration', 'courses.schedule', 'courses.howToConduct')
               ->where('demo_class_invitations.tutor_id',$tutor)
               ->get();


      return view('tutor.dashboard.pendingRequests')->with( 'learner', $learner);
    }



   public function approve($learner_id)
   {
       $learner = Learner::find($learner_id);

       $tutor = Auth::guard('tutor')->user()->id;
       $course_name = request('course_name');
       $course_fees = request('course_fees');
       $course_duration = request('course_duraton');
       $course_schedule = request('course_schedule');
       $course_howToConduct = request('course_howToConduct');


       $details = [
           'title' => 'Demo Class Request',
           'body' => 'Your request for demo class has been Approved',
           'Course-Name' => $course_name,
           'Course-schedule' => $course_schedule,
           'Course-howToConduct' => $course_howToConduct,
       ];
       Mail::to($learner->email)->send(new demo($details));


       $toApprove = DB::table('demo_class_invitations')
                   ->join('learners', 'demo_class_invitations.learner_id', '=', 'learners.id')
                   ->join('courses', 'demo_class_invitations.course_id', '=', 'courses.id')
                   ->select('learners.*', 'courses.name', 'courses.schedule', 'courses.howToConduct')
                   ->where('demo_class_invitations.tutor_id',$tutor)
                   ->where('demo_class_invitations.learner_id',$learner_id)
                   ->where('courses.name',$course_name)
                   ->where('courses.schedule',$course_schedule)
                   ->where('courses.howToConduct',$course_howToConduct);

       $toApprove->delete();

       return redirect()->back()->with('success' , 'Request Approved');
   }

   public function reject($learner_id)
   {
       $learner = Learner::find($learner_id);

       $tutor = Auth::guard('tutor')->user()->id;
       $course_name = request('course_name');
       $course_fees = request('course_fees');
       $course_duration = request('course_duraton');
       $course_schedule = request('course_schedule');
       $course_howToConduct = request('course_howToConduct');


       $details = [
           'title' => 'Demo Class Request',
           'body' => 'Your demo class request for this course has been Rejected',
           'Course-Name' => $course_name,
           'Course-schedule' => $course_schedule,
           'Course-howToConduct' => $course_howToConduct,
       ];
       Mail::to($learner->email)->send(new demo($details));


       $toReject = DB::table('demo_class_invitations')
                   ->join('learners', 'demo_class_invitations.learner_id', '=', 'learners.id')
                   ->join('courses', 'demo_class_invitations.course_id', '=', 'courses.id')
                   ->select('learners.*', 'courses.name', 'courses.schedule', 'courses.howToConduct')
                   ->where('demo_class_invitations.tutor_id',$tutor)
                   ->where('demo_class_invitations.learner_id',$learner_id)
                   ->where('courses.name',$course_name)
                   ->where('courses.schedule',$course_schedule)
                   ->where('courses.howToConduct',$course_howToConduct);

       $toReject->delete();

       return redirect()->back()->with('fail' , 'Request Rejected');
    }
}
