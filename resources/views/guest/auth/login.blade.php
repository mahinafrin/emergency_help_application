@extends('layouts.app')

@section('head')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<!--Stylesheet-->
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }



    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    @media only screen and (max-width: 768px) {

        [class*="col-"] {
            width: 100%;
        }
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb_bg.jpg')}}');">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Login Now</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login Now</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="col-4 m-auto py-5">
    <form action="{{route('user.login')}}" method="post">
        @csrf
        <div class="imgcontainer">
            {{-- cursel --}}
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('image/profile_icon/male.jpg')}}" class="col-3" alt="Avatar" class="avatar">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('image/profile_icon/female.jpg')}}" class="col-3" alt="Avatar" class="avatar">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            {{-- male female input checked btn--}}
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        adminRoleValidation();
    });
    function adminRoleValidation() {

    }

</script>
@endsection
