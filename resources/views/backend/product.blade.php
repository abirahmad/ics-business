@extends('layouts.backend')

@section('title', __('Product'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-6">
								{{ __('Product') }}
							</div>
							<div class="col-lg-6">
								<div class="float-right">
									<a href="{{ route('backend.products') }}" class="btn warning-btn"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.product_tabs_nav')
						<div class="tabs-body">
							<!--Data Entry Form-->
							<form novalidate="" data-validate="parsley" id="DataEntry_formId">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="product_name">{{ __('Product Name') }}<span class="red">*</span></label>
											<input value="{{ $datalist['title'] }}" type="text" name="title" id="product_name" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-lg-12">
										<div class="form-group">
											<label for="slug">{{ __('Slug') }}<span class="red">*</span></label>
											<input value="{{ $datalist['slug'] }}" type="text" name="slug" id="slug" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-lg-12">
										<div class="form-group tpeditor">
											<label for="description">{{ __('Product Content') }}</label>
											<textarea name="description" id="description" class="form-control" rows="4">{{ $datalist['description'] }}</textarea>
										</div>
									</div>
								</div>

								<div class="row">	
									<div class="col-lg-6">
										<div class="form-group">
											<label for="sale_price">{{ __('Sale Price') }}<span class="red">*</span></label>
											<input value="{{ $datalist['sale_price'] }}" name="sale_price" id="sale_price" type="text" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-lg-6">
										<div class="form-group">
											<label for="stock_qty">{{ __('Stock Qty') }}<span class="red">*</span></label>
											<input value="{{ $datalist['stock_qty'] }}" name="stock_qty" id="stock_qty" type="text" class="form-control parsley-validated">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="storeid">{{ __('Store') }}<span class="red">*</span></label>
											<select name="storeid" id="storeid" class="chosen-select form-control">
											@foreach($storeList as $row)
												<option {{ $row->id == $datalist['user_id'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->shop_name }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="f_thumbnail_thumbnail">{{ __('Featured image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['f_thumbnail'] }}" type="text" name="f_thumbnail" id="f_thumbnail_thumbnail" class="form-control" readonly>
												<a onClick="onGlobalMediaModalView()" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended image size width: 400px and height: 400px.</em>
											<div id="remove_f_thumbnail" class="select-image dnone">
												<div class="inner-image" id="view_thumbnail_image"></div>
												<a onClick="onMediaImageRemove('f_thumbnail_thumbnail')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
									<div class="col-lg-6"></div>
								</div>
								<input value="{{ $datalist['id'] }}" type="text" name="RecordId" id="RecordId" class="dnone">
								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
										<a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a>
									</div>
								</div>
							</form>
							<!--/Data Entry Form/-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /main Section -->

<!--Global Media-->
@include('backend.partials.global_media')
<!--/Global Media/-->

@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var media_type = 'Product_Thumbnail';
var f_thumbnail = "{{ $datalist['f_thumbnail'] }}";
if(f_thumbnail == ''){
	$("#remove_f_thumbnail").hide();
	$("#f_thumbnail_thumbnail").html('');
}
if(f_thumbnail != ''){
	$("#remove_f_thumbnail").show();
	$("#view_thumbnail_image").html('<img src="'+public_path+'/media/'+f_thumbnail+'">');
}

</script>
<link href="{{asset('public/backend/editor/summernote-lite.min.css')}}" rel="stylesheet">
<script src="{{asset('public/backend/editor/summernote-lite.min.js')}}"></script>
<script src="{{asset('public/backend/pages/product.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush