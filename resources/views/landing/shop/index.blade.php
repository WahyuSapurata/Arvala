@extends('landing.layouts.layout')
@section('bg-hero')
    <div class="container">
        <div class="py-10 d-grid text-center gap-1 gap-md-5" style="justify-items: center;">
            <h5 data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000"
                class="text-dark m-0 p-4 py-2 rounded-pill fw-bolder border border-dark" id="how-it-works"
                data-kt-scroll-offset="{default: 100, lg: 150}" style="max-width: max-content">
                Mockup Shop</h5>
            <h1 data-aos="fade-down" data-aos-delay="400" data-aos-duration="1000" class="fw-bolder fs-4x fs-lg-5x"
                style="color: #313131">Masterpiece Mockups
                <br> For Your
                <span style="color: #8057FC; font-family: Mr Dafoe, sans-serif; font-weight: 400">
                    <span id="kt_landing_hero_text">Ideas</span>
                </span>
            </h1>
            <h3 data-aos="fade-down" data-aos-delay="600" data-aos-duration="1000" class="fw-normal my-md-5"
                style="color: #535353">
                Explore a curated collection of premium <br> mockups designed to bring your ideas to life.
            </h3>
            <!--end::Input group=-->
            <div class="fv-row mb-8 w-250px w-lg-350px mt-4" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
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

            {{-- Bagian Navigasi Kategori (inline style dihapus) --}}
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Bagian Kiri: Tulisan "Realise" -->
                    <h4 class="fw-bolder m-0 d-none d-lg-block" style="color: #313131;">Release</h4>

                    <!-- Bagian Kanan: Navigasi Kategori -->
                    <div class="d-flex justify-content-center justify-content-lg-end flex-grow-1">
                        <ul class="nav nav-pills nav-pills-custom gap-3">

                            <!-- Tombol All - Diubah menjadi link navigasi biasa -->
                            <li class="nav-item m-0">
                                <a class="nav-link btn btn-outline-custom {{ $active_tab_id === 'all' ? 'active' : '' }}"
                                    data-bs-toggle="tab" href="#kt_vtab_pane_all">All</a>
                            </li>

                            <!-- Tombol Bundle -->
                            @if ($bundleCategory)
                                <li class="nav-item m-0">
                                    <a class="nav-link btn btn-outline-custom {{ $active_tab_id === $bundleCategory->uuid ? 'active' : '' }}"
                                        data-bs-toggle="tab"
                                        href="#kt_vtab_pane_{{ $bundleCategory->uuid }}">{{ $bundleCategory->nama_kategori }}</a>
                                </li>
                            @endif

                            <!-- Tombol Free -->
                            @if ($freeCategory)
                                <li class="nav-item m-0">
                                    <a class="nav-link btn btn-outline-custom {{ $active_tab_id === $freeCategory->uuid ? 'active' : '' }}"
                                        data-bs-toggle="tab"
                                        href="#kt_vtab_pane_{{ $freeCategory->uuid }}">{{ $freeCategory->nama_kategori }}</a>
                                </li>
                            @endif

                            <!-- Dropdown untuk Sisa Kategori -->
                            @if ($dropdownCategories->isNotEmpty())
                                <li class="nav-item dropdown m-0">
                                    <a class="nav-link btn btn-outline-custom dropdown-toggle {{ $isDropdownActive ? 'active' : '' }}"
                                        data-bs-toggle="dropdown" href="#" role="button"
                                        aria-expanded="false">Category</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($dropdownCategories as $kategori)
                                            <li>
                                                <a class="dropdown-item {{ $active_tab_id === $kategori->uuid ? 'active' : '' }}"
                                                    data-bs-toggle="tab"
                                                    href="#kt_vtab_pane_{{ $kategori->uuid }}">{{ $kategori->nama_kategori }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Bagian Konten Produk (Tidak ada perubahan di sini) --}}
            <div class="tab-content mt-20" id="myTabContent">
                <!-- Tab Pane for All Products -->
                <div class="tab-pane fade {{ $active_tab_id === 'all' ? 'show active' : '' }}" id="kt_vtab_pane_all"
                    role="tabpanel">
                    <div class="row gy-10">
                        @forelse ($product as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <a href="{{ route('detail-product', ['params' => $item->slug]) }}"
                                    class="card card-product border-0">
                                    <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                        <img src="{{ asset('public/product-thumbnail/' . $item->thumbnail) }}"
                                            loading="lazy" class="w-100 rounded-2" alt="{{ $item->judul_product }}">
                                        @if ($item->diskon && $item->diskon->akhir_tanggal->isFuture())
                                            <span class="position-absolute top-0 end-0 m-2 badge rounded-md"
                                                style="background-color: #774CFB; font-weight: 600; font-size: 14px;">
                                                {{ $item->diskon->diskon_persen }}% Off
                                            </span>
                                        @endif
                                    </div>
                                    <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                        <div>
                                            <h5 class="card-title fw-bolder">{{ $item->judul_product }}</h5>
                                            <p class="text-muted small mb-2">{{ $item->kategori }}</p>
                                        </div>
                                        <div class="text-end">
                                            @if ($item->final_price == 0)
                                                <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                                    style="background-color: transparent; font-size: 1.2rem;">
                                                    Free
                                                </span>
                                            @elseif ($item->discount_percentage > 0)
                                                <div class="d-flex flex-column align-items-end">
                                                    <span class="text-muted text-decoration-line-through mb-1"
                                                        style="font-size: 14px; font-style: italic">
                                                        ${{ number_format($item->original_price, 2, '.', '') }}
                                                    </span>
                                                    <span class="badge text-primary py-3 rounded-pill fw-bolder"
                                                        style="font-size: 1.2rem; padding: 0%">
                                                        ${{ number_format($item->final_price, 2, '.', '') }}
                                                    </span>
                                                </div>
                                            @else
                                                <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                                    style="font-size: 1.2rem;">
                                                    ${{ number_format($item->final_price, 2, '.', '') }}
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
                                    <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                    <p class="text-muted">Silakan tambahkan data terlebih dahulu.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if ($product->hasPages())
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mt-10">
                                {{-- Pagination Links --}}
                                @if ($product->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">«</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}"
                                            rel="prev">«</a></li>
                                @endif
                                @foreach ($product->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $product->currentPage())
                                                <li class="page-item active"><span
                                                        class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                @if ($product->hasitemPages())
                                    <li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}"
                                            rel="next">»</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">»</span></li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>

                <!-- Tab Panes for Each Category -->
                @foreach ($data_kategori as $kategori)
                    <div class="tab-pane fade {{ $active_tab_id === $kategori->uuid ? 'show active' : '' }}"
                        id="kt_vtab_pane_{{ $kategori->uuid }}" role="tabpanel">
                        <div class="row gy-10">
                            @php
                                $productsInCategory = $productByCategory[$kategori->uuid] ?? collect([]);
                            @endphp
                            @forelse ($productsInCategory as $item)
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <a href="{{ route('detail-product', ['params' => $item->slug]) }}"
                                        class="card card-product border-0">
                                        <div class="position-relative overflow-hidden text-center bg-light rounded-3">
                                            <img src="{{ asset('public/product-thumbnail/' . $item->thumbnail) }}"
                                                loading="lazy" class="w-100 rounded-2" alt="{{ $item->judul_product }}">
                                            @if ($item->diskon && $item->diskon->akhir_tanggal->isFuture())
                                                <span class="position-absolute top-0 end-0 m-2 badge rounded-md"
                                                    style="background-color: #774CFB; font-weight: 600; font-size: 14px;">
                                                    {{ $item->diskon->diskon_persen }}% Off
                                                </span>
                                            @endif
                                        </div>
                                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                            <div>
                                                <h5 class="card-title fw-bolder">{{ $item->judul_product }}</h5>
                                                <p class="text-muted small mb-2">{{ $item->nama_kategori }}</p>
                                            </div>
                                            <div class="text-end">
                                                @if ($item->final_price == 0)
                                                    <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                                        style="background-color: transparent; font-size: 1.2rem;">
                                                        Free
                                                    </span>
                                                @elseif ($item->discount_percentage > 0)
                                                    <div class="d-flex flex-column align-items-end">
                                                        <span class="text-muted text-decoration-line-through mb-1"
                                                            style="font-size: 14px; font-style: italic">
                                                            ${{ number_format($item->original_price, 2, '.', '') }}
                                                        </span>
                                                        <span class="badge text-primary py-3 rounded-pill fw-bolder"
                                                            style="font-size: 1.2rem; padding: 0%">
                                                            ${{ number_format($item->final_price, 2, '.', '') }}
                                                        </span>
                                                    </div>
                                                @else
                                                    <span class="badge text-primary px-4 py-3 rounded-pill fw-bolder"
                                                        style="font-size: 1.2rem;">
                                                        ${{ number_format($item->final_price, 2, '.', '') }}
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
                                        <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                        <p class="text-muted">Silakan tambahkan data terlebih dahulu.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--end::How It Works Section-->
    <!-- ... sisa konten halaman ... -->
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
