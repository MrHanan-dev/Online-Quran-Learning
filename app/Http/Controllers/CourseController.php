<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Course;
use App\Models\LearningMaterial;

class CourseController extends Controller
{
      public function addCourse()
      {
          $course = new Course();
          $course->name=request('name');
          $course->fees=request('fees');
          $course->tutor_id=request('tutor_id');
          $course->duration=request('duration');
          $course->schedule=request('schedule');
          $course->prerequisite=request('prerequisite');
          $course->description=request('description');
          $course->howToConduct=request('howToConduct');
          $course->save();
          return redirect('/tutor/showCourses');
      }

      public function showCourses()
      {
        $course= Course::where('tutor_id' , Auth::guard('tutor')->user()->id)->get();


        return view('tutor.dashboard.showCourses')->with('course',$course);
      }

    public function viewCourse($id)
    {
        $course= Course::find($id);
        $material = LearningMaterial::where('course_id' , $id)->get();

      //  return view('tutor.dashboard.viewCourse')->compact($course , );

        return view('tutor.dashboard.viewCourse')

        ->with(compact('course'))

        ->with(compact('material'));

    }





    public function edit($id)
    {
        $course = Course::find($id);
        return view('tutor.dashboard.editCourse')->with('course',$course);
    }
    public function update(Request $request,$id)
    {
        $course = Course::find($id);
        $course->name=request('name');
        $course->fees=request('fees');
        $course->duration=request('duration');
        $course->schedule=request('schedule');
        $course->prerequisite=request('prerequisite');
        $course->description=request('description');
        $course->howToConduct=request('howToConduct');
        $course->save();
        return redirect()->back()->with('msg , Record Updated successfully');
    }
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/tutor/showCourses');
    }
}
