@extends('layouts.app')

@section('head')

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/doctor.jpg')}}');background-repeat: no-repeat;
    background-size: cover;">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Doctor List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Doctors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$doctor->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header"><span class="h4" style="font-family: sans-serif;">Name: </span><span
                        class="h5">{{$doctor->name}}</span></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('storage/Doctor_Image/'. $doctor->image)}}" height="170px"
                                class="card-img-top" alt="{{$doctor->name}}">
                        </div>
                        <div class="col-md-8">
                            <p class="card-text p-3" style="font-size: large!important">
                                <i class="fa fa-phone"></i> {{$doctor->phone}} <br>
                                <i class="fa fa-envelope"></i> {{$doctor->email}} <br>
                                <i class="fa fa-map-marker"></i> {{$doctor->address}}
                                <br>
                                <i class="fa fa-user-md"></i> {{$doctor->specialist}} <br>
                                <i class="fa fa-info-circle"></i> {{$doctor->details}} <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
