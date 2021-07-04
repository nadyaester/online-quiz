@extends('layouts.master')
@section('content')
<div id="app">
  <quiz-component :times="{{$quiz->minutes}}" :quizId="{{$quiz->id}}" :quiz-questions="{{$quizQuestions}}" :has-quiz-played="{{$authUserHasPlayedQuiz}}">


  </quiz-component>
</div>


@endsection