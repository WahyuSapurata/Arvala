<!--begin::Header-->
<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-center justify-content-between">
            <!--begin::Logo-->
            <div class="d-flex align-items-center w-100 w-lg-auto justify-content-between">
                <!--begin::Logo image-->
                <a href="#">
                    <div class="d-flex">
                        <img alt="Logo" src="{{ asset('logo_arvala.png') }}" class="logo-default h-20px h-lg-35px" />
                    </div>
                    <div class="d-flex">
                        <img alt="Logo" src="{{ asset('logo_arvala.png') }}" class="logo-sticky h-20px h-lg-35px" />
                    </div>
                </a>
                <!--end::Logo image-->
                <!--begin::Mobile menu toggle-->
                <button class="btn btn-icon btn-active-color-primary d-flex d-lg-none" id="kt_landing_menu_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2hx">
                        <img src="{{ asset('button-mobile.svg') }}" alt="">
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Mobile menu toggle-->
            </div>
            <!--end::Logo-->
            <!--begin::Menu wrapper-->
            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                    <!--begin::Menu-->
                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush gap-3 fs-5 fw-semibold"
                        id="kt_landing_menu">
                        <!--begin::Menu item-->
                        <div class="menu-item d-flex d-lg-none">
                            <!--begin::Menu link-->
                            <div class="d-flex">
                                <img alt="Logo" src="{{ asset('logo_arvala.png') }}" class="h-20px" />
                            </div>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 {{ request()->routeIs('home') ? 'active' : '' }}"
                                href="{{ route('home') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Home</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        {{-- <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 {{ Request::is('shop') ? 'active' : '' }}"
                                href="{{ route('shop') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Shop</a>
                            <!--end::Menu link-->
                        </div> --}}
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 {{ Request::is('about') ? 'active' : '' }}"
                                href="{{ route('about') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">About</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 {{ Request::is('faqs') ? 'active' : '' }}"
                                href="{{ route('faqs') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">FAQs</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item d-flex d-md-none d-lg-none">
                            <!--begin::Menu link-->
                            <a href="{{ route('shop') }}" class="btn-shop-custom btn btn-primary rounded-pill"
                                style="font-size: 16px; font-weight: 500;">
                                Shop <i class="bi bi-bag ms-2 p-2 bg-white text-dark rounded-circle"
                                    style="font-size: 16px; margin-right: -10px"></i>
                            </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Toolbar-->
            <div class="d-none d-md-flex justify-content-end align-items-center">
                <a href="{{ route('shop') }}"
                    class="btn-shop-custom btn btn-primary fw-bolder rounded-pill d-flex align-items-center"
                    style="font-size: 16px; font-weight: 500;">
                    Shop
                    <i class="bi bi-bag ms-2 p-2 bg-white text-dark rounded-circle"
                        style="font-size: 16px; margin-right: -10px"></i>
                </a>
            </div>

            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
