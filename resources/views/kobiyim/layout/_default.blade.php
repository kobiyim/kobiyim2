@extends('kobiyim.layout.master')

@section('content')

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('kobiyim/layout/partials/sidebar-layout/_header')
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('kobiyim/layout/partials/sidebar-layout/_sidebar')
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        @include('kobiyim/layout/partials/sidebar-layout/_toolbar')
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                {{ $slot }}
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    @include('kobiyim/layout/partials/sidebar-layout/_footer')
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    @include('kobiyim/partials/_drawers')

    @include('kobiyim/partials/_modals')

    @include('kobiyim/partials/_scrolltop')

@endsection
