<!-- Footer Top Section -->
@if($gtext['is_subscribe_footer'] == 1)
<section class="footer-top" style="background-image: url({{ asset('public/media/'.$gtext['subscribe_background_image']) }});">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 col-xxl-6 offset-xxl-3">
				<div class="newsletter-card">
					<h2>{{ $gtext['subscribe_title'] }}</h2>
					<p>{{ $gtext['subscribe_popup_desc'] }}</p>
					<div class="newsletter-form">
						<form>
							<input name="subscribe_email" id="subscribe_email" type="email" class="form-control" placeholder="{{ __('Enter your email address') }}"/>
							<a class="btn newsletter-btn subscribe_btn sub_btn" href="javascript:void(0);">{{ __('Subscribe') }}</a>
						</form>
						<div class="subscribe_msg mt10"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
