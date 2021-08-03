<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                    </div>
                    <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="create_reservation" action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <select value="number-guests" name="number_of_guest" id="number-guests" required="">
                                        <option value="number-guests">Number Of Guests*</option>
                                        <option name="1" id="1">1</option>
                                        <option name="2" id="2">2</option>
                                        <option name="3" id="3">3</option>
                                        <option name="4" id="4">4</option>
                                        <option name="5" id="5">5</option>
                                        <option name="6" id="6">6</option>
                                        <option name="7" id="7">7</option>
                                        <option name="8" id="8">8</option>
                                        <option name="9" id="9">9</option>
                                        <option name="10" id="10">10</option>
                                        <option name="11" id="11">11</option>
                                        <option name="12" id="12">12</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy*" required="">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <select value="time" name="time" id="time" required="">
                                        <option value="time">Time*</option>
                                        <option name="Breakfast" id="Breakfast">Breakfast</option>
                                        <option name="Lunch" id="Lunch">Lunch</option>
                                        <option name="Dinner" id="Dinner">Dinner</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="description" rows="4" id="message" placeholder="Message"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button id="form-submit" class="main-button-icon">Make A Reservation</button>
                                </fieldset>
                            </div>

                            <small id="show_error" class="text-danger"></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[nama = "csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('body').on('submit', '#create_reservation', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/reservation'
                , method: 'POST'
                , contentType: false
                , processData: false
                , data: new FormData(this)
                , success: function(response) {
                    if (response.error) {
                        for (const [k, v] of Object.entries(response.error)) {
                            toastr.error(v);
                        }
                    }
                    if (response.type == 'success') {
                        toastr.success(response.message);
                        $('#create_reservation')[0].reset();
                    } else if (response.type == 'error') {
                        toastr.error(response.error);
                    }
                }
            })
        })
    })

</script>

@endpush
