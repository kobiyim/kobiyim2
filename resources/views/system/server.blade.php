@extends('kobiyim.theme.default')

@section('content')
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-custom card-stretch gutter-b">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h4 class="font-weight-bolder">Verilerin güncelliği için sunucu tarafından erişim sağlayın. @if($url != null) <a href="{{ str_replace(env('APP_URL'), env('APIURL'), $url) }}">Sunucuya geç</a> @endif</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('title', 'Sunucudan Erişin')