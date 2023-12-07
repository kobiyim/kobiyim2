@extends('kobiyim.layout.master')

@section('content')

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center text-center p-10">
                <!--begin::Card-->
                <div class="card card-flush w-lg-650px py-5">
                    <!--begin::Card body-->
                    <div class="card-body py-15 py-lg-20">

                        <!--begin::Page bg image-->
                        <style>
                            body {
                                background-image: url('{{ image('auth/bg7.jpg') }}');
                            }

                            [data-bs-theme="dark"] body {
                                background-image: url('{{ image('auth/bg7-dark.jpg') }}');
                            }
                        </style>
                        <!--end::Page bg image-->

                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx text-gray-900 mb-4">
                            System Error
                        </h1>
                        <!--end::Title-->

                        <!--begin::Text-->
                        <div class="fw-semibold fs-6 text-gray-500 mb-7">
                            Something went wrong! Please try again later.
                        </div>
                        <!--end::Text-->

                        <!--begin::Illustration-->
                        <div class="mb-11">
                            <img src="{{ image('auth/500-error.png') }}" class="mw-100 mh-300px theme-light-show" alt=""/>
                            <img src="{{ image('auth/500-error-dark.png') }}" class="mw-100 mh-300px theme-dark-show" alt=""/>
                        </div>
                        <!--end::Illustration-->

                        <!--begin::Link-->
                        <div class="mb-0">
                            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">Return Home</a>
                        </div>
                        <!--end::Link-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Root-->

@endsection
