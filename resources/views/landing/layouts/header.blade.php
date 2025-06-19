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
                <a href="{{ route('home') }}">
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
                        id="kt_landing_menu" data-kt-menu="true">
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
                        {{-- <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 {{ Request::is('about') ? 'active' : '' }}"
                                href="{{ route('about') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">About</a>
                            <!--end::Menu link-->
                        </div> --}}
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="bottom-start">
                            <!--begin::Menu link-->
                            <a href="#" class="menu-link py-3">
                                <span class="menu-title">About</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--end::Menu link-->

                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown p-3 w-200px" id="menu-sub">
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <a href="{{ route('about') }}#tutorial" class="menu-link px-3 py-3"
                                        id="link-tutorial">
                                        <span class="menu-title">Tutorial</span>
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ route('about') }}#faq" class="menu-link px-3 py-3" id="link-faq">
                                        <span class="menu-title">FAQ</span>
                                    </a>
                                </div>
                            </div>
                            <!--end::Menu sub-->

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const menuLinks = document.querySelectorAll("#menu-sub .menu-link");
                                    const currentPath = window.location.pathname;

                                    // Ganti ini jika route about kamu bukan '/about'
                                    const aboutPath = "{{ parse_url(route('about'), PHP_URL_PATH) }}";

                                    if (currentPath === aboutPath) {
                                        function setActiveLinkByHash() {
                                            const hash = window.location.hash;
                                            menuLinks.forEach(link => {
                                                link.classList.remove("active");
                                                if (link.getAttribute("href").includes(hash)) {
                                                    link.classList.add("active");
                                                }
                                            });
                                        }

                                        setActiveLinkByHash();

                                        menuLinks.forEach(link => {
                                            link.addEventListener("click", function() {
                                                setTimeout(() => {
                                                    setActiveLinkByHash();
                                                }, 10);
                                            });
                                        });

                                        window.addEventListener("hashchange", setActiveLinkByHash);
                                    }
                                });
                            </script>

                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        {{-- <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 {{ Request::is('faqs') ? 'active' : '' }}"
                                href="{{ route('faqs') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">FAQs</a>
                            <!--end::Menu link-->
                        </div> --}}
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item d-flex d-md-none d-lg-none">
                            <!--begin::Menu link-->
                            <a href="{{ route('shop') }}"
                                class="btn-shop-custom btn btn-primary fw-normal rounded-pill d-flex align-items-center"
                                style="font-size: 16px;">
                                Shop
                                <i class="bi bi-bag ms-2" style="font-size: 16px; margin-right: -5px"></i>
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
                    class="btn-shop-custom btn btn-primary fw-normal rounded-pill d-flex align-items-center"
                    style="font-size: 16px;">
                    Shop
                    <i class="bi bi-bag ms-2" style="font-size: 16px; margin-right: -5px"></i>
                </a>
            </div>

            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
