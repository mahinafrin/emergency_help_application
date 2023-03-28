<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- icon --}}
    <link rel="icon" href="{{asset('image/emergency_help.ico')}}">
    <title>Emergency Help</title>
    <!-- Scripts -->
    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"
        integrity="sha512-Rd5Gf5A6chsunOJte+gKWyECMqkG8MgBYD1u80LOOJBfl6ka9CtatRrD4P0P5Q5V/z/ecvOCSYC8tLoWNrCpPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Styles -->
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/addButton.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/messanger.css')}}">
    @yield('head')
    <!-- Styles -->
</head>

<body>
    <div id="app">
        @include('layouts._partials.minNavBar')
        @include('layouts._partials.navbar')
        <div class="headTop"></div>
        @yield('breadcrumbs')
        <main class="">
            @if (Session::has('message'))
            <div class="text-center alert alert-{{ Session::get('class') }}">
                {{ Session::get('message')}}
            </div>
            @endif
            @yield('content')
        </main>
         <footer class="py-3 bg-dark text-white">
           <center><i>Copyright &copy; 2022 | All rights reserved</i></center>
          </footer>
        @guest
        @include('guest.messenger')
        @endguest
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
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
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>