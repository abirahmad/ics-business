@extends('layouts.backend')

@section('title', __('Sellers'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card" id="list-panel">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-6">
								<span>{{ __('Sellers') }}</span>
							</div>
							<div class="col-lg-6">
								<div class="float-right">
									<a onClick="onFormPanel()" href="javascript:void(0);" class="btn blue-btn btn-form float-right"><i class="fa fa-plus"></i> {{ __('Add New') }}</a>
								</div>
							</div>
						</div>
					</div>
					
					<!--Data grid-->
					<div class="card-body">
						<div class="row mb-10">
							<div class="col-lg-12">
								<div class="group-button">
									<button id="orderstatus_0" type="button" onclick="onDataViewByStatus(0)" class="btn btn-theme orderstatus active">All ({{ $AllCount }})</button>
									<button id="orderstatus_1" type="button" onclick="onDataViewByStatus(1)" class="btn btn-theme orderstatus">{{ __('Active') }} ({{ $ActiveCount }})</button>
									<button id="orderstatus_2" type="button" onclick="onDataViewByStatus(2)" class="btn btn-theme orderstatus">{{ __('Inactive') }} ({{ $InactiveCount }})</button>
								</div>
								<input type="hidden" id="view_by_status" value="0">
							</div>
						</div>
					
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group bulk-box">
									<select id="bulk-action" class="form-control">
										<option value="">{{ __('Select Action') }}</option>
										<option value="active">{{ __('Active') }}</option>
										<option value="inactive">{{ __('Inactive') }}</option>
										<option value="delete">{{ __('Delete Permanently') }}</option>
									</select>
									<button type="submit" onClick="onBulkAction()" class="btn bulk-btn">{{ __('Apply') }}</button>
								</div>
							</div>
							<div class="col-lg-3"></div>
							<div class="col-lg-5">
								<div class="form-group search-box">
									<input id="search" name="search" type="text" class="form-control" placeholder="{{ __('Search') }}...">
									<button type="submit" onClick="onSearch()" class="btn search-btn">{{ __('Search') }}</button>
								</div>
							</div>
						</div>
						<div id="tp_datalist">
							@include('backend.partials.sellers_table')
						</div>
					</div>
					<!--/Data grid/-->
				</div>
				
				<div class="dnone" id="form-panel">
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<div class="row">
										<div class="col-lg-6">
											<span>{{ __('Sellers') }}</span>
										</div>
										<div class="col-lg-6">
											<div class="float-right">
												<a onClick="onListPanel()" href="javascript:void(0);" class="btn warning-btn btn-list float-right dnone"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
											</div>
										</div>
									</div>
								</div>
								<!--/Data Entry Form-->
								<div class="card-body">
									<a onClick="onDetailsBankInfo(1)" href="javascript:void(0);" id="details_bank_info_1" class="btn custom-btn font-bold mr-10 details_bank_info active">{{ __('Details') }}</a>
									<a onClick="onDetailsBankInfo(2)" href="javascript:void(0);" id="details_bank_info_2" class="btn custom-btn font-bold details_bank_info">{{ __('Bank Information') }}</a>
									
									<!--Details-->
									<div class="mt-15" id="details">
										<form novalidate="" data-validate="parsley" id="DataEntry_formId">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="name">{{ __('Name') }}<span class="red">*</span></label>
														<input type="text" name="name" id="name" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="email">{{ __('Email Address') }}<span class="red">*</span></label>
														<input type="email" name="email" id="email" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group relative">
														<label for="password">{{ __('Password') }}<span class="red">*</span></label>
														<span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
														<input type="password" name="password" id="password" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="shop_name">{{ __('Shop Name') }}<span class="red">*</span></label>
														<input type="text" name="shop_name" id="shop_name" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="shop_url">{{ __('Shop URL') }}<span class="red">*</span></label>
														<input type="text" name="shop_url" id="shop_url" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="phone">{{ __('Shop Phone') }}<span class="red">*</span></label>
														<input type="text" name="phone" id="phone" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="address">{{ __('Address') }}<span class="red">*</span></label>
														<input type="text" name="address" id="address" class="form-control parsley-validated" data-required="true">
													</div>
												</div>
											</div>
											
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="status_id">{{ __('Active/Inactive') }}<span class="red">*</span></label>
														<select name="status_id" id="status_id" class="chosen-select form-control">
														@foreach($statuslist as $row)
															<option value="{{ $row->id }}">
																{{ $row->status }}
															</option>
														@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="photo_thumbnail">{{ __('Logo') }}</label>
														<div class="tp-upload-field">
															<input type="text" name="photo" id="photo_thumbnail" class="form-control" readonly>
															<a id="on_thumbnail" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
														</div>
														<em>Recommended image size width: 200px and height: 200px.</em>
														<div id="remove_photo_thumbnail" class="select-image">
															<div class="inner-image" id="view_photo_thumbnail"></div>
															<a onClick="onMediaImageRemove('photo_thumbnail')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
														</div>
													</div>
												</div>
												<div class="col-md-6"></div>
											</div>
											
											<input type="text" id="RecordId" name="RecordId" class="dnone"/>
											
											<div class="row tabs-footer mt-15">
												<div class="col-lg-12">
													<a id="submit-form" href="javascript:void(0);" class="btn blue-btn mr-10">{{ __('Save') }}</a>
												</div>
											</div>
										</form>
									</div>
									<!--/Details/-->
								</div>
								<!--/Data Entry Form-->
							</div>
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
var media_type = 'Thumbnail';
var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to active this records'] = "{{ __('Do you really want to active this records') }}";
	TEXT['Do you really want to inactive this records'] = "{{ __('Do you really want to inactive this records') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
	TEXT['Active'] = "{{ __('Active') }}";
	TEXT['Inactive'] = "{{ __('Inactive') }}";
</script>
<script src="{{asset('public/backend/pages/sellers.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush