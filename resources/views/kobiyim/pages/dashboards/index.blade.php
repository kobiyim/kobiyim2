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

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                                        @include('kobiyim/partials/widgets/cards/_widget-20')

                                        @include('kobiyim/partials/widgets/cards/_widget-7')
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                                        @include('kobiyim/partials/widgets/cards/_widget-17')

                                        @include('kobiyim/partials/widgets/lists/_widget-26')
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xxl-6">
                                        @include('kobiyim/partials/widgets/engage/_widget-10')
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row gx-5 gx-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xxl-6 mb-5 mb-xl-10">
                                        @include('kobiyim/partials/widgets/charts/_widget-8')
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6 mb-5 mb-xl-10">
                                        @include('kobiyim/partials/widgets/tables/_widget-16')
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xxl-6">
                                        @include('kobiyim/partials/widgets/cards/_widget-18')
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6">
                                        @include('kobiyim/partials/widgets/charts/_widget-36')
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        @include('kobiyim/partials/widgets/charts/_widget-35')
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8">
                                        @include('kobiyim/partials/widgets/tables/_widget-14')
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row gx-5 gx-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        @include('kobiyim/partials/widgets/charts/_widget-31')
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8">
                                        @include('kobiyim/partials/widgets/charts/_widget-24')
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
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