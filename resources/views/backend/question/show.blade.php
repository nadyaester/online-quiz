@extends('backend.layouts.master')

  @section('title', 'view question')

  @section('content')

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">View Question</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('question.index')}}">Question</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('View') }}</li>
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
          <h2 class="mb-0">{{$question->question}}</h2>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        @if($question->image)
        <tr>
          <td>
          <img src="{{asset('images')}}/{{$question->image}}" width="250" height="250">
        </td>
        </tr>
        @endif
        <tbody>
          @foreach($question->answers as $key=>$answer)
          <tr>
            <td>{{$key+1}}.  {{$answer->answer}}
              @if($answer->is_correct)
              <span class="badge badge-pill badge-success float-right">correct</span>
              @endif
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
