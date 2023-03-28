@extends('layouts.app')

@section('head')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,500&display=swap');
    /* === BASE HEADING === */

    .title h1 {
        position: relative;
        padding: 0;
        margin: 0;
        font-family: 'Righteous', cursive;
        font-weight: 300;
        font-size: 40px;
        color: #080808;
        -webkit-transition: all 0.4s ease 0s;
        -o-transition: all 0.4s ease 0s;
        transition: all 0.4s ease 0s;
    }

    .title h1 {
        text-align: center;
        text-transform: uppercase;
        padding-bottom: 5px;
    }

    .title h1:before {
        width: 28px;
        height: 5px;
        display: block;
        content: "";
        position: absolute;
        bottom: 3px;
        left: 50%;
        margin-left: -14px;
        background-color: #b80000;
    }

    .title h1:after {
        width: 100px;
        height: 1px;
        display: block;
        content: "";
        position: relative;
        margin-top: 25px;
        left: 50%;
        margin-left: -50px;
        background-color: #b80000;
    }


    #howItWorks h1 {
        position: relative;
        padding: 0;
        margin: 0;
        font-family: "Raleway", sans-serif;
        font-weight: 300;
        font-size: 40px;
        color: #080808;
        -webkit-transition: all 0.4s ease 0s;
        -o-transition: all 0.4s ease 0s;
        transition: all 0.4s ease 0s;
    }

    #howItWorks h1 span {
        display: block;
        font-size: 0.5em;
        line-height: 1.3;
    }

    #howItWorks h1 em {
        font-style: normal;
        font-weight: 600;
    }


    #howItWorks h1 {
        text-align: center;
        font-size: 50px;
        text-transform: uppercase;
        color: #222;
        letter-spacing: 1px;
        font-family: "Playfair Display", serif;
        font-weight: 400;
    }

    #howItWorks h1 span {
        margin-top: 5px;
        font-size: 15px;
        color: #444;
        word-spacing: 1px;
        font-weight: normal;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-family: "Raleway", sans-serif;
        font-weight: 500;

        display: grid;
        grid-template-columns: 1fr max-content 1fr;
        grid-template-rows: 27px 0;
        grid-gap: 20px;
        align-items: center;
    }

    #howItWorks h1 span:after,
    #howItWorks h1 span:before {
        content: " ";
        display: block;
        border-bottom: 1px solid #ccc;
        border-top: 1px solid #ccc;
        height: 5px;
        background-color: #f8f8f8;
    }

    .heading {
        font-size: 28px;
    }

    .subheading {
        font-size: 10px;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: .2rem;
    }

    .paragraph {
        argin-top: 0;
        margin-bottom: 1rem;
        color: #808080;
        font-size: 16px
    }

    .btn {
        font-size: 12px;
        text-transform: uppercase;
        border-radius: 30px;
        padding: 10px 30px;
    }

    .paragraph {
        font-size: 16px !important;
    }
</style>

<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }


    .contactus {
        background: url('image/breadcrumb/about-us.jpg');
        background-size: cover;
    }

    .btn-outline-food {
        color: #ac043c;
        border-color: #ac043c;
    }

    .btn-outline-food:hover {
        color: #fff;
        background-color: #ac043c;
        border-color: #ac043c;
    }

    .bg-food {
        background-color: #ac043c;
        color: #fff;
    }

    .text-food {
        color: #ac043c;
    }

    th {
        text-align: center;
        background-color: #ac043c;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700; color:rgb(5, 5, 5)">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;color:#fff!important;">
                    <li class="breadcrumb-item"><a href="/" class="">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="title">
            <h1>About Our Services</h1>
        </div>
        <div class="row" id="aboutUs">
            <div class="col-md-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('image/about.png') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="carousel-item">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="card" style="">
                                        <img src="{{ asset('image/ai1s.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Emergency situation?</h5>
                                            <p class="card-text paragraph">We'll provide all kind of help</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card" style="">
                                        <img src="{{ asset('image/da1.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Need A Doctor?</h5>
                                            <p class="card-text paragraph">You can contact our doctors any time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-5 ml-auto" style="text-align:justify">
                <span class="subheading">About Us</span>
                <h2 class="heading"><strong class="text-primary">We wanted to be your trusted and nearest
                        neighbor in your emergency situation</strong></h2>
                <p class="paragraph">
                    Our shelters come in a variety of standard configurations but custom solutions are viable.
                    You can deploy a safe, fully
                    functional helping facility in a matter of hours. Extraordinary Mobility. Flexible.
                    Extraordinary Durability. Fast.
                    Extraordinary Savings.

                    Be confident in a crisis, with a temporary shelter built to stand up to extreme environments
                    and catastrophic events.
                </p>
                <p>
                    <a href="#contactUs" class="btn btn-primary">Contact Us</a>
                </p>
            </div>
        </div>

        <div class="title mt-5" id="contactUs">
            <h1>Contact Us</h1>
        </div>
        <div class="row mt-3">
            <div class=col-md-2></div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('image/about/TasnimAzad.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tasnim Azad</h5>
                        <p class="paragraph"><i class="fas fa-envelope"></i> tasnim15-11800@diu.edu.bd</p>
                        <p class="paragraph"><i class="fas fa-phone"></i> +8801723-874242</p>
                        <p class="paragraph"><i class="fas fa-map-marker-alt"></i> Noagaon,Bangladesh</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('image/about/MahinAfrin.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mahin Afrin</h5>
                        <p class="paragraph"><i class="fas fa-envelope"></i> mahin15-11947@diu.edu.bd
                        </p>
                        <p class="paragraph"><i class="fas fa-phone"></i> +8801760269647</p>
                        <p class="paragraph"><i class="fas fa-map-marker-alt"></i> Mymensingh, Bangladesh</p>
                    </div>
                </div>
            </div>
            <div class=col-md-2></div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>

    </script>
    @endsection
