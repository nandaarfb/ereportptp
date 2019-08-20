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

<!-- datatable -->
<link rel="stylesheet" href="{{ URL::asset('templateslide/assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ URL::asset('templateslide/assets/js/jquery.dataTables.min.js') }}"></script>
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
					Master User
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
				<a href="form_master_user"><button class="uk-button uk-button-primary fl-button" type="button">+</button></a>
			</span>
		</div>


			<div class="fl-table">
				<div class="uk-overflow-auto">
					<table class="uk-table uk-table-hover uk-table-middle uk-table-divider" id='table_user'>
						<thead>
							<tr class="fl-table-head">
								<th width="5%"></th>
								<th>Id Jabatan</th>
								<th>Nipp</th>
								<th>Kelas</th>
								<th>Nama</th>
								<th>Tipe</th>
								<th>Access</th>
								<th>Status</th>
								<th>tgl_Pensiun</th>
							</tr>
						</thead>

						<tbody>
						@foreach($master_user_list as $data)
						<tr>
							<th width="5%"></th>
							<th>{{$data['ID_JABATAN']}}</th>
							<td>{{$data['NIPP'] }}</td>
							<td>{{$data['KELAS'] }}</td>
							<td>{{$data['NAMA'] }}</td>
							<td>{{$data['TIPE'] }}</td>
							<td>{{$data['ACCESS'] }}</td>
							<td>{{$data['STATUS'] }}</td>
							<td>{{$data['TGL_PENSIUN'] }}</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>	
			</div>

		</div>	
	</div>

	<!-- This is the modal -->
	<div id="mymodal" uk-modal >
		<div class="uk-modal-dialog uk-modal-body">
			<div>
				<div uk-grid class="uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-child-width-1-2@s" align="left	">
					<div>
						<b>Id Jabatan</b>
						<input class="uk-input" type="text" placeholder="Masukan Id Jabatan">
					</div>
					
					<div>
						<b>Nipp</b>
 						<input class="uk-input" type="text" placeholder="Masukan Nipp">
					</div>

					<div>
						<b>Kelas</b>
						<input class="uk-input" type="text" placeholder="Masukan Kelas">
					</div>
					<div>
						<b>Nama</b>
						<input class="uk-input" type="text" placeholder="Masukan Nama">
					</div>

					<div style="padding-top:10px" align="right">
							<button class="uk-button uk-button-primary fl-button" type="button">Search</button>			
						</div>			
				</div>
			</div>
	</div>
</body>
</html>


<script>
$(document).ready( function () {
    $('#table_user').DataTable();
} );

	function showModal(){
		UIkit.modal("#mymodal").show();
	}
</script>