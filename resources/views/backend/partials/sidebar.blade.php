<div class="sidebar-wrapper">
	<div class="logo">
		<a href="{{ route('backend.dashboard') }}">
			<img src="{{ $gtext['back_logo'] ? asset('public/media/'.$gtext['back_logo']) : asset('public/backend/images/backend-logo.png') }}" alt="logo">
		</a>
	</div>
	<div class="version">Theme V 1.2.1</div>
	<ul class="left-navbar">
		@if (Auth::user()->role_id == 1)
		<li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-tachometer"></i>{{ __('Dashboard') }}</a></li>
		<li class="dropdown"><a class="nav-link has-dropdown" href="#" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>{{ __('eCommerce') }}</a>
			<ul class="dropdown-menu">
				<li><a href="{{ route('backend.products') }}">{{ __('Products') }}</a></li>
			</ul>
		</li>
		<li class="dropdown"><a class="nav-link has-dropdown" href="#" data-toggle="dropdown"><i class="fa fa-sitemap"></i>{{ __('Marketplace') }}</a>
			<ul class="dropdown-menu">
				<li><a href="{{ route('backend.sellers') }}">{{ __('Sellers') }}</a></li>
			</ul>
		</li>
		<li><a href="{{ route('backend.users') }}"><i class="fa fa-user-plus"></i>{{ __('Users') }}</a></li>
		@elseif (Auth::user()->role_id == 3)
		<li><a href="{{ route('seller.dashboard') }}"><i class="fa fa-tachometer"></i>{{ __('Dashboard') }}</a></li>
		<li><a href="{{ route('seller.products') }}" id="select_product"><i class="fa fa-product-hunt"></i>{{ __('Products') }}</a></li>
		@endif
	</ul>
</div>