@extends('layouts.app')

@section('head')
<style>
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

    .mt-5 {
        margin-top: 12rem !important;
    }
</style>

@endsection

@section('content')
<div>
    <header class="overlay">
        @include('layouts._partials.slider')
        {{-- @include('layouts._partials.newSlider') --}}
    </header>
    <main>
        <section>
            <div class="container mt-5">
                <div class="title">
                    <h1>Emergency Help</h1>
                </div>
                <div id="howItWorks" style="margin-top:30px">
                    <h1>How It Works?<span>You Can Watch Our Video</span></h1>
                </div>
                 <center>
                 <video controls>
                  <source src="{{asset('our_video.mkv')}}" type="video/mp4">
                 </video>
                </center>
            </div>
        </section>
    </main>
</div>
@endsection

@section('script')
<script>
    function adjustNav() {
        var winWidth = $(window).width(),
        dropdown = $('.dropdown'),
        dropdownMenu = $('.dropdown-menu');

        if (winWidth >= 768) {
        dropdown.on('mouseenter', function() {
        $(this).addClass('show')
        .children(dropdownMenu).addClass('show');
        });

        dropdown.on('mouseleave', function() {
        $(this).removeClass('show')
        .children(dropdownMenu).removeClass('show');
        });
        } else {
        dropdown.off('mouseenter mouseleave');
        }
        }

        $(window).on('resize', adjustNav);

        adjustNav();
</script>
@endsection