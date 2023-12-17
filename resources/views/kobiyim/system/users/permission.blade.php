<x-kobiyim::management-layout>

    @section('title')
        Kullanıcılar
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-12">


					<div class="row">
						<div class="col-xl-12">
							<div class="card card-custom gutter-b">
								<div class="card-header">
									<h3 class="card-title">{{ $get->name }} için İzinler</h3>
								</div>
								{{ Form::open([ 'route' => [ 'user.permission', $get->id ], 'class' => 'form' ]) }}
									<div class="card-body">
										<div class="form-group">
											<div class="checkbox-list">
											@foreach($all as $e)
												<label class="checkbox">
												{{ Form::checkbox('perm' . $e->id, 1, ((array_key_exists($e->id, $user)) ? true : false)) }}
												<span></span>{{ $e->name }}</label>
											@endforeach
											</div>
										</div>
									</div>
									<div class="card-footer">
										{{ Form::submit('Kaydet', [ 'class' => 'btn btn-primary']) }}
									</div>
								{{ Form::close() }}
							</div>
						</div>
					</div>


        </div>
        <!--end::Col-->
        <!--begin::Col-->
    </div>
    <!--end::Row-->

</x-kobiyim::management-layout>