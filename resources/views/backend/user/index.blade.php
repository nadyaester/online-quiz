@extends('backend.layouts.master')

@section('title', 'users')

@section('content')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-3 col-md-6">

          <!-- Card body -->
          <a href="{{route('user.create')}}">
            <button class="btn btn-icon btn-success" type="button">
              <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
              <span class="btn-inner--text">Add Users</span>
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
          <h2 class="mb-0">All User</h2>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">School</th>
            <th scope="col">Phone</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if(count($users)>0)
          @foreach($users as $key=>$user)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->classroom['name']}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->visible_password}}</td>
            <td>{{$user->school}}</td>
            <td>{{$user->phone}}</td>

            <td>
              <a href="user/result/{{$user->id}}/{{$quizzes->id}}">
                <button class="btn btn-info btn-sm">View Grade</button>
              </a>
            </td>

            <td>
              <a href="{{route('user.edit', [$user->id])}}">
                <button class="btn btn-primary btn-sm">Edit</button>
              </a>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$user->id}}">Delete</button>
              </form>

              <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form action="{{route('user.destroy',[$user->id])}}" method="post">@csrf
                    {{method_field('DELETE')}}
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure want to delete the question?
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
          <td>No user to display</td>
          @endif
        </tbody>
      </table>

      <div class="container">
        {{$users->links('backend.layouts.pagination')}}
      </div>

    </div>
  </div>
</div>

@endsection