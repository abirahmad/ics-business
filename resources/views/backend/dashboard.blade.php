@extends('layouts.backend')

@section('title', __('Dashboard'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="status-card bg-grad-1">
					<div class="status-text">
						<div class="status-name opacity50">{{ __('Total') }}</div>
						<div class="status-name opacity50">{{ __('Orders') }}</div>
						<h2 class="status-count">{{ $total_order }}</h2>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
						<path fill="rgba(255,255,255,0.2)" fill-opacity="1" d="M0,32L34.3,58.7C68.6,85,137,139,206,138.7C274.3,139,343,85,411,53.3C480,21,549,11,617,10.7C685.7,11,754,21,823,42.7C891.4,64,960,96,1029,138.7C1097.1,181,1166,235,1234,218.7C1302.9,203,1371,117,1406,74.7L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
					</svg>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="status-card bg-grad-2">
					<div class="status-text">
						<div class="status-name opacity50">{{ __('Orders') }}</div>
						<div class="status-name opacity50">{{ __('Awaiting processing') }}</div>
						<h2 class="status-count">{{ $pending_order }}</h2>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
						<path fill="rgba(255,255,255,0.2)" fill-opacity="1" d="M0,32L34.3,58.7C68.6,85,137,139,206,138.7C274.3,139,343,85,411,53.3C480,21,549,11,617,10.7C685.7,11,754,21,823,42.7C891.4,64,960,96,1029,138.7C1097.1,181,1166,235,1234,218.7C1302.9,203,1371,117,1406,74.7L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
					</svg>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /main Section -->
@endsection

@push('scripts')

@endpush