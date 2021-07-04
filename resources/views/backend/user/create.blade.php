@extends('backend.layouts.master')

  @section('title', 'create user')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Create User</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
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
                <h2 class="mb-0">Create User</h2>
              </div>
            </div>
          </div>

        <form action="{{route('user.store')}}" method="post">@csrf
          <div class="card-body">

            <div class="form-group">
              <label class="control-label">Choose Class</label>
              <div class="controls">
                <select name="classroom" class="form-control">
                  @foreach(App\Models\Classroom::all() as $classroom)
                  <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                  @endforeach
                </select>
              </div>
                @error('classroom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

          <div class="form-group">
            <label class="control-label">Full Name</label>
            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror text-default" placeholder="name" value="{{old('question')}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Email</label>
            <input type="text" name="email" class="form-control @error('email')is-invalid @enderror text-default" placeholder="email" value="{{old('email')}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Password</label>
            <input type="text" name="password" class="form-control @error('password')is-invalid @enderror text-default" placeholder="password" value="{{old('password')}}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">School</label>
            <input type="text" name="school" class="form-control @error('school')is-invalid @enderror text-default" placeholder="school" value="{{old('school')}}">
            @error('school')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Phone</label>
            <input type="number" name="phone" class="form-control @error('phone')is-invalid @enderror text-default" placeholder="phone number" value="{{old('phone')}}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>


          <div class="controls">
            <button type="submit" name="button" class="btn btn-success">Create User</button>
          </div>

        </div>
        </form>
      </div>
    </div>

@endsection
