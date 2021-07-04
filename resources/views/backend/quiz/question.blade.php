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
                <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Quiz</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('View') }}</li>
              </ol>
            </nav>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--5">
	@foreach($quizzes as $quiz)
  <div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="mb-0">{{$quiz->name}}</h2>
        </div>
      </div>
    </div>

		<div class="table-responsive">
			@foreach($quiz->questions as $ques)
      <table class="table align-items-center table-flush">
				<tr> <td><p><h4>{{$ques->question}}</h4></td>

        <tbody>
					@if($ques->image)
					<td><img src="{{asset('images')}}/{{$ques->image}}" width="250" height="250"></td>
	        @endif
            <td>
							@foreach($ques->answers as $key=>$answer)
							<p>
							{{$key+1}}.  {{$answer->answer}}
              @if($answer->is_correct)
              <span class="badge badge-pill badge-success">correct</span>
              @endif
							</p>
							@endforeach
            </td>
					</tr>
        </tbody>
      </table>
			@endforeach
    </div>
		@endforeach
  </div>
</div>



@endsection
