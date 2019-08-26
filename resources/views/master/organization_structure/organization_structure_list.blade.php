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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">


<script src="{{ URL::asset('templateslide/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/uikit/js/uikit.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/datepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.marquee.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.pause.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.easing.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
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
					Master Organization Structure
				</span>

			<span style="float:right;margin-top:15px">
				<button class="uk-button uk-button-default fl-button" type="button">Sorting</button>
				<div uk-dropdown="mode: click">
					<ul class="uk-nav uk-dropdown-nav">
						<li><a href="#">Divisi</a></li>
						<li><a href="#">Nama</a></li>
						<li><a href="#">Nilai</a></li>
					</ul>
				</div>
				<button class="uk-button uk-button-default fl-button" type="button" onclick="showModal()">Filter</button>
<<<<<<< HEAD
				<a href="form_organization_structure"><button class="uk-button uk-button-primary fl-button" type="button">+</button></a>
=======
				<a href="form_indicator_target"><button class="uk-button uk-button-primary fl-button" type="button">+</button></a>
>>>>>>> 521f40b918ea55fc0f7f887809f4e723c7779e94
			</span>
		</div>

		<div class="fl-table">
				<div class="uk-overflow-auto">
					<table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
						<thead>
							<tr class="fl-table-head">
								<th width="5%"></th>
<<<<<<< HEAD
								<th width="20%">ID</th>
								<th width="20%">Branch Office</th>
								<th width="20%">Division</th>
=======
								<th width="20%">No</th>
								<th width="20%">Branch Office</th>
								<th width="20%">Dividion</th>
>>>>>>> 521f40b918ea55fc0f7f887809f4e723c7779e94
								<th width="20%">Sub Division</th>
								<th width="20%">Active</th>
							</tr>
						</thead>
						<tbody>
						@foreach($organization_structure_list as $data)
								<tr>
									<td><img class="uk-preserve-width uk-border-circle" src="{{ URL::asset('templateslide/assets/img/icon/i1.png') }}" width="45" alt=""></td>
<<<<<<< HEAD
									<td>{{ $data->ORGANIZATION_STRUCTURE_ID }}</td>
=======
									<td>{{ $data->NO }}</td>
>>>>>>> 521f40b918ea55fc0f7f887809f4e723c7779e94
									<td>{{ $data->BRANCH_OFFICE_NAME }}</td>
									<td>{{ $data->DIVISION_NAME }}</td>
									<td>{{ $data->SUB_DIVISION_NAME }}</td>
									<td>{{ $data->ACTIVE }}</td>
									<td>
										<button class="uk-button uk-button-default fl-button" type="button">Action</button>
										<div uk-dropdown="mode:click">
											<ul class="uk-nav uk-dropdown-nav">
												<li><a href="#">Detail</a></li>
												<li><a href="#">Update</a></li>
												<li><a href="#">Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>
						@endforeach
						</tbody>
					</table>
				</div>	
			</div>

		</div>	
	</div>
<<<<<<< HEAD

	<!-- This is the modal -->
	<div id="mymodal" uk-modal >
		<div class="uk-modal-dialog uk-modal-body">
			<div>
				<div uk-grid class="uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-child-width-1-2@s" align="left	">
					<div>
						<b>Nama</b>
						<input class="uk-input" type="text" placeholder="Masukan Nama">
					</div>
					
					<div>
						<b>Divisi</b>
 						<input class="uk-input" type="text" placeholder="Masukan Divisi">
					</div>

					<div>
						<b>Sub Divisi</b>
						<input class="uk-input" type="text" placeholder="Masukan Sub Divisi">
					</div>
					<div style="padding-top:10px" align="right">
							<button class="uk-button uk-button-primary fl-button" type="button">Search</button>			
						</div>			
				</div>
			</div>
	</div>
=======
>>>>>>> 521f40b918ea55fc0f7f887809f4e723c7779e94
</body>
</html>


<<<<<<< HEAD


<script>
	function showModal(){
		UIkit.modal("#mymodal").show();
	}
</script>


=======
>>>>>>> 521f40b918ea55fc0f7f887809f4e723c7779e94
