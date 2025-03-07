@extends('landing.layouts.layout')
@section('bg-hero')
    <div class="container">
        <div class="w-100 py-10">
            <img src="{{ asset('bg-default.png') }}" class="w-100 backgriund-landing d-none d-md-block" loading="lazy"
                style="height: 100%%" alt="">
            <img src="{{ asset('bg-mobile.png') }}" class="w-100 backgriund-landing d-block d-md-none" loading="lazy"
                style="height: 100%" alt="">
        </div>
    </div>
@endsection
@section('content')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 mt-5">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="d-flex justify-content-between align-items-center mb-17">
                <!--begin::Title-->
                <h3 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                    Latest Mockup</h3>
                <a href="" class="btn btn-view-custom">View More <i class="bi bi-arrow-right fs-4 ms-3"></i></a>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row gy-10 mb-md-20">

                @forelse ($latest_product as $latest)
                    <!--begin::Col-->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--begin::Card-->
                        <a href="{{ route('detail-product', ['params' => $latest->slug]) }}"
                            class="card card-product border-0">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                <img src="{{ asset('public/product-thumbnail/' . $latest->thumbnail) }}" loading="lazy"
                                    class="w-100 rounded-2" alt="{{ $latest->judul_product }}">
                            </div>
                            <!--end::Image-->

                            <!--begin::Card Body-->
                            <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                <div>
                                    <h5 class="card-title fw-bolder">{{ $latest->judul_product }}</h5>
                                    <p class="text-muted small mb-2">{{ $latest->kategori }}</p>
                                </div>
                                <span class="badge text-white px-4 py-3 rounded-pill fw-bolder"
                                    style="background-color: #ADAD47">{{ $latest->price }}</span>
                            </div>
                            <!--end::Card Body-->
                        </a>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                @empty
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-box-seam display-4 text-muted"></i>
                            <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                            <p class="text-muted">Silakan tambahkan data terlebih dahulu.</p>
                        </div>
                    </div>
                @endforelse

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->

    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 mt-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="d-flex justify-content-between align-items-center mb-17">
                <!--begin::Title-->
                <h3 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                    More Mockup</h3>
                <a href="" class="btn btn-view-custom">View More <i class="bi bi-arrow-right fs-4 ms-3"></i></a>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row gy-10 mb-md-20">

                @forelse ($more_product as $more)
                    <!--begin::Col-->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--begin::Card-->
                        <a href="{{ route('detail-product', ['params' => $latest->slug]) }}"
                            class="card card-product border-0">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                <img src="{{ asset('public/product-thumbnail/' . $more->thumbnail) }}" loading="lazy"
                                    class="w-100 rounded-2" alt="{{ $more->judul_product }}">
                            </div>
                            <!--end::Image-->

                            <!--begin::Card Body-->
                            <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                <div>
                                    <h5 class="card-title fw-bolder">{{ $more->judul_product }}</h5>
                                    <p class="text-muted small mb-2">{{ $more->kategori }}</p>
                                </div>
                                <span class="badge text-white px-4 py-3 rounded-pill fw-bolder"
                                    style="background-color: #F5297A">{{ $more->price }}</span>
                            </div>
                            <!--end::Card Body-->
                        </a>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                @empty
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-box-seam display-4 text-muted"></i>
                            <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                            <p class="text-muted">Silakan tambahkan data terlebih dahulu.</p>
                        </div>
                    </div>
                @endforelse

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--end::Highlight-->
    <div class="my-20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Highlight-->
            <div class="shadow p-8 p-lg-15 custom-card" style="background: #7E36F4;">
                <!--begin::Content-->
                <div class="d-grid  d-md-flex align-items-center justify-content-between gap-2 gap-md-10 mb-4 mb-md-4">
                    <!--begin::Title-->
                    <div class="fs-1 fs-lg-3qx fw-bolder text-white flex-equal">Design Smarter
                        Present Better
                    </div>
                    <!--end::Title-->
                    <div class="flex-equal fs-lg-4" style="color: #FCFCFF">
                        Create stunning presentations effortlessly
                        with high-quality mockups tailored for designers who value precision and efficiency.
                    </div>
                </div>
                <!--end::Content-->
                <!--begin::Link-->
                <div class="d-grid d-md-flex gap-4 gap-md-10">
                    <!--begin::Description-->
                    <div class="fs-6 fs-lg-5 text-white fw-semibold flex-equal">
                        <ul class="list-group">
                            <li class="list-group-item text-white d-flex align-items-center"
                                style="background-color: #8540F5"><i class="bi bi-check-square-fill me-4"
                                    style="font-size: 20px; color: #DADA73"></i> Quick and easy
                                customization
                                with Smart Objects</li>
                            <li class="list-group-item text-white d-flex align-items-center"
                                style="background-color: #8540F5"><i class="bi bi-check-square-fill me-4"
                                    style="font-size: 20px; color: #DADA73"></i>Fully adjustable
                                object and
                                background colors</li>
                            <li class="list-group-item text-white d-flex align-items-center"
                                style="background-color: #8540F5"><i class="bi bi-check-square-fill me-4"
                                    style="font-size: 20px; color: #DADA73"></i>High Resolution: 5000
                                × 3500
                                pixels at 300 dpi</li>
                            <li class="list-group-item text-white d-flex align-items-center"
                                style="background-color: #8540F5"><i class="bi bi-check-square-fill me-4"
                                    style="font-size: 20px; color: #DADA73"></i>Well-organized layers
                                for
                                seamless editing</li>
                        </ul>
                    </div>
                    <!--end::Description-->
                    <div class="d-grid align-content-between gap-3 flex-equal">
                        <div class="flex-equal fs-lg-4" style="color: #FCFCFF">
                            Join our <span class="fw-bolder fst-italic">Telegram community</span> to get
                            early access to new mockups, exclusive discounts, and design tips!
                        </div>
                        <div>
                            <a href="https://t.me/arvalamockup" target="_blank"
                                class="btn py-2 py-lg-4 rounded-pill border text-white fs-lg-4"
                                style="font-weight: 500; background-color: #ADAD47;">
                                Join Our Telegram
                                <i class="bi bi-telegram p-0 ms-3 text-white fs-1 fs-lg-2qx"
                                    style="margin-right: -10px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end::Link-->
            </div>
            <!--end::Highlight-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Highlight-->
@endsection
