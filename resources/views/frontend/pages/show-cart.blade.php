<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <title>Green Chilli</title>
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
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
                            <img src="assets/images/klassy-logo.png">
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

    <div class="main-content">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Show Cart Item:</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center" style=" font-size:14px">
                                <thead>
                                    <tr>
                                        {{-- <th>Sl</th> --}}
                                        <th style="width: 20%;">Photo</th>
                                        <th style="width: 30%;">Food Name</th>
                                        <th style="width: 15%;">Price</th>
                                        <th style="width: 15%;">Quantity</th>
                                        <th style="width: 15%;">Total</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItemCount as $item)
                                    <tr>
                                        {{-- <td>{{ ++$loop->index}}</td> --}}
                                        <td><img src="{{ asset('food_image/'.$item->attributes->image)}}" alt="$item->attributes->image}}" style="width: 70px;"></td>
                                        <td>{{ $item->name}}</td>
                                        <td>Tk {{ $item->price}}</td>
                                        <td>
                                            <form action="{{route('update.qty')}}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <input type="number" name="quantity" class="form-control" value="{{ $item->quantity}}">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text" id="btnGroupAddon">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        {{-- <td>
                                                <input type="number" name="quantity" class="form-control" value="{{ $item->quantity}}">
                                        </td> --}}
                                        <td>Tk {{ $item->price*$item->quantity}}</td>
                                        <td class="d-flex justify-content-between">
                                            <form action="{{ route('remove.item', $item->id)}}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="font-weight-bold">
                                    <tr>
                                        <td colspan="4" style="text-align: right">Total = </td>
                                        <td>Tk {{ \Cart::getSubTotal() }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: right">VAT = </td>
                                        <td>Tk {{ \Cart::getSubTotal()*.15 }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: right">Delivery Charge = </td>
                                        <td>Tk 60</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: right">Sub Total = </td>
                                        <td>Tk {{ (\Cart::getSubTotal()+(\Cart::getSubTotal()*.15))+60}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div style="text-align: center">
                                <a href="{{ route('process.order')}}" class="btn btn-danger">Process My Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Footer Start ***** -->
    @include('frontend.layouts.partials.footer')


    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>
    <!-- toastr plugin -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
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
