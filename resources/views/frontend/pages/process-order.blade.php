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
                                        @if($cartItems->count() != 0)
                                        <span class="shopping-cart">{{$cartItems->count() ? $cartItems->count() : 0}}</span>
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
        <form action="{{ route('confirm.order')}}" method="POST">
            @csrf
            <div class="container pt-3">
                <h5 class="pb-2">Order Process:</h5>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered text-center" style=" font-size:14px">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">sl</th>
                                    <th style="width: 40%;">Food Name</th>
                                    <th style="width: 25%;">Quantity</th>
                                    <th style="width: 25%;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sl = 1;
                                @endphp
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->quantity}}</td>
                                    <td>Tk {{ $item->price*$item->quantity}}</td>

                                </tr>
                                @php
                                $sl += $sl
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot class="font-weight-bold">
                                <tr>
                                    <td colspan="3" style="text-align: right">
                                        <p>Total = </p>
                                        <p>VAT = </p>
                                        <p>Delivery Charge = </p>
                                        <p>Sub Total = </p>
                                    </td>
                                    <td>
                                        <p>Tk {{ \Cart::getSubTotal() }}</p>
                                        <p>Tk {{ \Cart::getSubTotal()*.15 }}</p>
                                        <p>Tk 60</p>
                                        <p>Tk {{ (\Cart::getSubTotal()+(\Cart::getSubTotal()*.15))+60}}</p>
                                    </td>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="min-height: 0px !important">
                            <div class="card-header">Delivery Address:</div>
                            <div class="card-body">
                                <table class="table table-borderless" style="font-size: 14px">
                                    <tr>
                                        <td><label for="name">Name</label></td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid     @enderror" name="name" id="name" value="{{ old('name')}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="phone">Phone</label></td>
                                        <td>
                                            <input type="text" class="form-control @error('phone') is-invalid     @enderror" name="phone" id="phone" value="{{ old('phone')}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="address">Address</label></td>
                                        <td>
                                            <input type="text" class="form-control @error('address') is-invalid     @enderror" name="address" id="address" value="{{ old('address')}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="address">Payment Type</label>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="payment_method" value="COD" id="Cash">
                                                <label class="form-check-label" for="Cash">COD</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="payment_method" value="Card" id="Card">
                                                <label class="form-check-label" for="Card">Card</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="payment_method" value="Bank_Account" id="Bank_Account">
                                                <label class="form-check-label" for="Bank_Account">Bank Account</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="payment_method" value="Others" id="Others">
                                                <label class="form-check-label" for="Others">Others</label>
                                            </div>
                                            @error('payment_method') <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pt-4" style="text-align: center">
                        <button type="submit" class="btn btn-danger">Confirm Order</button>
                    </div>
                </div>
            </div>
        </form>
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
