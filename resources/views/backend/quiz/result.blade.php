@extends('backend.layouts.master')

@section('title', 'quiz result')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Quiz Result</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{('/')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Quiz</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="container-fluid mt--6">
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">All Quiz Result</h3>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>

                        <th scope="col">Name</th>
                        <th scope="col">Total Question</th>
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Wrong Answer</th>
                        <th scope="col">Grade</th>

                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quiz as $q)
                    <tr>

                        <td>{{$results}}</td>
                        <td>{{$totalQuestions}}</td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection