<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Quiz;
use App\Models\Result;

class ExamController extends Controller
{
    public function create(){
      return view('backend.exam.assign');
    }

    public function assignExam(Request $request){
      $quiz = (new Quiz)->assignExam($request->all());
      return redirect()->back()->with('message', 'Quiz assigned to class successfully');
    }

    public function classExam(Request $request){
      $quizzes = Quiz::get();
      return view('backend.exam.index', compact('quizzes'));
    }

    public function removeExam(Request $request){
      $classId = $request->get('classroom_id');
      $quizzId = $request->get('quiz_id');

      $quiz = Quiz::find($quizzId)->first();
      $result = Result::where('quiz_id', $quizzId)->where('classroom_id', $classId)->exists();

      if($result){
        return redirect()->back()->with('message', 'This quiz is played by user so it can not be removed');
      }else{
        $quiz->classrooms()->detach($classId);
        return redirect()->back()->with('message', 'This quiz now not assigned to that class');
      }
    }
}
