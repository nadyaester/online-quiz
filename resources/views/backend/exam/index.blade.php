@extends('backend.layouts.master')

  @section('title', 'quiz assigned class')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Quiz Assigned</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6">

              <!-- Card body -->
              <a href="{{route('exam.assign')}}">
                <button class="btn btn-icon btn-success" type="button">
                	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Assign Quiz</span>
                </button>
              </a>
          </div>
        </div>

      </div>
      <div class="content">
      <div class="align-items-center py-4">
      @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
      @endif
    </div>
  </div>

  </div>
</div>

  <div class="container-fluid mt--6">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">All Assigned Quiz</h3>
          </div>
        </div>
      </div>
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>

          <th scope="col">Quiz</th>
          <th scope="col">Class</th>

          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @if(count($quizzes)>0)
          @foreach($quizzes as $key=>$quiz)
          @foreach($quiz->classrooms as $key=>$class)
          <tr>

            <td>{{$quiz->name}}</td>
            <td>{{$class->name}}</td>

            <td>
              <a href="{{route('quiz.question', [$quiz->id])}}">
                <button class="btn btn-secondary btn-sm">View Question</button>
              </a>
            </td>

            <td>
              <form class="" action="{{route('exam.remove')}}" method="POST">@csrf

                <input type="hidden" name="classroom_id" value="{{$class->id}}">
                <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
              </form>
            </td>


        </tr>
        @endforeach
        @endforeach

        @else
        <td>No Class to display</td>
        @endif

      </tbody>
    </table>
  </div>
</div>
</div>


@endsection
