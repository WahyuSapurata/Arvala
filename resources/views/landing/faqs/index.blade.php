@extends('landing.layouts.layout')
@section('bg-hero')
    <div class="container">
        <div class="py-10 d-grid text-center gap-1 gap-md-5" style="justify-items: center;">
            <h5 class="text-dark m-0 p-4 py-2 rounded-pill fw-bolder border border-dark" id="how-it-works"
                data-kt-scroll-offset="{default: 100, lg: 150}" style="max-width: max-content">
                Get in touch</h5>
            <h1 class="fw-bolder fs-4x fs-lg-5x" style="color: #313131">How can we help?
            </h1>
            <h3 class="fw-normal my-md-5" style="color: #535353">
                If you have any questions, reach out to our team for help
            </h3>
            <!--end::Input group=-->
        </div>
    </div>
@endsection
@section('content')
    <div class="my-10 z-index-2">
        <div class="container">
            <!--begin::Heading-->
            <div class="d-flex justify-content-start mb-8 mb-md-17">
                <!--begin::Title-->
                <h3 class="text-dark fs-2qx fs-md-3x fs-lg-4x" id="how-it-works"
                    data-kt-scroll-offset="{default: 100, lg: 150}">
                    Contact us</h3>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <form action="#">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!--begin::Input group-->
                        <div class="input-group input-group-solid mb-5">
                            <input type="text" class="form-control py-3 py-md-5" placeholder="Full name"
                                aria-label="Full name" aria-describedby="basic-addon1" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-12 col-md-6">
                        <!--begin::Input group-->
                        <div class="input-group input-group-solid mb-5">
                            <input type="email" class="form-control py-3 py-md-5" placeholder="Email" aria-label="Email"
                                aria-describedby="basic-addon1" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-12">
                        <!--begin::Input group-->
                        <div class="input-group input-group-solid mb-5">
                            <textarea class="form-control py-3 py-md-5" placeholder="Message" aria-label="With textarea" rows="7"></textarea>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary py-3 py-md-5 fs-5 fs-md-3 fw-bolder w-100">
                            Send message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-10 mt-8 mt-md-20 z-index-2">
        <div class="container">
            <!--begin::Heading-->
            <div class="d-flex justify-content-center mb-8 mb-md-17">
                <!--begin::Title-->
                <h3 class="text-dark fs-2qx fs-md-3x fs-lg-4x" id="how-it-works"
                    data-kt-scroll-offset="{default: 100, lg: 150}">
                    Frequently asked</h3>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Accordion-->
            <div class="accordion d-grid gap-5" id="kt_accordion_1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_1">
                        <button class="accordion-button fs-md-3  fw-bolder text-gray-600" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                            aria-controls="kt_accordion_1_body_1">
                            Which tools do I need to use the library?
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                        aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body fs-md-5 text-gray-700">
                            You will need basic knowledge of Framer to be able to use the template What is Framer? Framer is
                            a web-based platform to quickly build world-class websites and web projects.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_2">
                        <button class="accordion-button fs-md-3  fw-bolder text-gray-600 collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false"
                            aria-controls="kt_accordion_1_body_2">
                            Is this a one time payment?
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_2" class="accordion-collapse collapse"
                        aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body fs-md-5 text-gray-700">
                            Yes. You pay only once to access the template forever.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_3">
                        <button class="accordion-button fs-md-3  fw-bolder text-gray-600 collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false"
                            aria-controls="kt_accordion_1_body_3">
                            Do you offer student / teacher discounts?
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_3" class="accordion-collapse collapse"
                        aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body fs-md-5 text-gray-700">
                            Absolutely! If you’re a student or a teacher, reach out to us with a document proof of your
                            student/teacher status for a 50% discount.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_4">
                        <button class="accordion-button fs-md-3  fw-bolder text-gray-600 collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_4" aria-expanded="false"
                            aria-controls="kt_accordion_1_body_4">
                            Which payment methods are accepted?
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_4" class="accordion-collapse collapse"
                        aria-labelledby="kt_accordion_1_header_4" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body fs-md-5 text-gray-700">
                            We use Lemon Squeezy as our payment processor with a wide variety of accepted payments such:
                            <br><br>
                            Cards (including Mastercard, Visa, Maestro, American Express, Discover, Diners Club, JCB, <br>
                            UnionPay, and Mada)<br>
                            PayPal<br>
                            iDEAL*<br>
                            Google Pay (Chrome only)<br>
                            Apple Pay
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_5">
                        <button class="accordion-button fs-md-3  fw-bolder text-gray-600 collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_5" aria-expanded="false"
                            aria-controls="kt_accordion_1_body_5">
                            I have a problem
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_5" class="accordion-collapse collapse"
                        aria-labelledby="kt_accordion_1_header_5" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body fs-md-5 text-gray-700">
                            Reach out to us and one of our support staff will help you with any issues or questions you
                            have.
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Accordion-->
        </div>
    </div>
@endsection
