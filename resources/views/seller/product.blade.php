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
									<a href="{{ route('seller.products') }}" class="btn warning-btn"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('seller.partials.product_tabs_nav')
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
											<label for="f_thumbnail_thumbnail"><span class="red">*</span> {{ __('Featured image') }}</label>
											<div class="file_up">
												<input type="text" name="f_thumbnail" id="f_thumbnail_thumbnail" value="{{ $datalist['f_thumbnail'] }}" class="form-control parsley-validated" data-required="true" readonly>
												<div class="file_browse_box">
													<input type="file" name="load_image" id="load_image" class="file_browse">
													<label for="load_image" class="file_browse_icon"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</label>
												</div>
											</div>
											<small class="form-text text-muted">Recommended image size width: 400px and height: 400px.</small>
											<div id="remove_f_thumbnail" class="select-image dnone">
												<div class="inner-image" id="view_thumbnail_image"></div>
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

@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var media_type = 'Product_Thumbnail';
var strIds = "{{ $datalist['category_ids'] }}";
if(strIds !=''){
	var idsArr = strIds.split(",");
	$("#category_ids").val(idsArr).trigger("chosen:updated");
}

var f_thumbnail = "{{ $datalist['f_thumbnail'] }}";
if(f_thumbnail == ''){
	$("#remove_f_thumbnail").hide();
	$("#f_thumbnail_thumbnail").html('');
}
if(f_thumbnail != ''){
	$("#remove_f_thumbnail").show();
	$("#view_thumbnail_image").html('<img src="'+public_path+'/media/'+f_thumbnail+'">');
}

var TEXT = [];
	TEXT['Select Category'] = "{{ __('Select Category') }}";
	TEXT['Sorry only you can upload jpg, png and gif file type'] = "{{ __('Sorry only you can upload jpg, png and gif file type') }}";

</script>
<link href="{{asset('public/backend/editor/summernote-lite.min.css')}}" rel="stylesheet">
<script src="{{asset('public/backend/editor/summernote-lite.min.js')}}"></script>
<script src="{{asset('public/backend/pages/product_seller.js')}}"></script>
@endpush