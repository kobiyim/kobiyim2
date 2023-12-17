<x-kobiyim::auth-layout>

    <!--begin::Form-->
    {{ Form::open([ 'route' => 'password.request', 'class' => 'form w-100' ]) }}
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                Şifremi Unuttum?
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">
                Şifre sıfırlama işlemi için kayıtlı telefon numaranızı girin.
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            {{ Form::text('phone', null, [ 'id' => 'phone', 'class' => 'form-control bg-transparent', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
            <!--end::Email-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            {{ Form::submit('Şifremi Sıfırla', [ 'class' => 'btn btn-primary me-4']) }}

            <a href="{{ route('login') }}" class="btn btn-light">İptal</a>
        </div>
        <!--end::Actions-->
    {{ Form::close() }}
    <!--end::Form-->

    @push('scripts')
        <script type="text/javascript">
            Inputmask({
                "mask" : "0 (999) 999 9999"
            }).mask("#phone");
        </script>
    @endpush

</x-kobiyim::auth-layout>
