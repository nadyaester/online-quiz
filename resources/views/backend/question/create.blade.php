@extends('backend.layouts.master')

  @section('title', 'create question')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Create Question</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('question.index')}}">Question</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
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
                <h2 class="mb-0">Create Question</h2>
              </div>
            </div>
          </div>

        <form action="{{route('question.store')}}" method="post" enctype="multipart/form-data">@csrf
          <div class="card-body">

            <div class="form-group">
              <label class="control-label">Choose Quiz</label>
              <div class="controls">
                <select name="quiz" class="form-control">
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
            <label class="control-label">Question</label>
            <textarea type="text" name="question" class="form-control @error('question')is-invalid @enderror text-default" placeholder="type the question here">{{old('question')}}</textarea>
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
              @for($i=0;$i<5;$i++)
              <div class="col-lg-8">
              <input type="text" name="options[]" class="form-control @error('name') border-red @enderror text-default" placeholder="options {{$i+1}}" required="" >
              </div>
              <div class="mb-3">
              <input type="radio" name="correct_answer" value="{{$i}}">
              <label class="control-label">is correct answer</label>
              </div>
              @endfor

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
