@extends('layouts.app')

@section('head')

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb_bg.jpg')}}');">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">About us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
    </div>
</div>
@endsection

@section('script')
@endsection
