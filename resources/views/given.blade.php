<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Emergency Help</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="menu-bar">
            <h1><i>Emergency Help</i></h1>
            <p style="
                  font-family: georgia, garamond, serif;
                  font-size: 16px;
                  font-style: italic;
                "></p>
            <ul>
                <div class="overlay"></div>
                <li class="active">
                    <a href="#"> Services</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="doctors.html">Doctor</a></li>

                            <li><a href="o2.html">Oxyzen</a></li>
                            <li><a href="#">Blood</a></li>
                            <li><a href="#">Police</a></li>
                            <li><a href="#">Fire Service</a></li>
                            <li><a href="#">Ambulance</a></li>
                            <li><a href="#">Hospital</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#home"> Home</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="#login">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#aboutus"> About Us</a></li>
                <li><a href="#howitworks"> How it works!</a></li>
            </ul>
        </div>
        <div class="back">
            <div class="mid">
                <h2><i>Need Urgent Help?</i></h2>
                <br />
                <p>
                    <i><i>We Are Always There For You!</i></i>
                </p>
            </div>
        </div>
        <div id="login" class="hl">
            <div class="details">
                <div class="one">
                    <h3>Please Login For More Services</h3>
                    <br />
                    <form action="/action_page.php">
                        <input type="text" placeholder="Username" name="username" /><br /><br />
                        <input type="text" placeholder="Password" name="psw" /><br /><br />
                        <button type="submit">Login</button>
                    </form>
                    <p>Forget Password?<a href="#reset">Click Here</a></p>
                </div>

                <div class="two">
                    <h3>Are You New?</h3>
                    <br />
                    <div class="btn">
                        <a class="border" href="register.html">
                            <h1>Register</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-5" style="background:#F9F9F9">
            <section class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            <i>We wanted to be your trusted and nearest neighbor in your emergency
                                situation</i>
                        </h2>
                        <p>
                            Our shelters come in a variety of standard configurations but custom
                            solutions are viable. You can deploy a safe, fully functional helping
                            facility in a matter of hours. Extraordinary Mobility. Flexible.
                            Extraordinary Durability. Fast. Extraordinary Savings.
                            <br />
                            <br />
                            Be confident in a crisis, with a temporary shelter built to stand up
                            to extreme environments and catastrophic events.
                        </p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-between">
                        <div class="card p-2" style="width: 17rem;">
                            <img src="{{ asset('image/ai1s.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Emergency situation?</h5>
                                <p class="card-text">We'll provide all kind of help</p>
                            </div>
                        </div>
                        <div class="card p-2" style="width: 17rem;">
                            <img src="{{ asset('image/da1.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Need A Doctor?</h5>
                                <p class="card-text">You can contact our doctors any time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="howitworks" class="works">
            <p class="paragraph">How It Works?</p>
            <h3 class="h2">You Can Watch Our Video</h3>
        </div>




    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
