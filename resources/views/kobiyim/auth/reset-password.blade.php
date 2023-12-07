@extends('kobiyim.layout.master')

@section('content')

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Page-->
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->token }}">
                            <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    New Password
                                </h1>
                                <!--end::Title-->

                                <!--begin::Link-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Enter your new password.
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off"/>

                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->

                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Hint-->
                                <div class="text-muted">
                                    Use 8 or more characters with a mix of letters, numbers & symbols.
                                </div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group--->

                            <!--end::Input group--->
                            <div class="fv-row mb-8">
                                <!--begin::Repeat Password-->
                                <input placeholder="Repeat Password" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent"/>
                                <!--end::Repeat Password-->
                            </div>
                            <!--end::Input group--->

                            <!--begin::Input group--->
                            <div class="fv-row mb-10">
                                <div class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1"/>

                                    <label class="form-check-label fw-semibold text-gray-700 fs-6">
                                        I Agree &

                                        <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                                    </label>
                                </div>
                            </div>
                            <!--end::Input group--->

                            <!--begin::Actions-->
                            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                <button type="button" id="kt_new_password_submit" class="btn btn-primary me-4">
                                    @include('kobiyim/partials/general/_button-indicator', ['label' => 'Submit'])
                                </button>

                                <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                        <!--end::Page-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap px-5">
                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base">
                        <a href="#" class="px-5" target="_blank">Terms</a>

                        <a href="#" class="px-5" target="_blank">Plans</a>

                        <a href="#" class="px-5" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->

            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ image('misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="{{ route('dashboard') }}" class="mb-12">
                        <img alt="Logo" src="{{ image('logos/custom-1.png') }}" class="h-60px h-lg-75px"/>
                    </a>
                    <!--end::Logo-->

                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ image('misc/auth-screens.png') }}" alt=""/>
                    <!--end::Image-->

                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        Fast, Efficient and Productive
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>

                        introduces a person they’ve interviewed <br/> and provides some background information about

                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>
                        and their <br/> work following this is a transcript of the interview.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::App-->

@endsection
