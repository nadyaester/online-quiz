<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Classroom;
use App\Models\User;
use DB;

class ExamController extends Controller
{
  public function create()
  {
    return view('backend.exam.assign');
  }

  public function assignExam(Request $request)
  {
    $quiz = (new Quiz)->assignExam($request->all());
    return redirect()->back()->with('message', 'Quiz assigned to class successfully');
  }

  public function classExam(Request $request)
  {
    $quizzes = Quiz::get();
    $classroom = Classroom::first();
    return view('backend.exam.index', compact('quizzes', 'classroom'));
  }

  public function removeExam(Request $request)
  {
    $classId = $request->get('classroom_id');
    $quizzId = $request->get('quiz_id');

    $quiz = Quiz::find($quizzId)->first();
    $result = Result::where('quiz_id', $quizzId)->where('classroom_id', $classId)->exists();

    if ($result) {
      return redirect()->back()->with('message', 'This quiz is played by user so it can not be removed');
    } else {
      $quiz->classrooms()->detach($classId);
      return redirect()->back()->with('message', 'This quiz now not assigned to that class');
    }
  }

  public function QuizQuestions(Request $request, $quizId)
  {
    $authUser = auth()->user()->id;
    $userClass = auth()->user()->classroom_id;

    //check if user has been assigned
    $classId = DB::table('quiz_class')->where('classroom_id', $userClass)->pluck('quiz_id')->toArray();
    if (!in_array($quizId, $classId)) {
      return redirect()->to('/home')->with('error', 'You are not assigned this quiz');
    }

    $quiz = Quiz::find($quizId);
    $time = Quiz::where('id', $quizId)->value('minutes');
    $quizQuestions = Question::where('quiz_id', $quizId)->with('answers')->get();
    $authUserHasPlayedQuiz = Result::where(['user_id' => $authUser, 'quiz_id' => $quizId])->get();

    //has user played particular quiz
    $wasCompleted = Result::where('user_id', $authUser)->whereIn('quiz_id', (new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
    if (in_array($quizId, $wasCompleted)) {
      return redirect()->to('/home')->with('error', 'You already participated in this quiz');
    }

    return view('quiz', compact('quiz', 'time', 'quizQuestions', 'authUserHasPlayedQuiz'));
  }

  public function postQuiz(Request $request)
  {
    $questionId = $request['questionId'];
    $answerId = $request['answerId'];
    $quizId = $request['quizId'];

    $authUser = auth()->user();

    return $userQuestionAnswer = Result::updateOrCreate(
      [
        'user_id' => $authUser->id,
        'quiz_id' => $quizId,
        'question_id' => $questionId,
        'classroom_id' => $authUser->classroom_id
      ],
      ['answer_id' => $answerId]
    );
  }

  public function userResult($userId, $quizId)
  {
    $results = Result::where('user_id', $userId)->where('quiz_id', $quizId)->get();
    $totalQuestions = Question::where('quiz_id', $quizId)->count();
    $attemptQuestion = Result::where('quiz_id', $quizId)->where('user_id', $userId)->count();
    $quiz = Quiz::where('id', $quizId)->get();

    $ans = [];
    foreach ($results as $answer) {
      array_push($ans, $answer->answer_id);
    }
    $userCorrectedAnswer = Answer::whereIn('id', $ans)->where('is_correct', 1)->count();
    $userWrongAnswer = $totalQuestions - $userCorrectedAnswer;
    if ($attemptQuestion) {
      $percentage = ($userCorrectedAnswer / $totalQuestions) * 100;
    } else {
      $percentage = 0;
      $userWrongAnswer = 0;
    }

    return view('backend.user.result', compact('results', 'totalQuestions', 'attemptQuestion', 'userCorrectedAnswer', 'userWrongAnswer', 'percentage', 'quiz'));
  }

  public function classResult($quizId, $classroomId)
  {

    $results = Result::where('classroom_id', $classroomId)->where('quiz_id', $quizId)->get();
    $userId = Result::where('classroom_id', $classroomId)->where('quiz_id', $quizId)->get('user_id');


    $totalQuestions = Question::where('quiz_id', $quizId)->count();
    $quiz = Quiz::where('id', $quizId)->get();
    $user = User::where('classroom_id', $classroomId)->get();


    $attemptQuestion = DB::table('results')->where('quiz_id', $quizId)->where('user_id',)->count();

    $ans = [];
    foreach ($results as $answer) {
      array_push($ans, $answer->answer_id);
    }
    $userCorrectedAnswer = Answer::whereIn('id', $ans)->where('is_correct', 1)->count();
    $userWrongAnswer = $totalQuestions - $userCorrectedAnswer;

    $percentage = ($userCorrectedAnswer / $totalQuestions) * 100;


    return view('backend.exam.result', compact('results', 'attemptQuestion', 'totalQuestions', 'userCorrectedAnswer', 'userWrongAnswer', 'quiz', 'user', 'userId', 'percentage'));
  }
}
