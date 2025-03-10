@extends('landing.layouts.layout')
@section('bg-hero')
    <div class="container">
        <div class="py-10 d-grid text-center gap-1 gap-md-5" style="justify-items: center;">
            <h5 class="text-dark m-0 p-4 py-2 rounded-pill fw-bolder border border-dark" id="how-it-works"
                data-kt-scroll-offset="{default: 100, lg: 150}" style="max-width: max-content">
                Mockup Shop</h5>
            <h1 class="fw-bolder fs-4x fs-lg-5x" style="color: #313131">Masterpiece Mockups
                <br> For Your
                <span style="color: #8057FC; font-family: Mr Dafoe, sans-serif; font-weight: 400">
                    <span id="kt_landing_hero_text">Ideas</span>
                </span>
            </h1>
            <h3 class="fw-normal my-md-5" style="color: #535353">
                Explore a curated collection of premium <br> mockups designed to bring your ideas to life.
            </h3>
            <!--end::Input group=-->
            <div class="fv-row mb-8 w-250px w-lg-350px mt-4">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <form action="{{ route('shop') }}" method="GET">
                        <div class="position-relative mb-3">
                            <div class="position-relative">
                                <input placeholder="Search Resources..." name="search" autocomplete="off"
                                    class="form-control rounded-pill bg-light" value="{{ request('search') }}" />
                                <button type="submit"
                                    class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2">
                                    <i class="bi bi-search fs-2"></i>
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
@endsection
@section('content')
    <!--begin::How It Works Section-->
    <div class="z-index-2 mb-5 mb-md-20 mt-20">
        <!--begin::Container-->
        <div class="container" id="product-shop">
            <div class="mb-5">
                <div class="d-grid justify-content-center">
                    <ul style="height: 55px; overflow: hidden; overflow-x: auto;"
                        class="nav nav-tabs nav-pills border-0 flex-nowrap text-nowrap gap-3 nav-scroll-wrapper w-100">
                        <li class="nav-item m-0 btn-outline-custom">
                            <a class="nav-link active btn" data-bs-toggle="tab" href="#kt_vtab_pane_all">All</a>
                        </li>

                        @foreach ($data_kategori as $kategori)
                            <li class="nav-item m-0 btn-outline-custom">
                                <a class="nav-link btn" data-bs-toggle="tab"
                                    href="#kt_vtab_pane_{{ $kategori->uuid }}">{{ $kategori->nama_kategori }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content mt-20" id="myTabContent">
                <!-- Tab Pane for All Products -->
                <div class="tab-pane fade show active" id="kt_vtab_pane_all" role="tabpanel">
                    <div class="row gy-10">
                        @forelse ($product as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <a href="{{ route('detail-product', ['params' => $item->slug]) }}"
                                    class="card card-product border-0">
                                    <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                        <img src="{{ asset('public/product-thumbnail/' . $item->thumbnail) }}"
                                            loading="lazy" class="w-100 rounded-2" alt="{{ $item->judul_product }}">
                                    </div>
                                    <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                        <div>
                                            <h5 class="card-title fw-bolder">{{ $item->judul_product }}</h5>
                                            <p class="text-muted small mb-2">{{ $item->kategori }}</p>
                                        </div>
                                        <span class="badge text-dark px-4 py-3 rounded-pill fw-bolder"
                                            style="background-color: #F9FAFB">{{ $item->price }}</span>
                                    </div>
                                </a>
                            </div>
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
                </div>

                <!-- Tab Panes for Each Category -->
                @foreach ($data_kategori as $kategori)
                    <div class="tab-pane fade" id="kt_vtab_pane_{{ $kategori->uuid }}" role="tabpanel">
                        <div class="row gy-10">
                            @php
                                $productsInCategory = $product->where('uuid_kategori', $kategori->uuid);
                            @endphp

                            @forelse ($productsInCategory as $item)
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <a href="{{ route('detail-product', ['params' => $item->slug]) }}"
                                        class="card card-product border-0">
                                        <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                            <img src="{{ asset('public/product-thumbnail/' . $item->thumbnail) }}"
                                                loading="lazy" class="w-100 rounded-2" alt="{{ $item->judul_product }}">
                                        </div>
                                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                            <div>
                                                <h5 class="card-title fw-bolder">{{ $item->judul_product }}</h5>
                                                <p class="text-muted small mb-2">{{ $kategori->nama_kategori }}</p>
                                            </div>
                                            <span class="badge text-dark px-4 py-3 rounded-pill fw-bolder"
                                                style="background-color: #F9FAFB">{{ $item->price }}</span>
                                        </div>
                                    </a>
                                </div>
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
                    </div>
                @endforeach

                @if ($product->hasPages())
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-10">
                            {{-- Previous Page Link --}}
                            @if ($product->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">«</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}"
                                        rel="prev">«</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($product->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                    </li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $product->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($product->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}"
                                        rel="next">»</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">»</span></li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
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
    <div class="mb-10 z-index-2">
        <div class="container">
            <!--begin::Heading-->
            <div class="d-flex justify-content-center mb-17">
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
@section('script')
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchValue = document.querySelector('input[name="search"]').value;
            window.location.href = `{{ route('shop') }}?search=${encodeURIComponent(searchValue)}&#product-shop`;
        });
    </script>
@endsection
