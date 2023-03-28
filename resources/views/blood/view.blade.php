@extends('layouts.app')

@section('head')


@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/blood.png')}}');background-repeat: no-repeat;
    background-size: cover;">
    <div class=" container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Donner Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('blood.index')}}">Bloods</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$blood->donner_name}}</li>
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
                        class="h5">{{$blood->donner_name}}</span></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('image/blood/donation-blood.png')}}" class="card-img-top"
                                alt="{{$blood->donner_name}}">
                        </div>
                        <div class="col-md-8">
                            <p class="card-text p-3" style="font-size: large!important">
                                <i class="fas fa-medkit text-info mr-2"></i> {{$blood->group_name}}<br>
                                <i class="fa fa-phone text-primary"></i> {{$blood->phone}} <br>
                                <i class="fa fa-map-marker text-danger"></i> {{$blood->address}} <br>
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
