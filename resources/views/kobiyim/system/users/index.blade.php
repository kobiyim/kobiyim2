<x-kobiyim::management-layout>

    @section('title')
        Kullanıcılar
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-12">


				<div class="card card-custom">
					<div class="card-header align-items-center border-0">
						<div class="card-title">
							<span class="card-icon">
								<i class="la la-industry"></i>
							</span>
							<h3 class="card-label">Kullanıcılar</h3>
						</div>
						<div class="card-toolbar">
							<a class="btn btn-sm btn-primary mr-2" onclick="loadModal({ 'key': 'createUser' }, true)">
								Yeni
							</a>
						</div>
					</div>
					<div class="card-body pt-4 table-responsive">
						<table class="table table-bordered table-hover" id="datatable">
							<thead>
								<tr>
									<th>Kullanıcı Adı</th>
									<th>Telefon</th>
									<th class="text-center" width="10%">İşlemler</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>


        </div>
        <!--end::Col-->
        <!--begin::Col-->
    </div>
    <!--end::Row-->

	@push('scripts')
		@include('kobiyim.js.system.users.index')
	@endpush

</x-kobiyim::management-layout>