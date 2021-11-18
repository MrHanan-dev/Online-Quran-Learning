<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\EnrolledLearners;
use App\Models\Learner;
use App\Models\enrollmentInvitations;

class EnrolledLearnersController extends Controller
{

    public function show()
    {
      $tutor_id = Auth::guard('tutor')->user()->id;

      $learner = DB::table('enrolled_learners')
               ->join('learners', 'enrolled_learners.learner_id', '=', 'learners.id')
               ->join('courses', 'enrolled_learners.course_id', '=', 'courses.id')
               ->select('learners.*', 'courses.id as courseID' ,'courses.name', 'courses.schedule', 'courses.howToConduct')
               ->where('enrolled_learners.tutor_id',$tutor_id)
               ->get();

      return view('tutor.dashboard.myStudents')->with(compact('learner'));
     }

     public function view($learner_id)
     {

       $learner = Learner::find($learner_id);

       return view('tutor.dashboard.viewMyStudent')->with('learner' , $learner);
      }

      public function destroy($id)
      {
        $learner = EnrolledLearners::where('learner_id',$id)->first();
        $learner->delete();
        return redirect()->back()->with('success','Learner removed Successfully');
      }

    

}
