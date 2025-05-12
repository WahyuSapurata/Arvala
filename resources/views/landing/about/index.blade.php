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
                <div class="col-12 mb-10 d-flex justify-content-center">
                    <a href="#" class="btn btn-dark fw-bolder rounded-pill">Explore All mockup</a>
                </div>
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
    <div id="tutorial">
        <div class="position-relative z-index-2 tutorial">
            <!--begin::Container-->
            <div class="container">
                <div class="d-grid text-center gap-1 gap-md-5" style="justify-items: center;">
                    <h1 class="fw-bolder fs-1 fs-lg-3qx" style="color: #313131">Showcase Your Design Like a Pro
                    </h1>
                    <h3 class="fw-normal my-md-5" style="color: #535353">
                        Elevate your presentation with high-quality mockups — perfect for branding, <br> portfolio, or
                        client
                        projects. <b>Watch the tutorial here</b>
                    </h3>
                    <div class="position-relative mb-3 w-100 mt-5">
                        <!--begin::Youtube-->
                        <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center rounded position-relative h-md-550px h-200px"
                            style="background-image:url(https://i.ytimg.com/vi/7w-kxDBl2rQ/hq720.jpg?sqp=-oaymwEnCNAFEJQDSFryq4qpAxkIARUAAIhCGAHYAQHiAQoIGBACGAY4AUAB&rs=AOn4CLDg1uK7ZmI_UaSAVC7hKNQ78osczQ); width: 100%;"
                            data-fslightbox="lightbox-youtube"
                            href="https://www.youtube.com/embed/7w-kxDBl2rQ?si=7sGrisrm3kaGIT-t">
                            <!--begin::Icon-->
                            <img src="{{ asset('assets/media/svg/misc/video-play.svg') }}"
                                class="position-absolute top-50 start-50 translate-middle" alt="" />
                            <!--end::Icon-->
                        </a>
                        <!--end::Youtube-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Highlight-->
    <!--end::Highlight-->
    <div id="faq">
        <div class="position-relative z-index-2 faq">
            <!--begin::Container-->
            <div class="container">
                <div class="d-grid text-center gap-1 gap-md-5" style="justify-items: center;">
                    <h1 class="fw-bolder fs-1 fs-lg-3qx" style="color: #313131">Mockup Product FAQ
                    </h1>
                    <h3 class="fw-normal my-md-5" style="color: #535353">
                        Everything you need to know about our mockup files — <br> from supported formats, usage guidelines,
                        and
                        editing <br> tutorials, to common troubleshooting.
                    </h3>
                </div>
                <div class="row mt-5 gap-5">
                    <!--begin::Accordion-->
                    <div class="col-12 col-md-6">
                        <div class="accordion d-grid gap-5" id="kt_accordion_1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                    <button class="accordion-button fs-md-3  fw-bolder" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1"
                                        aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                        In what format is this mockup available?
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                    aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Our mockup is provided in PSD (Photoshop) file format,
                                        featuring fully editable layers. You can easily insert your own
                                        design into the mockup using Adobe Photoshop software.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2"
                                        aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                        Are these mockups royalty-free?
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_2" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Yes, all of our mockups are royalty-free. You may use them for both personal and
                                        commercial projects without any additional fees after your purchase (in accordance
                                        with
                                        the license agreement).
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_3">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3"
                                        aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                        Am I allowed to sell designs created using this mockup?
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_3" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Yes, you may sell final designs created with our mockups, provided the original PSD
                                        source files are not included or resold (subject to license agreement).
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_4">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_4"
                                        aria-expanded="false" aria-controls="kt_accordion_1_body_4">
                                        Can this mockup be used multiple times?
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_4" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_1_header_4" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Yes, once purchased, you can use our mockups repeatedly without any limitations
                                        regarding duration or number of projects (in accordance with the license agreement).
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_5">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_5"
                                        aria-expanded="false" aria-controls="kt_accordion_1_body_5">
                                        What if I want to use this mockup for mass production or resale products?
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_5" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_1_header_5" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        For large-scale usage or products intended for mass production and widespread
                                        resale,
                                        please contact us for further details.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Accordion-->
                    </div>
                    <div class="col-12 col-md-6">
                        <!--begin::Accordion-->
                        <div class="accordion d-grid gap-5" id="kt_accordion_2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_2_header_6">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_body_6"
                                        aria-expanded="false" aria-controls="kt_accordion_2_body_6">
                                        Do you provide any guides or tutorials on how to use this mockup?
                                    </button>
                                </h2>
                                <div id="kt_accordion_2_body_6" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_2_header_6" data-bs-parent="#kt_accordion_2">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Yes, we provide a short usage guide in PDF format, or you can view it here.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_2_header_7">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_body_7"
                                        aria-expanded="false" aria-controls="kt_accordion_2_body_7">
                                        What if I experience technical difficulties or have additional questions?
                                    </button>
                                </h2>
                                <div id="kt_accordion_2_body_7" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_2_header_7" data-bs-parent="#kt_accordion_2">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Please reach out to our support team via email or through the provided contact
                                        information. We are ready to help resolve any issues or answer your questions
                                        promptly.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_2_header_8">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_body_8"
                                        aria-expanded="false" aria-controls="kt_accordion_2_body_8">
                                        Is this mockup compatible with software other than Adobe Photoshop?
                                    </button>
                                </h2>
                                <div id="kt_accordion_2_body_8" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_2_header_8" data-bs-parent="#kt_accordion_2">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Currently, our mockups are exclusively made for Adobe Photoshop to ensure optimal
                                        quality and ease of use. We do not guarantee compatibility with other software.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_2_header_9">
                                    <button class="accordion-button fs-md-3  fw-bolder collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_body_9"
                                        aria-expanded="false" aria-controls="kt_accordion_2_body_9">
                                        Can I receive a refund if the mockup does not meet my expectations?
                                    </button>
                                </h2>
                                <div id="kt_accordion_2_body_9" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_2_header_9" data-bs-parent="#kt_accordion_2">
                                    <div class="accordion-body fs-md-5 pt-0 pt-md-6">
                                        Due to the digital nature of the product, refunds are generally not provided unless
                                        there are significant issues within the files we have provided. Please carefully
                                        review
                                        the product information before purchasing. If you encounter technical difficulties,
                                        we
                                        will gladly assist you to resolve the issue.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Accordion-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Highlight-->
    <!--end::Highlight-->
    <div class="position-relative z-index-2 mt-20">
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
                        <form action="" method="GET">
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
