@extends('landing.layouts.layout')
@section('content')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 mt-5">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row gy-10 mb-md-20">
                <div class="col-12 col-lg-8">
                    <div class="row gap-sm-5 gap-md-0 gap-lg-5">
                        <div class="col-12 col-md-6 col-lg-12 card-product">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-transparent"
                                style="border-radius: 32px">
                                <img src="{{ asset('public/product-detail_1/' . $data->detail_1) }}" loading="lazy"
                                    class="w-100" alt="">
                            </div>
                            <!--end::Image-->
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 card-product">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-transparent"
                                style="border-radius: 32px">
                                <img src="{{ asset('public/product-detail_2/' . $data->detail_2) }}" loading="lazy"
                                    class="w-100" alt="">
                            </div>
                            <!--end::Image-->
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 card-product">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-transparent"
                                style="border-radius: 32px">
                                <img src="{{ asset('public/product-detail_3/' . $data->detail_3) }}" loading="lazy"
                                    class="w-100" alt="">
                            </div>
                            <!--end::Image-->
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 card-product">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-transparent"
                                style="border-radius: 32px">
                                <img src="{{ asset('public/product-detail_4/' . $data->detail_4) }}" loading="lazy"
                                    class="w-100" alt="">
                            </div>
                            <!--end::Image-->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 position-sticky h-100" style="top: 80px;">
                    <div class="p-10 mb-8" style="background-color: #F2F4F7; border-radius: 32px">
                        <h2 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                            {{ $data->judul_product }}</h2>
                        <div class="fs-lg-6">
                            {!! $data->deskripsi !!}
                        </div>
                        <div class="d-grid">
                            <a href="{{ $data->link }}" target="_blank"
                                class="btn btn-primary rounded-pill text-white fw-bolder">{{ $data->price }}
                                Buy Now</a>
                            <a href="{{ $data->link }}" target="_blank"
                                class="btn rounded-pill text-dark fw-bolder">Preview
                                in browser <i class="bi bi-arrow-right-short fw-bold fs-1"></i></a>
                        </div>
                    </div>

                    <div class="p-10 mb-8" style="background-color: #F2F4F7; border-radius: 32px">
                        <h2 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                            Information</h2>
                        <ul class="list-group">
                            <li class="list-group-item py-2 px-0 d-flex align-items-center justify-content-between"
                                style="background-color: transparent; color: #000000; opacity: 0.6;">
                                <span>Compatibility</span> <span>Framer, Figma</span>
                            </li>
                            <li class="list-group-item py-2 px-0 d-flex align-items-center justify-content-between"
                                style="background-color: transparent; color: #000000; opacity: 0.6;">
                                <span>File size</span> <span>56.74 MB</span>
                            </li>
                            <li class="list-group-item py-2 px-0 d-flex align-items-center justify-content-between"
                                style="background-color: transparent; color: #000000; opacity: 0.6;">
                                <span>Last update</span> <span>11 Nov 2088</span>
                            </li>
                        </ul>
                    </div>

                    <div class="p-10 mb-8" style="background-color: #111111; border-radius: 32px">
                        <h1 class="text-white fs-2qx" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                            Pro Access</h1>
                        <div class="fs-lg-6 text-white mb-3">
                            Designing in Framer has never been so fast and effortless. Browse hundreds of beautifully
                            designed layouts, copy and paste assets.
                        </div>
                        <div class="d-grid">
                            <a href="" class="btn btn-primary rounded-pill text-white fw-bolder">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
