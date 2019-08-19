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
</head>

<style>
	.uk-modal-dialog{
		margin-top:70px !important;
		width:900px !important;
		border-radius: 10px;
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
				<form>
					<div>
						<b>Sub Division</b>
						<input type="hidden" name="subdivisionlisthidden" id="subdivisionlisthidden" value="{{ $sub_division }}" disabled="disabled"><br>
                        <select id="sub_division_list" class="form-control select2-list" name="sub_division_list[]">
                            <option value=""></option>
                            @foreach($sub_division_list as $subdivision)
                                <option value="{{ $subdivision['SUB_DIVISION_ID'] }}">{{ $subdivision['SUB_DIVISION_NAME'] }}</option>
                            @endforeach
                        </select>
					<div>
					<div>
						<b>Period Name</b>
						<input type="hidden" name="subdivisionlisthidden" id="subdivisionlisthidden" value="{{ $period }}" disabled="disabled"><br>
						<select class="form-control select2-list" id="period_list" name="period_list[]">
							<option value=""></option>
							@foreach($period_list as $periods)
								<option value="{{ $periods['PERIOD_ID'] }}">{{ $periods['PERIOD_NAME'] }}</option>
							@endforeach
						</select>
					<div>
					<div>
						<b>Indicator Name</b>
						<input name="indicator_name" class="uk-input uk-child-width-1-2" type="text" placeholder="Indicator Name">
					</div>
					<div>
						<b>Formula</b>
						<input name="formula" class="uk-input uk-child-width-1-2" type="text" placeholder="Formula">
					</div>
					<div>
						<b>Unit</b>
						<input name="unit" class="uk-input uk-child-width-1-2" type="text" placeholder="Unit">
					</div>
					<div>
						<br>
					</div>
						

					<div>
						<input type="button" class="uk-button uk-button-primary fl-button" value="Save">
					</div>
					
				</form>
			</div>

		</div>	
	</div>

@push('jspage')
<script src="{{ URL::asset('templateslide/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/uikit/js/uikit.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/datepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.marquee.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.pause.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('js/form-repeater.js') }}"></script>
<script src="{{ URL::asset('EliteAdmin/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
<script type="text/javascript">
	function showModal(){
		UIkit.modal("#mymodal").show();
	}
	$(".select2-list").select2({
            allowClear: true
        });
</script>
@endpush
	
</body>
</html>
