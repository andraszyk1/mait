
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset("css/bootstrap.min.css")}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Moduł @yield('title')</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">



  <div class="collapse navbar-collapse" id="navbarNav">

     <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
@else
                         <li class="nav-item">
                              <a class="nav-link" href="{{URL::to('home')}}">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  Items
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{URL::to('items')}}">Inventory</a>
                                    @can('isAdmin')
                                    <a class="dropdown-item" href="{{URL::to('computer')}}">Computers</a>
                                    @endcan

                                    <a class="dropdown-item" href="{{URL::to('printers')}}">Printers</a>
                                    <a class="dropdown-item" href="{{URL::to('monitor')}}">Monitors</a>
                                    <a class="dropdown-item" href="{{URL::to('location')}}">Locations</a>
                                    <a class="dropdown-item" href="{{URL::to('workers')}}">Workers</a>
                                </div>
                            </li>

                         <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  Print System
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{URL::to('print_outs')}}">Print</a>
                                    <a class="dropdown-item" href="{{URL::to('layouts')}}">Layouts</a>
                                    <a class="dropdown-item" href="{{URL::to('pn')}}">Part numbers</a>
                                </div>
                            </li>





                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ URL::to('workers/edit/'. Auth::user()->id)}}">Account Settings </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>






  </div>
</nav>
  @yield('addlink')
    <div class="container p-4 pb-0">

@yield('content')

  </div>

<section class="">
  <!-- Footer -->
  <footer class="text-center text-white bg-dark text-white" style="">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3"><h3>Maflow IT System Information </h3></span>

        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 bg-dark" style="font-size:14px;">
      © @if (isset($footerYear))
         {{$footerYear}}

      @endif  Copyright:
      <a class="text-white" style="" href="{{URL::to('')}}">Łukasz Andraszyk</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>

  <script src="{{ URL::asset("js/bootstrap.min.js")}}"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>)
   @yield('js-files')
  </body>
</html>
