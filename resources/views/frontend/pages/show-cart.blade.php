<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="{{ asset('')}}assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <title>Green Chilli</title>
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{asset('')}}assets/css/toastr.min.css'">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/font-awesome.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('')}}assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="{{ asset('')}}assets/css/owl-carousel.css">
    <link rel="stylesheet" href="{{ asset('')}}assets/css/lightbox.css">
    <style>
        td {
            padding: 5px !important;
            vertical-align: middle !important;
        }

    </style>
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky" style="box-shadow: 0px 0px 2px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{ asset('')}}assets/images/klassy-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="menu-button" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </li>
                            <li>
                                <button class="menu-button" onclick="window.location.href='/Show-Cart'">
                                    <i style="position: relative; color: #fb4949;" class="fas fa-cart-plus reload-count">
                                        @if($cartItemCount->count() != 0)
                                        <span class="shopping-cart">{{$cartItemCount->count() ? $cartItemCount->count() : 0}}</span>
                                        @endif
                                    </i>
                                </button>
                            </li>
                            @else
                            <li><button class="menu-button" data-toggle="modal" data-target="#staticBackdrop">Log in</button></li>
                            @endauth
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <!-- ***** Header Area End ***** -->

    <div style="min-height: 120px;"></div>


    <div class="main-content" id="example">

    </div>

    <!-- ***** Footer Start ***** -->
    @include('frontend.layouts.partials.footer')


    {{-- import app js --}}
    <script src="{{ asset('js/app.js')}}"></script>
    <!-- jQuery -->
    <script src="{{ asset('')}}assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('')}}assets/js/popper.js"></script>
    <script src="{{ asset('')}}assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('')}}assets/js/owl-carousel.js"></script>
    <script src="{{ asset('')}}assets/js/accordions.js"></script>
    <script src="{{ asset('')}}assets/js/datepicker.js"></script>
    <script src="{{ asset('')}}assets/js/scrollreveal.min.js"></script>
    <script src="{{ asset('')}}assets/js/waypoints.min.js"></script>
    <script src="{{ asset('')}}assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('')}}assets/js/imgfix.min.js"></script>
    <script src="{{ asset('')}}assets/js/slick.js"></script>
    <script src="{{ asset('')}}assets/js/lightbox.js"></script>
    <script src="{{ asset('')}}assets/js/isotope.js"></script>
    <!-- toastr plugin -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Global Init -->
    <script src="{{ asset('')}}assets/js/custom.js"></script>
    @stack('js')
    {{-- <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script> --}}

</body>
</html>
