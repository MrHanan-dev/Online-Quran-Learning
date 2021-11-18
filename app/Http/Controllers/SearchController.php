<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Course;
use App\Models\Learner;

class SearchController extends Controller
{
  public function Hifz()
  {
    $tutor = Course::where('name', 'Hifz')->get();

    return view('tutor.searchTutor', ['tutor' => $tutor]);
  }

  public function Tajweed()
  {
    //$course = Course::where('name', 'Tajweed')->get();
    $course = DB::table('courses')
      ->join('tutors', 'courses.tutor_id', '=', 'tutors.id')
      ->select('tutors.*', 'courses.id as courseID', 'courses.name as courseName')
      ->where('courses.name', 'Tajweed')
      ->get();
    return view('tutor.searchTutor', ['tutor' => $course]);
  }

  public function Recitation()
  {
    $tutor = Course::where('name', 'Recitation')->get();

    return view('tutor.searchTutor', ['tutor' => $tutor]);
  }

  public function Translation()
  {
    $tutor = Course::where('name', 'Translation')->get();

    return view('tutor.searchTutor', ['tutor' => $tutor]);
  }


  public function showTutor($id)
  {
    $tutor = Tutor::find($id);
    $courses = Course::where('tutor_id', $id)->get();
    return view('tutor.searchResultTutor')->with(compact('tutor'))->with(compact('courses'));
  }

  public function findTutor()
  {

    $tutor = Tutor::all();

    return view('tutor.searchTutor')->with('tutor', $tutor);
  }

  public function findLearner()
  {

    $learner = Learner::all();

    return view('learner.searchLearner')->with('learner', $learner);
  }

  public function showLearner($id)
  {
    $learner = Learner::find($id);
    return view('learner.searchResultLearner')->with('learner', $learner);
  }
}
