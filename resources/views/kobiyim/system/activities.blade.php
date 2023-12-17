<x-kobiyim::default-layout>

    @section('title')
        Kullanıcılar
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-12">


			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>Kullanıcı Adı</th>
						<th width="15%">Telefon</th>
						<th width="15%">Tarih</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>

        </div>
        <!--end::Col-->
        <!--begin::Col-->
    </div>
    <!--end::Row-->

	@push('scripts')
		<script type="text/javascript">
			"use strict";

			var table = $('#datatable');

			// begin first table
			table.DataTable({
				fixedHeader: true,
				processing: true,
				serverSide: true,
				ajax: {
					url: '{{ route('activity.json') }}'
				},
				columns: [
					{data: 'description', name: 'description'},
					{data: 'causer_id', name: 'causer_id'},
					{data: 'created_at', name: 'created_at'}
				],
				language: {
					"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
				},
				columnDefs: [
					{ targets: [ -1 ], orderable: false}
				]
			});

		</script>
	@endpush

</x-kobiyim::default-layout>