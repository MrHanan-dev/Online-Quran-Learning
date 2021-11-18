<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use App\Mail\demo;
use App\Models\EnrolledLearners;
use App\Models\Learner;
use App\Models\enrollmentInvitations;

class enrollmentInvitationsController extends Controller
{
      public function add()
      {
        $enrollmentInvitation = new enrollmentInvitations();
        $enrollmentInvitation->course_id = request('course_id');
        $enrollmentInvitation->learner_id = request('learner_id');
        $enrollmentInvitation->tutor_id = request('tutor_id');
        $enrollmentInvitation->save();

        return redirect()->back()->with('success','Enrollment Request has been sent, wait for approvel');
      }


      public function enrollmentRequests()
      {
        $tutor = Auth::guard('tutor')->user()->id;

        $learner = DB::table('enrollment_invitations')
                 ->join('learners', 'enrollment_invitations.learner_id', '=', 'learners.id')
                 ->join('courses', 'enrollment_invitations.course_id', '=', 'courses.id')
                 ->select('learners.*', 'courses.id as courseID' ,'courses.name', 'courses.schedule', 'courses.howToConduct')
                 ->where('enrollment_invitations.tutor_id',$tutor)
                 ->get();


        return view('tutor.dashboard.enrollmentInvitations')->with(compact('learner'));
       }



     public function approve($learner_id)
     {
         $learner = Learner::find($learner_id);
         $tutor = Auth::guard('tutor')->user()->id;
         $course_name = request('course_name');
         $course_schedule = request('course_schedule');
         $course_howToConduct = request('course_howToConduct');


         $details = [
             'title' => 'Course Enrollment Request',
             'body' => 'Your request for course enrollment has been Approved',
             'Course-Name' => $course_name,
             'Course-schedule' => $course_schedule,
             'Course-howToConduct' => $course_howToConduct,
         ];
         Mail::to($learner->email)->send(new demo($details));

        $enroll = new EnrolledLearners();
        $enroll->course_id = request('course_id');
        $enroll->learner_id = $learner_id;
        $enroll->tutor_id = $tutor;
        $enroll->save();

         $toApprove = DB::table('enrollment_invitations')
                     ->join('learners', 'enrollment_invitations.learner_id', '=', 'learners.id')
                     ->join('courses', 'enrollment_invitations.course_id', '=', 'courses.id')
                     ->select('learners.*', 'courses.name', 'courses.schedule', 'courses.howToConduct')
                     ->where('enrollment_invitations.tutor_id',$tutor)
                     ->where('enrollment_invitations.learner_id',$learner_id)
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
             'title' => 'Course Enrollment Request',
             'body' => 'Your request course enrollment for this course has been Rejected',
             'Course-Name' => $course_name,
             'Course-schedule' => $course_schedule,
             'Course-howToConduct' => $course_howToConduct,
         ];
         Mail::to($learner->email)->send(new demo($details));


         $toReject = DB::table('enrollment_invitations')
                     ->join('learners', 'enrollment_invitations.learner_id', '=', 'learners.id')
                     ->join('courses', 'enrollment_invitations.course_id', '=', 'courses.id')
                     ->select('learners.*', 'courses.name', 'courses.schedule', 'courses.howToConduct')
                     ->where('enrollment_invitations.tutor_id',$tutor)
                     ->where('enrollment_invitations.learner_id',$learner_id)
                     ->where('courses.name',$course_name)
                     ->where('courses.schedule',$course_schedule)
                     ->where('courses.howToConduct',$course_howToConduct);

         $toReject->delete();

         return redirect()->back()->with('fail' , 'Request Rejected');
      }
}
