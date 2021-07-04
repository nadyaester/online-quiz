@extends('backend.layouts.master')

  @section('title', 'create quiz')

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
                <li class="breadcrumb-item active" aria-current="page">{{ __('Quiz') }}</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6">

              <!-- Card body -->
              <a href="{{route('quiz.create')}}">
                <button class="btn btn-icon btn-success" type="button">
                	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Create Quiz</span>
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
            <h3 class="mb-0">All Quiz</h3>
          </div>
        </div>
      </div>
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Subject</th>
          <th scope="col">Time</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @if(count($quizzes)>0)
          @foreach($quizzes as $key=>$quiz)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$quiz->name}}</td>
            <td>{{$quiz->subject}}</td>
            <td>{{$quiz->minutes}}</td>
            <td>
              <a href="{{route('quiz.question', [$quiz->id])}}">
                <button class="btn btn-secondary btn-sm">View Question</button>
              </a>
            </td>
            <td>
              <a href="{{route('quiz.edit', [$quiz->id])}}">
                <button class="btn btn-primary btn-sm">Edit</button>
              </a>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$quiz->id}}">Delete</button>
            </form>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{$quiz->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form action="{{route('quiz.destroy',[$quiz->id])}}" method="post">@csrf
                  {{method_field('DELETE')}}
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Quiz</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure want to delete the quiz?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
          </td>

        </tr>
        @endforeach

        @else
        <td>No quiz to display</td>
        @endif

      </tbody>
    </table>
    <div class="container">
          {{$quizzes->links('backend.layouts.pagination')}}
  </div>
  </div>
</div>
</div>


@endsection
