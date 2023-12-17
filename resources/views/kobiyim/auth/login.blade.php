<x-kobiyim::auth-layout>

    <!--begin::Form-->
    {{ Form::open([ 'route' => 'login', 'class' => 'form w-100' ]) }}
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                {{ env('KOBIYIM_NAME', 'KOBİYİM') }}
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">
                Hesabınıza Giriş Yapın
            </div>
            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            {{ Form::tel('phone', null, [ 'id' => 'phone', 'class' => 'form-control bg-transparent', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            {{ Form::password('password', [ 'class' => 'form-control bg-transparent', 'placeholder' => 'Şifreniz']) }}
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="{{ route('password.request') }}" class="link-primary">
                Şifremi unuttum?
            </a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            {{ Form::submit('Giriş', [ 'class' => 'btn btn-primary']) }}
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            Hesabınız yok mu?

            <a href="{{ route('register') }}" class="link-primary">
                Hesap oluşturun
            </a>
        </div>
        <!--end::Sign up-->
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