@extends('backend.layouts.master')

  @section('title', 'update question')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Edit Question</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Question</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('edit') }}</li>
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
                <h2 class="mb-0">Question</h2>
              </div>
            </div>
          </div>

        <form action="{{route('question.update',['$question->id'])}}" method="post" enctype="multipart/form-data">@csrf
          {{method_field('PUT')}}

          <div class="card-body">

            <div class="form-group">
              <label class="control-label">Choose Quiz</label>
              <div class="controls">
                <select name="quiz" class="form-control">
                  @foreach(App\Models\Quiz::all() as $quiz)
                  <option value="{{$quiz->id}}" @if($quiz->id==$question->quiz_id) selected
                    @endif> {{$quiz->name}} </option>
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
            <label class="control-label">Question</label>
            <textarea type="text" name="question" class="form-control @error('question')is-invalid @enderror text-default">{{$question->question}}</textarea>
            @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
              <label class="control-label" for="image">Image (Optional)</label>
              <input type="file" name="image" class="form-control @error('images') is-invalid @enderror">
               @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="control-group">
            <label class="control-label" for="options">Options</label>
            <div class="row">
              @foreach($question->answers as $key=>$answer)
              <div class="col-lg-8">
              <input type="text" name="options[]" class="form-control @error('name') border-red @enderror text-default" value="{{$answer->answer}}" required="" >
              </div>
              <div class="mb-3">
              <input type="radio" name="correct_answer" value="{{$key}}" @if($answer->is_correct){{'checked'}}@endif>
              <label class="control-label">is correct answer</label>
              </div>
              @endforeach

              @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>

          <div class="controls">
            <button type="submit" name="button" class="btn btn-success">Submit</button>
          </div>

        </div>
        </form>
      </div>
    </div>

@endsection
