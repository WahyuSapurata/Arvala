@extends('landing.layouts.layout')
@section('content')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 mt-5">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row gy-10 mb-md-20">
                <div class="col-12 col-lg-8">
                    <div class="row gap-sm-5 gap-md-0 gap-3 gap-lg-5">
                        @php
                            $imageProducts = json_decode($data->image_product, true);
                        @endphp

                        @if ($imageProducts && is_array($imageProducts))
                            @foreach ($imageProducts as $image)
                                <div class="col-12 col-md-6 col-lg-12 card-product">
                                    <!--begin::Image-->
                                    <div class="position-relative overflow-hidden text-center bg-transparent"
                                        style="border-radius: 32px">
                                        <img src="{{ asset('public/product-detail/' . $image) }}" loading="lazy"
                                            class="w-100" alt="">
                                    </div>
                                    <!--end::Image-->
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4 position-sticky h-100" style="top: 80px;">
                    <div class="p-10 mb-3" style="background-color: #F2F47; border-radius: 32px">
                        <h2 class="text-dark" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                            {{ $data->judul_product }}</h2>
                        <div class="fs-lg-6">
                            @php
                                $main_description_text = null;
                                $bundle_link = null;
                                $is_external_link = false;

                                if ($data->original_price == 0) {
                                    $full_text = strip_tags($data->deskripsi);
                                    $full_text = html_entity_decode($full_text);
                                    $full_text = str_replace(['&nbsp;', "\xC2\xA0"], ' ', $full_text);
                                    $full_text = trim($full_text);

                                    $last_space_pos = strrpos($full_text, ' ');
                                    $last_word = null;
                                    $potential_description = null;

                                    if ($last_space_pos !== false) {
                                        $potential_description = substr($full_text, 0, $last_space_pos);
                                        $last_word = substr($full_text, $last_space_pos + 1);
                                    } else {
                                        $potential_description = null;
                                        $last_word = $full_text;
                                    }

                                    $is_http_link =
                                        strpos($last_word, 'http://') === 0 || strpos($last_word, 'https://') === 0;

                                    if ($is_http_link) {
                                        $main_description_text = $potential_description;
                                        $bundle_link = $last_word;
                                        $is_external_link = true;
                                    } else {
                                        $main_description_text = $full_text;
                                        $bundle_link = null;
                                    }
                                }
                            @endphp

                            @if ($data->original_price == 0)
                                @if ($main_description_text)
                                    <p>{!! nl2br(e($main_description_text)) !!}</p>
                                @endif

                                @if ($bundle_link)
                                    <a href="{{ $bundle_link }}" class="text-primary fw-bolder mt-2"
                                        @if ($is_external_link) target="_blank" @endif
                                        style="text-decoration: underline;">
                                        Lihat Bundle
                                    </a>
                                @endif
                            @else
                                {!! $data->deskripsi !!}
                            @endif
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            @if ($data->has_discount)
                                <div class="d-flex flex-row align-items-center gap-2">
                                    <span class="text-muted text-decoration-line-through mb-1"
                                        style="font-size: 14px; font-style: italic">
                                        ${{ number_format($data->original_price, 2, '.', '') }}
                                    </span>
                                    <span class="badge text-primary py-3 rounded-pill fw-bolder"
                                        style="font-size: 1.2rem; padding: 0%">
                                        ${{ number_format($data->final_price, 2, '.', '') }}
                                    </span>
                                </div>
                            @endif
                            <a href="{{ $data->link }}" target="_blank" class="btn btn-primary rounded-pill fw-bolder"
                                style="border: 2px solid transparent; transition: all 0.3s ease;"
                                onmouseover="this.style.color='#794FFC'; this.style.borderColor='#794FFC'; this.style.backgroundColor='white';"
                                onmouseout="this.style.color='white'; this.style.borderColor='transparent'; this.style.backgroundColor='#794FFC';">
                                @if ($data->original_price == 0)
                                    Get Free
                                @else
                                    Buy Now
                                @endif
                            </a>
                        </div>
                    </div>
                    @if (strtolower($data->kategori->nama_kategori ?? '') === 'bundle')
                        <div class="p-10 mb-8" style="background-color: #F2F4F7; border-radius: 32px">
                            <div class="fs-lg-6 fw-bold mb-4">
                                Download All These Bundles for <span class="text-primary">Free Now!</span>
                            </div>
                            <div class="d-flex flex-wrap">
                                @if (isset($free_products) && $free_products->count() > 0)
                                    @foreach ($free_products as $free)
                                        <a href="{{ route('detail-product', ['params' => $free->slug]) }}"
                                            class="text-decoration-none w-50 px-2 mb-3">
                                            <div style="border-radius: 12px; overflow: hidden; width: 100%; height: 120px;">
                                                <img src="{{ asset('public/product-thumbnail/' . $free->thumbnail) }}"
                                                    alt="{{ $free->judul_product }}" class="w-100 h-100 object-fit-cover"
                                                    style="border: 1px solid #eee">
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="text-muted w-100 text-center py-3">
                                        No free products available at the moment.
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
