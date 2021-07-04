@extends('backend.layouts.master')

  @section('title', 'create quiz')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Create Quiz</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Quiz</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create Quiz') }}</li>
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
                <h2 class="mb-0">All Quiz</h2>
              </div>
            </div>
          </div>

        <form action="{{route('quiz.store')}}" method="post">@csrf
          <div class="card-body">
          <div class="form-group">
            <label class="control-label">Quiz Name</label>
            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror text-default" placeholder="name of the quiz" value="{{old('name')}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Subject</label>
            <input name="subject" class="form-control @error('subject')is-invalid @enderror text-default" placeholder="subject of the quiz" value="{{old('description')}}">
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Time (in minutes)</label>
            <input name="minutes" class="form-control @error('minutes')is-invalid @enderror text-default" value="{{old('minutes')}}">
            @error('minutes')
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

  <!-- <div class="span9">
    <div class="content">

      @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>

      @endif


      <form action="{{route('quiz.store')}}" method="post">@csrf


      <div class="module">

        <div class="module-head">
          <h3>Create Quiz</h3>
        </div>
        <div class="module-body">

          <div class="control-group">
            <label class="control-label">Quiz name</label>
            <div class="controls">
              <input type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="name of a quiz" value="{{old('name')}}">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <label class="control-label">Quiz Description</label>
            <div class="controls">
              <textarea name="description" class="span8 @error('name') border-red @enderror">{{old('description')}}</textarea>
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <label class="control-label">Time (in minutes)</label>
            <div class="controls">
              <textarea name="minutes" class="span8 @error('name') border-red @enderror">{{old('minutes')}}</textarea>
              @error('minutes')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="controls">
              <button type="submit" name="button" class="btn btn-success">Submit</button>
            </div>

          </div>
        </div>

      </div>
    </form>
    </div>
  </div> -->

@endsection
