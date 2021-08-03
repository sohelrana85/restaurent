@if(count($foods))
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach ($foods as $food)
                <div class="item" style=" position: relative">
                    <div class='card' style="background-image: url('/food_image/{{$food->image}}')">
                        {{-- <div class="price">
                            <h6>Tk{{number_format($food->price)}}</h6>
                    </div> --}}
                    <div class='info'>
                        <h1 class='title'>{{$food->title}}</h1>
                        <p class='description'>{{$food->desc}}</p>
                        <div class="main-text-button btn">
                            <div class="scroll-to-section">
                                <a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100" style="margin: 0px; position: absolute; bottom:0px;">
                    <div class="col-6 border py-1" style="text-align: center; background: #fb5849">
                        <p style="color: #fff">Tk {{number_format($food->price)}}</p>
                    </div>
                    <div class="col-6 border py-1 food-cart" id="{{$food->id}}">
                        <i style="color: #fff" class="fas fa-cart-plus"></i>
                    </div>

                </div>
                {{-- <button class="btn btn-light btn-sm"><i class="fas fa-cart-plus"></i></button> --}}
            </div>
            @endforeach


        </div>
    </div>
    </div>
</section>
@endif
