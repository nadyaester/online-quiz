@extends('backend.layouts.master')

  @section('title', 'create class')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Create Class</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('classroom.index')}}">Classroom</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create Class') }}</li>
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
                <h2 class="mb-0">Class Data</h2>
              </div>
            </div>
          </div>

        <form action="{{route('classroom.store')}}" method="post">@csrf
          <div class="card-body">
          <div class="form-group">
            <label class="control-label">Class Name</label>
            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror text-default" placeholder="name of the class" value="{{old('name')}}">
            @error('name')
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
