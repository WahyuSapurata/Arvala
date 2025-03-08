<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>{{ config('app.name') }} | {{ $module }}</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Kilq is a dynamic product mockup template designed to help creators and entrepreneurs showcase their digital products with professional, high-quality mockups. Perfect for selling and presenting digital goods in a visually appealing way.">
    <meta name="keywords"
        content="product mockup template, digital product mockup, marketplace mockup design, sell mockup templates, professional product mockups, digital goods mockup, mockup for creators, product presentation template, high-quality mockup designs, downloadable mockup templates, creative product mockups, mockup marketplace template, sell digital mockups, product display templates, mockup design for entrepreneurs, digital asset mockups, customizable mockup templates, premium mockup designs, mockup for digital products, product visualization templates">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Kilq - Professional Product Mockup Template for Digital Goods" />
    <meta property="og:description"
        content="Kilq is a dynamic product mockup template designed to help creators and entrepreneurs showcase their digital products with professional, high-quality mockups. Perfect for selling and presenting digital goods in a visually appealing way." />
    <meta property="og:url" content="https://arvalamockup.com/" />
    <meta property="og:site_name" content="Kilq Mockup" />
    <meta property="og:image" content="https://arvalamockup.com/logo_arvala.png" />
    <meta property="og:image:alt" content="Kilq Mockup Preview" />
    <link rel="canonical" href="https://arvalamockup.com/" />
    <meta name="google-site-verification" content="FnO2dJiuVYaHHdnvK8oXap9nXg8FuI7ayeh6i1J7nEE" />
    <link rel="shortcut icon" href="{{ asset('FAV ICOn.png') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu"
    class="bg-white position-relative app-blank">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Header Section-->
        @include('landing.layouts.header')
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            @yield('bg-hero')
            <!--end::Wrapper-->
        </div>
        <!--end::Header Section-->
        @yield('content')
        {{-- <!--begin::How It Works Section-->
        <div class="mb-n10 mb-lg-n20 z-index-2 content-deskripsi" style="margin-top: 220px">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Indonesia Youth Summit</h3>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="content-subdeskripsi">
                        <div class="fs-5 text-muted fw-bold">Indonesia Youth Summit merupakan wadah kolaborasi dan
                            penguatan sinergi pemuda Indonesia untuk meningkatkan kepemimpinan dan berkontribusi
                            langsung dalam penyusunan dan deklarasi ‘Suara Pemuda Indonesia’ yang merupakan rekomendasi
                            kebijakan nasional. Dengan memadukan sidang pemuda, talkshow inspiratif, dan kegiatan
                            interaktif lainnya, kegiatan ini menjadi platform bagi pemuda untuk bertukar ide,
                            mendiskusikan isu-isu pembangunan, dan merencanakan tindakan konkret untuk perubahan positif
                            menuju Indonesia yang lebih maju. Melalui kolaborasi pemuda pada forum ini, diharapkan
                            tercipta serangkaian solusi konstruktif atas permasalahan yang tengah dihadapi dan evaluasi
                            agenda Pembangunan nasional Indonesia.
                        </div>
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Heading-->
                <!--begin::Row-->
                <div class="row w-100 gy-10 mb-md-20 content-benefit">
                    <h3 class="fs-2hx text-dark text-center" id="how-it-works"
                        data-kt-scroll-offset="{default: 100, lg: 150}">
                        BENEFITS</h3>
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/1.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/2.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/3.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/4.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/5.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/6.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/7.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/8.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Story-->
                        <div class="shadow-lg">
                            <!--begin::Heading-->
                            <img src="{{ asset('benefit/9.jpg') }}" class="w-100 rounded-2" alt="">
                            <!--end::Heading-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Product slider-->
                <div class="tns tns-default">
                    <!--begin::Slider-->
                    <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                        data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                        data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                        data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                        <!--begin::Item-->
                        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                            <img src="{{ asset('benefit/flayer.jpg') }}" class="card-rounded shadow mw-100"
                                alt="" />
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Slider-->
                    <!--begin::Slider button-->
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                        <span class="svg-icon svg-icon-3x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Slider button-->
                    <!--begin::Slider button-->
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-3x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Slider button-->
                </div>
                <!--end::Product slider-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::How It Works Section-->
        <!--begin::Statistics Section-->
        <div class="mt-sm-n10">
            <!--begin::Curve top-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <style>
                        svg {
                            fill: #fe4646;
                        }
                    </style>
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z">
                    </path>
                </svg>
            </div>
            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <div class="pb-15 pt-18" style="background-color: #fe4646">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mt-15 mb-18" id="achievements"
                        data-kt-scroll-offset="{default: 100, lg: 150}">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-white mb-5">EVENT SCHEDULE</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Statistics-->
                    <div class="d-flex flex-center">
                        <!--begin::Items-->
                        <div
                            class="d-grid d-md-flex gap-5 content-eventschedule flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                            <!--begin::Item-->
                            <div
                                class="col-md-2 d-flex align-items-center justify-content-center bg-white rounded-2 shadow-lg p-3 h-100px">
                                <!--begin::Label-->
                                <div class="text-dark text-center fw-semibold fs-6">Open
                                    Registration &
                                    Submit PPT <br>
                                    <span class="text-danger fw-bolder">28 Maret – 10
                                        Juli 2024</span>
                                </div>
                                <!--end::Label-->
                                <div>
                                    <img src="{{ asset('arrow.png') }}" style="margin-right: -35px" alt="">
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div
                                class="col-md-2 d-flex align-items-center justify-content-center bg-white rounded-2 shadow-lg p-3 h-100px">
                                <!--begin::Label-->
                                <div class="text-dark text-center fw-semibold fs-6">Official
                                    Announcement
                                    Delegates <br>
                                    <span class="text-danger fw-bolder">15 Juli 2024</span>
                                </div>
                                <!--end::Label-->
                                <div>
                                    <img src="{{ asset('arrow.png') }}" style="margin-right: -35px" alt="">
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div
                                class="col-md-2 d-flex align-items-center justify-content-center bg-white rounded-2 shadow-lg p-3 h-100px">
                                <!--begin::Label-->
                                <div class="text-dark text-center fw-semibold fs-6">Online
                                    Technical
                                    Meeting <br>
                                    <span class="text-danger fw-bolder">17 Juli 2024</span>
                                </div>
                                <!--end::Label-->
                                <div>
                                    <img src="{{ asset('arrow.png') }}" style="margin-right: -35px" alt="">
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div
                                class="col-md-2 d-flex align-items-center justify-content-center bg-white rounded-2 shadow-lg p-3 h-100px">
                                <!--begin::Label-->
                                <div class="text-dark text-center fw-semibold fs-6">Indonesia
                                    Youth Summit <br>
                                    <span class="text-danger fw-bolder">23 - 24 Juli 2024</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <style>
                        svg {
                            fill: #fe4646;
                        }
                    </style>
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z">
                    </path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>
        <!--end::Statistics Section-->
        <!--begin::Team Section-->
        <div class="py-10 py-lg-20">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mb-12">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">
                        EVENT</h3>
                    <!--end::Title-->
                    <!--begin::Sub-title-->
                    <div class="fs-5 text-muted fw-bold content-eventdetail">
                        Indonesia Youth Summit menjadi kegiatan tahunan yang diselenggarakan oleh Dinas Pemuda dan
                        Olahraga Kota Makassar yang berkolaborasi dengan Muda.in. Tahun 2024, Indonesia Youth Summit
                        mengusung tema “Menuju Indonesia Emas 2045”. Pelaksanaan Indonesia
                        Youth Summit dikemas dengan konsep youth camp.
                    </div>
                    <!--end::Sub-title=-->
                </div>
                <!--end::Heading-->
                <!--begin::Slider-->
                <div class="tns tns-default">
                    <!--begin::Wrapper-->
                    <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                        data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                        data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                        data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
                        data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
                        @foreach ($data_event as $item)
                            <!--begin::Item-->
                            <div class="text-center">
                                <!--begin::Person-->
                                <div class="m-5 p-5 rounded-3 shadow-sm border border-gray-500">
                                    <!--begin::Name-->
                                    <a href="#"
                                        class="text-dark fw-bold text-hover-primary fs-3">{{ $item->judul }}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-semibold mt-1">{{ $item->event }}</div>
                                    <small class="d-flex justify-content-center align-items-center gap-1">
                                        <svg height="1em" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        {{ $item->lokasi }} | {{ $item->jam_mulai . ' - ' . $item->jam_selesai }}
                                    </small>
                                    <a href="{{ route('landing-detail', ['uuid' => $item->uuid]) }}"
                                        class="mt-2 btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary">Lihat
                                        Detail</a>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Button-->
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                        <span class="svg-icon svg-icon-3x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-3x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Slider-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Team Section-->
        <!--begin::Pricing Section-->
        <div class="mt-sm-n20">
            <!--begin::Curve top-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <style>
                        svg {
                            fill: #fe4646;
                        }
                    </style>
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z">
                    </path>
                </svg>
            </div>
            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <div class="py-20" style="background-color: #fe4646">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Plans-->
                    <div class="d-flex flex-column container pt-lg-20">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx text-white mb-5" id="pricing"
                                data-kt-scroll-offset="{default: 100, lg: 150}">EVENT DETAILS</h1>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Pricing-->
                        <div class="text-center">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <div class="d-flex h-100">
                                        <!--begin::Option-->
                                        <div class="w-100 d-flex flex-column rounded-3 py-10 px-10"
                                            style="background-color: #fff !important;">
                                            <!--begin::Heading-->
                                            <div class="mb-7 text-center">
                                                <img src="{{ asset('event.png') }}" width="75px" alt="">
                                                <!--begin::Title-->
                                                <h1 class="mb-5 fw-boldest">Event Pillars
                                                </h1>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Features-->
                                            <div class="w-100 mb-5">
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Forum
                                                        Session</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Commision
                                                        Meeting</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Sidang
                                                        Pemuda</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Inspiring
                                                        Talks</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Social
                                                        Night</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Treasure
                                                        Hunt</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span
                                                        class="fw-semibold fs-6 opacity-75 text-start pe-3">Entertaintment</span>
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Features-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <div class="d-flex h-100">
                                        <!--begin::Option-->
                                        <div class="w-100 d-flex flex-column rounded-3 py-10 px-10"
                                            style="background-color: #fff !important;">
                                            <!--begin::Heading-->
                                            <div class="mb-7 text-center">
                                                <img src="{{ asset('terms_and_conditions.png') }}" width="75px"
                                                    alt="">
                                                <!--begin::Title-->
                                                <h1 class="mb-5 fw-boldest">Syarat dan Ketentuan Peserta
                                                </h1>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Features-->
                                            <div class="w-100 mb-5">
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">WNI
                                                        (Warga Negara Indonesia)</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Usia
                                                        Pemuda 17-30 Tahun dibuktikan dengan KTP/KK</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span
                                                        class="fw-semibold fs-6 opacity-75 text-start pe-3">Melampirkan
                                                        CV</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span
                                                        class="fw-semibold fs-6 opacity-75 text-start pe-3">Melampirkan
                                                        Desk (PowerPoint) rekomendasi kebijakan awal, yang sesuai dengan
                                                        ketentuan yang ditetapkan pada guidebook</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Memiliki
                                                        pengetahuan yang cukup tentang agenda Pembangunan daerah asal
                                                        masing-masing</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Memiliki
                                                        ide/gagasan yang inovatif untuk agenda pembangunan nasional
                                                        menuju Indonesia Emas 2045</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Memiliki
                                                        akun sosial media (Instagram) yang aktif</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Bersedia
                                                        menghadiri kegiatan Indonesia Youth Summit 2024 secara offline
                                                        di Kota Makassar</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span
                                                        class="fw-semibold fs-6 opacity-75 text-start pe-3">Berkomitmen
                                                        untuk aktif terlibat dalam penyusunan ’Suara Pemuda
                                                        Indonesia’</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Sehat
                                                        jasmani dan rohani</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Wajib
                                                        follow akun instagram @indonesiayouthsummit, @dispora_makassar,
                                                        @mudaa.in</span>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex gap-4 mb-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span
                                                        class="fw-semibold fs-6 opacity-75 text-start pe-3">Pendaftaran
                                                        tidak dipungut biaya</span>
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Features-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Pricing-->
                    </div>
                    <!--end::Plans-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <style>
                        svg {
                            fill: #fe4646;
                        }
                    </style>
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z">
                    </path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>
        <!--end::Pricing Section-->
        <!--begin::Testimonials Section-->
        <div class="mt-20 mb-n20 position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-10 text-uppercase" id="clients"
                        data-kt-scroll-offset="{default: 125, lg: 150}">
                        Initiated with the support of</h3>
                    <div class="d-flex justify-content-center gap-10">
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('pemkot.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('logo_f8.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('logo_kemenpora.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('logo_kemenkraf.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('apeksi.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-10 text-uppercase" id="clients"
                        data-kt-scroll-offset="{default: 125, lg: 150}">
                        Powered by</h3>
                    <div class="d-flex justify-content-center gap-10">
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('Logo_dispora.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('logo_explore.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-10 text-uppercase" id="clients"
                        data-kt-scroll-offset="{default: 125, lg: 150}">
                        in collaboration with</h3>
                    <div class="d-flex justify-content-center gap-10" style="flex-flow: wrap">
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('logo_muda..png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('binar.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('pemimpin.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('ycc.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('youth.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('Logo_duta_pemuda_makassar.png') }}"
                                class="h-60px h-md-95px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo-->
                        <a href="">
                            <img alt="Logo" src="{{ asset('sre.png') }}" class="h-60px h-md-90px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Title-->
                </div>

                <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-2 p-lg-6 mb-17"
                    style="background: linear-gradient(90deg, #fe1a19 0%, #fff9f9 100%);">
                    <!--begin::Content-->
                    <div class="my-2 me-5">
                        <!--begin::Title-->
                        <div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">GUIDE BOOK
                        </div>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Join over 100,000 Professionals
                            Community to Stay Ahead</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Link-->
                    <a href="{{ asset('GUIDE BOOK IYS24.pdf') }}" target="_blank"
                        class="btn btn-lg btn-danger border-2 flex-shrink-0 my-2">
                        DOWNLOAD</a>
                    <!--end::Link-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Testimonials Section--> --}}
        @include('landing.layouts.footer')
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                        transform="rotate(90 13 6)" fill="currentColor" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->
    </div>
    <!--end::Root-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    @yield('script')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            @if (Session::has('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Mantap',
                    text: @json(Session::get('message')),
                    showConfirmButton: false,
                    timer: 3000
                })
            @endif
        });
    </script>

</body>
<!--end::Body-->

</html>
