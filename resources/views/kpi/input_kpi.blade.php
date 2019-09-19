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
				<img src="templateslide/assets/img/logo/ptpwhite.png" class="fl-logo">
				
				<span class="fl-title-logo">
					E-Reporting PT. Pelabuhan Tanjung Priuk	
				</span>

				<span class="fl-menu-tool">
					<input type="button" class="uk-button uk-button-primary fl-button" value="menu">
				</span>
			</div>	
		</div>


		<div class="fl-container">
			<div class="fl-title-page" >
				<span style="font-size:20px">				
					<img class="uk-preserve-width uk-border-circle" src="templateslide/assets/img/icon/sopReadMore.png" width="65" alt="">
					Input KPI	
				</span>
			</div>
			
			<div class="col-md-12 fl-table">
				<div class="uk-overflow-auto">
				
					<table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
						<thead>
							<tr class="fl-table-head">
								<th width="5%"></th>
								<th width="45%">Indicator Name</th>
								<th width="25%">Satuan</th>
								<th width="25%">Target</th>
							</tr>
						</thead>
						<?php $i = 0 ?>
					@foreach($kpi_list as $data)
						<tbody>
							<tr>
								<td><img class="uk-preserve-width uk-border-circle" src="templateslide/assets/img/icon/i1.png" width="45" alt=""></td>
								<td>{{ $data->INDICATOR_NAME }}</td>
								<td>{{ $data->UNIT }}</td>
								<td>{{ $data->TARGET }}</td>
							</tr>
						<?php foreach($sub_in[$i] as $data){ ?>
							<tr>
								<td></td>
								<td>{{ $data->SUB_INDICATOR_NAME }}</td>
								<td><input  class="col-md-6 uk-input" type="text" name="subdivisionlisthidden" id="subdivisionlisthidden" value="" placeholder="Actual"></td>
								<td><input  class="col-md-6 uk-input" type="text" name="subdivisionlisthidden" id="subdivisionlisthidden" value="" placeholder="Remark"></td>
							</tr>
						<?php } ?>
						<?php $i = $i+1 ?>
						</tbody>
					@endforeach

						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<button class="uk-button uk-button-primary fl-button" type="button">Simpan</button>
									<button class="uk-button uk-button-primary fl-button" type="button">Cancel</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>	
			</div>

		</div>	
	</div>
</body>
</html>




<script>
	function showModal(){
		UIkit.modal("#mymodal").show();
	}
</script>
