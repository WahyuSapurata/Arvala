@extends('landing.layouts.layout')
@section('bg-hero')
    <div class="container">
        <div class="w-100 py-10">
            {{-- <img src="{{ asset('bg-default.png') }}" class="w-100 backgriund-landing d-none d-md-block" loading="lazy"
                style="height: 100%" alt=""> --}}
            <div class="w-100 backgriund-landing d-none d-md-block position-relative py-10" style="height: 100%">
                <div class="p-15" style="background-color: #F4F4F4; border-radius: 40px">
                    <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" class="d-grid" style=" gap: 32px;">
                        <h1 class="fw-bolder fs-4x fs-lg-5hx" style="color: #313131"><span
                                style="color: #8057FC; font-family: Mr Dafoe, sans-serif; font-weight: 400">
                                <span id="kt_landing_hero_text">The</span>
                            </span> Ultimate
                            <br> <span style="color: #8057FC;">Mockup</span> Library
                            <br>for <span style="color: #8057FC;">Designers</span>
                        </h1>
                        <h2 class="fw-normal fs-1" style="color: #4F4F4F;">Arvala is a high-quality mockup template <br>
                            library designed with top-tier precision and <br>
                            modern design standards.</h2>
                    </div>
                </div>
                <img src="{{ asset('Subtract.png') }}" class="position-absolute top-0 end-0" width="740px" alt="">
            </div>
            {{-- <img src="{{ asset('bg-mobile.png') }}" class="w-100 backgriund-landing d-block d-md-none" loading="lazy"
                style="height: 100%" alt=""> --}}
            <div class="w-100 backgriund-landing d-block d-md-none">
                <div class="py-12" style="border-radius: 20px; background-color: #F4F4F4; height: 100%">
                    <div class="position-relative">
                        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"
                            class="d-grid px-10 position-relative z-index-2" style=" gap: 16px;">
                            <h1 class="fw-bolder fs-5hx" style="color: #313131"><span
                                    style="color: #8057FC; font-family: Mr Dafoe, sans-serif; font-weight: 400">
                                    <span id="kt_landing_hero_text">The</span>
                                </span> Ultimate
                                <br> <span style="color: #8057FC;">Mockup</span> Library
                                <br>for <span style="color: #8057FC;">Designers</span>
                            </h1>
                            <h2 class="fw-normal fs-1" style="color: #4F4F4F;">Arvala is a high-quality mockup template
                                library designed with top-tier precision and
                                modern design standards.</h2>
                        </div>
                        {{-- <img src="{{ asset('Subtrack_mobile.png') }}" loading="lazy" width="95%"
                            class="position-absolute top-0 end-0 z-index-1" data-aos="fade-left" data-aos-delay="400"
                            data-aos-duration="1000" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 mt-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="d-flex justify-content-between align-items-center mb-17">
                <!--begin::Title-->
                <h3 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                    Bundle Mockup</h3>
                <a href="{{ route('shop') }}" class="btn btn-view-custom">View More <i
                        class="bi bi-arrow-right fs-4 ms-3"></i></a>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row gy-10 mb-md-20">

                @forelse ($bundle_product as $bundle)
                    <!--begin::Col-->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--begin::Card-->
                        <a href="{{ route('detail-product', ['params' => $bundle->slug]) }}"
                            class="card card-product border-0">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                <img src="{{ asset('public/product-thumbnail/' . $bundle->thumbnail) }}" loading="lazy"
                                    class="w-100 rounded-2" alt="{{ $bundle->judul_product }}">
                                {{-- Badge diskon jika ada --}}
                                @if ($bundle->diskon && $bundle->diskon->akhir_tanggal->isFuture())
                                    <span class="position-absolute top-0 end-0 m-2 badge rounded-md"
                                        style="background-color: #774CFB; font-weight: 600; font-size: 14px;">
                                        {{ $bundle->diskon->diskon_persen }}% Off
                                    </span>
                                @endif
                            </div>
                            <!--end::Image-->

                            <!--begin::Card Body-->
                            <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                <div>
                                    <h5 class="card-title fw-bolder">{{ $bundle->judul_product }}</h5>
                                    <p class="text-muted small mb-2">{{ $bundle->kategori }}</p>
                                </div>

                                <div class="text-end">
                                    @if ($bundle->discount_percentage > 0)
                                        <div class="d-flex flex-column align-items-end">
                                            <!-- Original Price (Top) -->
                                            <span class="text-muted text-decoration-line-through mb-1"
                                                style="font-size: 14px; font-style: italic">
                                                ${{ number_format($bundle->original_price, 2, '.', '') }}
                                            </span>

                                            <!-- Discounted Price (Bottom) - Larger -->
                                            <span class="badge text-primary py-3 rounded-pill fw-bolder"
                                                style="font-size: 1.2rem; padding: 0%">
                                                ${{ number_format($bundle->final_price, 2, '.', '') }}
                                            </span>
                                        </div>
                                    @else
                                        <!-- Regular Price (No discount) -->
                                        <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                            style="font-size: 1.2rem;">
                                            ${{ number_format($bundle->final_price, 2, '.', '') }}
                                        </span>
                                    @endif
                                </div>
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

                {{-- @forelse ($latest_product as $latest)
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
                                <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                    style="background-color: #323232">{{ $latest->price }}</span>
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
                @endforelse --}}

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
                    Free Mockup</h3>
                <a href="{{ route('shop') }}" class="btn btn-view-custom">View More <i
                        class="bi bi-arrow-right fs-4 ms-3"></i></a>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row gy-10 mb-md-20">

                @forelse ($free_product as $free)
                    <!--begin::Col-->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--begin::Card-->
                        <a href="{{ route('detail-product', ['params' => $free->slug]) }}"
                            class="card card-product border-0">
                            <!--begin::Image-->
                            <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                <img src="{{ asset('public/product-thumbnail/' . $free->thumbnail) }}" loading="lazy"
                                    class="w-100 rounded-2" alt="{{ $free->judul_product }}">
                            </div>
                            <!--end::Image-->

                            <!--begin::Card Body-->
                            <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                <div>
                                    <h5 class="card-title fw-bolder">{{ $free->judul_product }}</h5>
                                    <p class="text-muted small mb-2">{{ $free->kategori }}</p>
                                </div>
                                <div class="text-end">
                                    @if ($free->final_price == 0)
                                        <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                            style="background-color: transparent; font-size: 1.2rem;">
                                            Free
                                        </span>
                                    @elseif ($free->discount_percentage > 0)
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-muted text-decoration-line-through mb-1"
                                                style="font-size: 14px;">
                                                ${{ number_format($free->original_price, 2, '.', '') }}
                                            </span>
                                            <span class="badge text-primary py-3 rounded-pill fw-bolder"
                                                style="font-size: 1.2rem; padding: 0%">
                                                ${{ number_format($free->final_price, 2, '.', '') }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                            style="font-size: 1.2rem;">
                                            ${{ number_format($free->final_price, 2, '.', '') }}
                                        </span>
                                    @endif
                                </div>
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
                            <h5 class="card-title mt-3 text-muted">No free products available</h5>
                            <p class="text-muted">Please check back later for free mockups.</p>
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
            <div class="d-flex justify-content-center align-items-center mb-17">
                <!--begin::Title-->
                {{-- <h3 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                    More Mockup</h3> --}}
                <a href="{{ route('shop') }}" class="btn btn-view-custom">More Mockup <i
                        class="bi bi-arrow-right fs-4 ms-3"></i></a>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            {{-- <div class="row gy-10 mb-md-20">

                @forelse ($more_product as $more)
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <a href="{{ route('detail-product', ['params' => $more->slug]) }}"
                            class="card card-product border-0">

                            <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                <img src="{{ asset('public/product-thumbnail/' . $more->thumbnail) }}" loading="lazy"
                                    class="w-100 rounded-2" alt="{{ $more->judul_product }}">
                                @if ($more->diskon && $more->diskon->akhir_tanggal->isFuture())
                                    <span class="position-absolute top-0 end-0 m-2 badge rounded-md"
                                        style="background-color: #774CFB; font-weight: 600; font-size: 14px;">
                                        {{ $more->diskon->diskon_persen }}% Off
                                    </span>
                                @endif
                            </div>



                            <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                <div>
                                    <h5 class="card-title fw-bolder">{{ $more->judul_product }}</h5>
                                    <p class="text-muted small mb-2">{{ $more->kategori }}</p>
                                </div>

                                <div class="text-end">
                                    @if ($more->final_price == 0)
                                        <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                            style="background-color: transparent; font-size: 1.2rem;">
                                            Free
                                        </span>
                                    @elseif ($more->discount_percentage > 0)
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-muted text-decoration-line-through mb-1"
                                                style="font-size: 14px; font-style: italic">
                                                ${{ number_format($more->original_price, 2, '.', '') }}
                                            </span>
                                            <span class="badge text-primary py-3 rounded-pill fw-bolder"
                                                style="font-size: 1.2rem; padding: 0%">
                                                ${{ number_format($more->final_price, 2, '.', '') }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                            style="font-size: 1.2rem;">
                                            ${{ number_format($more->final_price, 2, '.', '') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </a>

                    </div>

                @empty
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-box-seam display-4 text-muted"></i>
                            <h5 class="card-title mt-3 text-muted">No products available</h5>
                            <p class="text-muted">Please check back later.</p>
                        </div>
                    </div>
                @endforelse

            </div> --}}
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
