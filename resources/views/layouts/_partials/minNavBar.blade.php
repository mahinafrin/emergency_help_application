<!-- Navbar -->
<nav class="min_nav navbar-expand-lg navbar-light bg-light">
 <!-- Container wrapper -->
 <div class="container">
  @if (Auth::check())
  <i class="fa-solid fa-envelope mr-2"></i> {{Auth::user()->email}}
  <span style="font-size: 20px">|</span>
  @endif
  @if(session()->get('location'))
  <i class="fa-solid fa-location-dot m-2"></i>
  {{ session()->get('location')['geoplugin_city']}} |
  {{ session()->get('location')['geoplugin_countryName']}}
  @else
  @php
  $user_ip = getenv('REMOTE_ADDR'); // 127.0.0.1:8000
  $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
  session()->put('location', $geo);
  @endphp
  @endif
  @if (Auth::check())
  <span style="font-size: 20px">|</span>
  <i class="fa-solid fa-circle-user"></i>
  <span class="text-capitalize">{{Auth::user()->roles[0]->name}}</span>
  @endif
 </div>
 <!-- Container wrapper -->
</nav>
<!-- Navbar -->
