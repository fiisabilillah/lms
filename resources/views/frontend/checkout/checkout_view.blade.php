@extends('frontend.master')
@section('home')
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">Checkout</h2>
            </div>
            <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="index.html">Home</a></li>
                <li>Pages</li>
                <li>Checkout</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="cart-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-item">
                    
                <form method="post" class="row" action="{{ route('payment') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" class="form-control form--control" type="text" name="name" value="{{ Auth::user()->name }}">
                            <input type="hidden" class="form-control form--control" type="email" name="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" class="form-control form--control" type="text" name="address" value="{{ Auth::user()->address }}">
                            <input type="hidden" id="phone" class="form-control form--control" type="tel" name="phone" value="{{ Auth::user()->phone }}">
                </div><!-- end card -->
                <div class="card card-item">
                <input type="hidden" checked="" id="cashTransfer" name="cash_delivery" type="radio" value="handcash">
                </div><!-- end card -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-12" style="margin-top: -150px;">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="card-title fs-30 pb-3">Daftar Details</h3>
                        <div class="divider"><span></span></div>
                        <div class="order-details-lists">

                            @foreach ($carts as $item)

                            <input type="hidden" name="sulg[]" value="{{ $item->options->slug }}">
                            <input type="hidden" name="course_id[]" value="{{ $item->id }}">
                            <input type="hidden" name="course_title[]" value="{{ $item->name }}">
                            <input type="hidden" name="price[]" value="{{ $item->price }}">
                            <input type="hidden" name="instructor_id[]" value="{{ $item->options->instructor }}">



                            <div class="media media-card border-bottom border-bottom-gray pb-3 mb-3">
                                <a href="{{ url('course/details/'.$item->id.'/'.$item->options->slug) }}" class="media-img">
                                    <img src="{{ asset($item->options->image) }}" alt="Cart image">
                                </a>
                                <div class="media-body">
                                    <h5 class="fs-15 pb-2"><a style="font-size: 22px;" href="{{ url('course/details/'.$item->id.'/'.$item->options->slug) }}">{{ $item->name }} </a></h5>
                                    <h6 class="ribbon ribbon-red-bg fs-14 mb-3 ">Tanggal pelaksanaan : {{ \Carbon\Carbon::parse($item->options->tgl_mulai)->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse($item->options->tgl_selesai)->translatedFormat('d F Y') }}</h6>

                                    <!-- <p class="text-black font-weight-semi-bold lh-18">Rp.{{ $item->price }} </p> -->
                                </div>
                            </div>
                            <!-- end media -->
                            @endforeach



                        </div><!-- end order-details-lists -->
                        <!-- <a href="{{ route('mycart') }}" class="btn-text"><i class="la la-edit mr-1"></i>Edit</a> -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
                <div class="card card-item">
                    <div class="card-body">
                        <!-- <h3 class="card-title fs-22 pb-3">Order Summary</h3>
                        <div class="divider"><span></span></div> -->

                        @if (Session::has('coupon'))

                        <ul class="generic-list-item generic-list-item-flash fs-15">
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">SubTotal:</span>
                                <span>Rp.{{ $cartTotal }}</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Coupon Name:</span>
                                <span> {{ session()->get('coupon')['coupon_name'] }}
                                    ( {{ session()->get('coupon')['coupon_discount'] }} %) </span>
                            </li>

                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Coupon Dicount:</span>
                                <span> RP.{{ session()->get('coupon')['discount_amount'] }}
                                </span>
                            </li>

                            <li class="d-flex align-items-center justify-content-between font-weight-bold">
                                <span class="text-black">Total:</span>
                                <span>Rp.{{ session()->get('coupon')['total_amount'] }}</span>
                            </li>
                        </ul>
                        <input type="hidden" name="total" value="{{ $cartTotal}}">
                        @else

                        <!-- <ul class="generic-list-item generic-list-item-flash fs-15">

                            <li class="d-flex align-items-center justify-content-between font-weight-bold">
                                <span class="text-black">Total:</span>
                                <span>Rp.{{ $cartTotal }}</span>
                            </li>
                            <input type="hidden" name="total" value="{{ $cartTotal}}">
                        </ul> -->

                        @endif






                        <div class="btn-box border-top border-top-gray pt-3">
                            <!-- <p class="fs-14 lh-22 mb-2">Aduca is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p>
                            <p class="fs-14 lh-22 mb-3">By completing your purchase you agree to these <a href="#" class="text-color hover-underline">Terms of Service.</a></p> -->
                            <button type="submit" class="btn theme-btn w-100">Proceed <i class="la la-arrow-right icon ml-1"></i></button>

                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->

    </form>
</section>
<!-- ================================
       END CONTACT AREA
================================= -->













@endsection