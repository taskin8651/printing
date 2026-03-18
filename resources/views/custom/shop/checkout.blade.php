@extends('custom.master')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.png') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title text-center">
                <h1>Checkout</h1>
                <ul class="breadcrumb-items">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><i class="fal fa-minus"></i></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Checkout -->
<section class="checkout-section fix section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- ✅ FIXED FORM -->
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf

                    <div class="row g-4 d-flex justify-content-center align-items-center">

                        <div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="checkout-single-wrapper">

                                <div class="checkout-single boxshado-single">
                                    <h4>Billing address</h4>

                                    <div class="checkout-single-form">
                                        <div class="row g-4">

                                            <div class="col-lg-6">
                                                <div class="input-single">
                                                    <input type="text" name="user_first_name" required placeholder="First Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-single">
                                                    <input type="text" name="user_last_name" required placeholder="Last Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-single">
                                                    <input type="email" name="user_check_email" required placeholder="Your Email">
                                                </div>
                                            </div>

                                           <div class="col-lg-6">
    <div class="input-single">
        <input type="text" name="phone" placeholder="Phone Number">
    </div>
</div>
                                            <div class="col-lg-12">
                                                <div class="input-single">
                                                    <textarea name="user_address" placeholder="Address"></textarea>
                                                </div>
                                            </div>

                                            <!-- 🔥 BUTTON FIX -->
                                            <div class="mt-4">
                                                <button type="submit" class="theme-btn">
                                                    <span>Place Order</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </form>
                <!-- END FORM -->

            </div>
        </div>
    </div>
</section>

@endsection