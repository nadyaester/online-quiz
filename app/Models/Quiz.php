<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Classroom;
use App\Models\Result;

class Quiz extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'subject', 'minutes'];
  private $limit = 15;
  private $order = 'ASC';

  public function questions()
  {
    return $this->hasMany(Question::class);
  }

  public function classrooms()
  {
    return $this->belongsTomany(Classroom::class, 'quiz_class');
  }

  public function storeQuiz($data)
  {
    return Quiz::create($data);
  }

  public function allQuiz()
  {
    return Quiz::orderBy('created_at', $this->order)->paginate($this->limit);
  }

  public function getQuizById($id)
  {
    return Quiz::find($id);
  }

  public function updateQuiz($data, $id)
  {
    return Quiz::find($id)->update($data);
  }

  public function deleteQuiz($id)
  {
    return Quiz::find($id)->delete();
  }

  public function assignExam($data)
  {
    $quizId = $data['quiz_id'];
    $quiz = Quiz::find($quizId);
    $classId = $data['classroom_id'];
    return $quiz->classrooms()->syncWithoutDetaching($classId);
  }

  public function hasQuizAttempted()
  {
    $attemptQuiz = [];
    $authUser = auth()->user()->id;
    $user = Result::where('user_id', $authUser)->get();
    foreach ($user as $u) {
      array_push($attemptQuiz, $u->quiz_id);
    }
    return $attemptQuiz;
  }
}
