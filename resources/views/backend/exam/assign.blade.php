@extends('backend.layouts.master')

  @section('title', 'assign quiz')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Assign Quiz</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('view.exam')}}">List Assign</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Assign') }}</li>
              </ol>
            </nav>
          </div>
        </div>
        @if(Session::has('message'))
          <div class="alert alert-success">
            {{Session::get('message')}}
          </div>
        @endif
    </div>
  </div>
</div>
      <div class="container-fluid mt--5">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Assign Quiz</h2>
              </div>
            </div>
          </div>

        <form action="{{route('exam.assign')}}" method="post" enctype="multipart/form-data">@csrf
          <div class="card-body">

            <div class="form-group">
              <label class="control-label">Choose Quiz</label>
              <div class="controls">
                <select name="quiz_id" class="form-control">
                  @foreach(App\Models\Quiz::all() as $quiz)
                  <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                  @endforeach
                </select>
              </div>
                @error('quiz')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="control-label">Choose Class</label>
              <div class="controls">
                <select name="classroom_id" class="form-control">
                  @foreach(App\Models\Classroom::all() as $class)
                  <option value="{{$class->id}}">{{$class->name}}</option>
                  @endforeach
                </select>
              </div>
                @error('class_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



          <div class="controls">
            <button type="submit" name="button" class="btn btn-success">Submit</button>
          </div>

        </div>
        </form>
      </div>
    </div>

@endsection
