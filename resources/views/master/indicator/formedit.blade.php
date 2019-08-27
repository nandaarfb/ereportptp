<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. Pelabuhan Tanjung Priuk</title>

<link href="{{ URL::asset('templateslide/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('templateslide/assets/css/imagehover/imagehover.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('templateslide/assets/uikit/css/uikit.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('EliteAdmin/assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">

<!-- metronic -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
  WebFont.load({
    google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
    active: function() {
        sessionStorage.fonts = true;
    }
  });
</script>
<!--end::Web font -->
<!--begin::Base Styles -->
<link href="{{ URL::asset('metronic2/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('metronic2/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="{{ URL::asset('metronic2/assets/demo/default/media/img/logo/favicon.ico') }}" />
<!-- metronic -->

</head>

<style>
	.uk-modal-dialog{
		margin-top:70px !important;
		width:900px !important;
		border-radius: 10px;
	}
	body{
		background-color: #283a5a;
	}
</style>



<body>

	<div class="fl-main-container">
		<!---Header----------->
		<div class="fl-header fl-header-margin" uk-sticky>
			<div>
				<img src="{{ URL::asset('templateslide/assets/img/logo/ptpwhite.png') }}" class="fl-logo">
				
				<span class="fl-title-logo">
					E-Reporting PT. Pelabuhan Tanjung Priok	
				</span>

				<span class="fl-menu-tool">
					<input type="button" class="uk-button uk-button-primary fl-button" value="menu">
				</span>
			</div>	
		</div>


		<div class="fl-container">
			<div class="fl-title-page" >
				<span style="font-size:20px">				
					<img class="uk-preserve-width uk-border-circle" src="{{ URL::asset('templateslide/assets/img/icon/sopReadMore.png') }}" width="65" alt="">
					Master Indicator
				</span>
			</div>
			
			<div class="fl-table">
				<form id="form_indicator" action="/master/indicator_edit" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id" id="id" value="{{ $id }}">
					<div>
						<b>Sub Division</b>
						<input type="hidden" name="subdivisionlisthidden" id="subdivisionlisthidden" value="{{ $sub_division }}" disabled="disabled"><br>
                        <select id="sub_division_list" class="form-control select2-list" name="sub_division_list[]">
                            <option value="">--Sub Division--</option>
                            @foreach($sub_division_list as $subdivision)
                                <option value="{{ $subdivision['SUB_DIVISION_ID'] }}" {{ $selectedsd == $subdivision['SUB_DIVISION_ID'] ? 'selected="selected"' : '' }}>{{ $subdivision['SUB_DIVISION_NAME'] }}</option>
                            @endforeach
                        </select>
					<div>
					<div>
						<b>Period Name</b>
						<input type="hidden" name="subdivisionlisthidden" id="subdivisionlisthidden" value="{{ $period }}" disabled="disabled"><br>
						<select class="form-control select2-list" id="period_list" name="period_list[]">
							<option value="">--Period Name--</option>
							@foreach($period_list as $periods)
								<option value="{{ $periods['PERIOD_ID'] }}" {{ $selectedperiod == $periods['PERIOD_ID'] ? 'selected="selected"' : '' }}>{{ $periods['PERIOD_NAME'] }}</option>
							@endforeach
						</select>
					<div>
					<div>
						<b>Indicator Name</b>
						<input name="indicator_name" class="uk-input uk-child-width-1-2" type="text" value="{{ $indicator_name }}" placeholder="Indicator Name">
					</div>
					<div>
						<b>Unit Measurement</b>
						<input name="unit" class="uk-input uk-child-width-1-2" type="text" value="{{ $unit }}" placeholder="Unit">
					</div>
					<div>
						<b>Formula</b>
						<input id="formula" name="formula" class="uk-input uk-child-width-1-2" value="{{ $formula }}" type="text" placeholder="Formula">
						<div id="m_repeater_3" style="padding-top: 10px;">
							<div class="form-group  m-form__group row">
								<div data-repeater-list="" class="col-lg-12">
									<div data-repeater-item class="row m--margin-bottom-10">
										<div class="col-lg-5">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="la la-phone"></i>
												</span>
												<select class="form-control m-input" id="exampleSelect11">
													<option value="">
														--Type--
													</option>
													<option value="+">
														+ (Tambah)
													</option>
													<option value="-">
														- (Kurang)
													</option>
													<option value="*">
														* (Kali)
													</option>
													<option value="/">
														/ (Bagi)
													</option>
												</select>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="la la-envelope"></i>
												</span>
												<select class="form-control m-input" id="exampleSelect1">
													<option>
														--Sub Indicator--
													</option>
													@foreach($sub_indicator_list as $subindicator)
														<option value="{{ $subindicator['SUB_INDICATOR_ID'] }}">{{ $subindicator['SUB_INDICATOR_NAME'] }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											<a href="#" data-repeater-delete="" class="btn btn btn-danger m-btn m-btn--icon">
												<span>
													<i class="la la-remove"></i>
													<span>
														<br>
													</span>
												</span>
											</a>
											<div data-repeater-create="" class="btn btn btn-primary m-btn m-btn--icon">
												<span onclick="plusplus();">
													<i class="la la-plus"></i>
													<span>
														Add
													</span>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<br>
					</div>
						

					<div>
						<button class="uk-button uk-button-primary fl-button" onclick="save_indicator_target(this.form.id);return false;">
							<i class="fa fa-plus"></i>&nbsp;Save
						</button>
					</div>
					
				</form>
			</div>

		</div>	
	</div>


<!-- metronic -->
<script src="{{ URL::asset('metronic2/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('metronic2/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->   
<!--begin::Page Resources -->
<script src="{{ URL::asset('metronic2/assets/demo/default/custom/components/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
<!-- metronic -->

<!-- <script src="{{ URL::asset('templateslide/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/uikit/js/uikit.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/datepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.marquee.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.pause.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('js/form-repeater.js') }}"></script>
<script src="{{ URL::asset('EliteAdmin/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script> -->
<script type="text/javascript">
	function showModal(){
		UIkit.modal("#mymodal").show();
	}

	function save_indicator(formid)
    {   
		submit_form(formid);
    }

	$(".select2-list").select2({
            allowClear: true
        });
	function plusplus(){
		var a = $("#exampleSelect11 option:selected").val();
		var b = $("#exampleSelect1 option:selected").val();
		var saatini = $("#formula").val();
		$("#formula").val(saatini+" "+b+" "+a);
	}
</script>
	
</body>
</html>
