@extends('layouts.app')

@section('head')
<style>
    .text-ambulance {
        color: #fc3604;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/ambulance.png')}}');background-repeat: no-repeat;
    background-size: cover;">
    <div class=" container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Driver Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('ambulance.index')}}">Ambulance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$ambulance->driver_name}}</li>
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
                        class="h5">{{$ambulance->driver_name}}</span></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('image/ambulance/ambulence.jpg')}}" class="card-img-top"
                                alt="{{$ambulance->driver_name}}">
                        </div>
                        <div class="col-md-8">
                            <p class="card-text p-3" style="font-size: large!important">
                                <i class="fas fa-user text-ambulance mr-2"></i> {{$ambulance->driver_name}}<br>
                                <i class="fa fa-phone text-primary"></i> {{$ambulance->contact}} <br>
                                <i class="fa fa-map-marker text-danger"></i> {{$ambulance->address}} <br>
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
