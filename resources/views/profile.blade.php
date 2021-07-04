@extends('layouts.master')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Profile</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header border-0">
                    <h2>{{auth()->user()->name}}</h2>
                </div>

                <div class="card-body">
                    <h4>Email : {{auth()->user()->email}}</h4>
                    <h4>Class : {{auth()->user()->classroom['name']}}</h4>
                    <h4>School : {{auth()->user()->school}}</h4>
                    <h4>Phone : {{auth()->user()->phone}}</h4>

                </div>

                <p> </p>
            </div>
        </div>
    </div>
</div>

@endsection