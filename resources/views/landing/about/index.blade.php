@extends('landing.layouts.layout')
@section('content')
    <div class="container">
        <div class="w-100 py-10 position-relative">
            <img src="{{ asset('about1.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;" alt="">
            <div class="fs-3x fs-md-5x fw-bolder position-absolute" style="bottom: 20px; left: 20px;">5K RENDERING</div>
        </div>
        <div class="w-100 py-10 position-relative">
            <img src="{{ asset('about2.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;" alt="">
            <div class="fs-3x fs-md-5x fw-bolder position-absolute" style="bottom: 20px; left: 20px;">TEXTURING</div>
        </div>
        <div class="w-100 py-10 position-relative">
            <img src="{{ asset('about3.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;" alt="">
            <div class="fs-3x fs-md-5x fw-bolder position-absolute" style="bottom: 20px; left: 20px;">LAYERING</div>
        </div>
    </div>
    <!--end::Highlight-->
    <div class="my-20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-2 px-2">
                    <div class="w-100 position-relative d-flex justify-content-center align-items-center">
                        <img src="{{ asset('about4.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;"
                            alt="">
                        <div class="fs-3 fs-md-2x text-white fw-bolder position-absolute">
                            Apparel
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2 px-2">
                    <div class="w-100 position-relative d-flex justify-content-center align-items-center">
                        <img src="{{ asset('about5.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;"
                            alt="">
                        <div class="fs-3 fs-md-2x text-white fw-bolder position-absolute">
                            Advertising
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2 px-2">
                    <div class="w-100 position-relative d-flex justify-content-center align-items-center">
                        <img src="{{ asset('about6.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;"
                            alt="">
                        <div class="fs-3 fs-md-2x text-white fw-bolder position-absolute">
                            Device
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2 px-2">
                    <div class="w-100 position-relative d-flex justify-content-center align-items-center">
                        <img src="{{ asset('about7.png') }}" class="w-100" loading="lazy" style="border-radius: 20px;"
                            alt="">
                        <div class="fs-3 fs-md-2x text-white fw-bolder position-absolute">
                            Merchandise
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Highlight-->
    <!--end::Highlight-->
    <div class="position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <div class="d-grid text-center gap-1 gap-md-5" style="justify-items: center;">
                <h1 class="fw-bolder fs-1 fs-lg-3qx" style="color: #313131">Discover the Perfect
                    <br> Mockups for Your Projects.
                </h1>
                <h3 class="fw-normal my-md-5" style="color: #535353">
                    Sign up for exclusive free and premium mockups <br> to elevate your work.
                </h3>
                <!--end::Input group=-->
                <div class="fv-row mb-8 w-250px w-lg-350px mt-4">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Input wrapper-->
                        <form action="{{ route('shop') }}" method="GET">
                            <div class="position-relative mb-3">
                                <div class="position-relative">
                                    <input placeholder="Enter Your Email" type="email"
                                        class="form-control rounded-pill bg-light" />
                                    <button type="submit"
                                        class="btn btn-sm btn-dark text-white rounded-pill fw-bolder position-absolute top-50 end-0"
                                        style="transform: translate(-3%, -48%);">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Input group=-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Highlight-->
@endsection
