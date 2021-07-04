@extends('layouts.master')

@section('content')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Quiz</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Quiz</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(Session::has('error'))
      <div class="alert alert-danger">
        {{Session::get('error')}}
      </div>
      @endif
      <div class="card">
        <div class="card-header border-0">{{ __('Quiz') }}</div>
        @if($isExamAssigned)
        @foreach($quizzes as $quiz)
        <div class="card-body">
          <p>
          <h3>{{$quiz->name}}</h3>
          </p>
          <p>{{$quiz->description}}</p>
          <p>Time allocated : {{$quiz->minutes}} minutes</p>
          <p>Number of questions : {{$quiz->questions->count()}}</p>
          <p>
            @if(!in_array($quiz->id, $wasQuizCompleted))
            <a href="/user/quiz/{{$quiz->id}}">
              <button class="btn btn-default">Start Quiz</button>
            </a>
            @else
            <span class="float-right">Completed</span>
            @endif
          </p>

        </div>
        @endforeach
        @else
        <p>You have not assigned any quiz</p>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection