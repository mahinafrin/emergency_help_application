<div class="sticky-top" style="font-size: 62.5%!important;">
    <nav class="navbar bg-dark navbar-expand-md navbar-dark" style="font-size: 62.5%!important">
        <div class="container">
            <a href="/" class="navbar-brand">Emergency Help</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about.index')}}" class="nav-item nav-link">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a href="{{route('doctor.index')}}" class="dropdown-item">Doctor</a>
                            </li>
                            <li>
                                <a href="{{route('oxygen.index')}}" class="dropdown-item">Oxygen</a>
                            </li>
                            <li>
                                <a href="{{route('blood.index')}}" class="dropdown-item">Blood</a>
                            </li>
                            <li>
                                <a href="{{route('police.index')}}" class="dropdown-item">Police</a>
                            </li>
                            <li>
                                <a href="{{route('fire-service.index')}}" class="dropdown-item">Fire Service</a>
                            </li>
                            <li>
                                <a href="{{route('ambulance.index')}}" class="dropdown-item">Ambulance</a>
                            </li>
                            <li>
                                <a href="{{route('hospital.index')}}" class="dropdown-item">Hospital</a>
                            </li>
                            <li>
                                <a href="{{route('medicine.index')}}" class="dropdown-item">Medicine</a>
                            </li>
                            <li>
                                <a href="{{route('food.index')}}" class="dropdown-item">Food</a>
                            </li>
                            <li>
                                <a href="{{route('helper.index')}}" class="dropdown-item">Social Worker</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/#howItWorks" class="nav-item nav-link">How It Works?</a></li>
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.messages.index') }}" >
                                Messages
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
