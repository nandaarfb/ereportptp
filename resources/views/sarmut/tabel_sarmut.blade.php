<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. Pelabuhan Tanjung Priuk</title>

<link href="templateslide/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="templateslide/assets/css/imagehover/imagehover.min.css" rel="stylesheet" type="text/css">
<link href="templateslide/assets/uikit/css/uikit.css" rel="stylesheet" type="text/css">
<link href="templateslide/assets/datepicker/daterangepicker.css" rel="stylesheet" type="text/css">
<link href="templateslide/assets/datepicker/daterangepicker.css" rel="stylesheet" type="text/css">

<script src="templateslide/assets/js/jquery-1.11.1.min.js"></script>
<script src="templateslide/assets/uikit/js/uikit.js"></script>

<script src="templateslide/assets/datepicker/moment.min.js"></script>
<script src="templateslide/assets/datepicker/daterangepicker.js"></script>

<script src="templateslide/assets/js/marquee/jquery.marquee.js"></script>
<script src="templateslide/assets/js/marquee/jquery.pause.js"></script>
<script src="templateslide/assets/js/marquee/jquery.easing.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
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
					Sasaran Mutu	
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
					<button onclick="location.href = '{{ url('input_sarmut')}}'" class="uk-button uk-button-primary fl-button" type="button">+</button>
				</span>
			</div>
			
			<div class="fl-table">
				<div class="uk-overflow-auto">
					<table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
						<thead>
							<tr class="fl-table-head">
								<th width="5%"></th>
								<th width="22%">Nama</th>
								<th width="22%">Divisi</th>
								<th width="20%">Indikator</th>
								<th width="15%">Nilai</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for($a=0;$a<=15;$a++){
							?>
								<tr>
									<td><img class="uk-preserve-width uk-border-circle" src="templateslide/assets/img/icon/i1.png" width="45" alt=""></td>
									<td>Nanda Arief Bachtiar</td>
									<td>Divisi Operasi Terminal</td>
									<td>Operasi Terminal 4</td>
									<td><b>79 / <span style="color:green">100</span></b></td>
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
							<?php } ?>
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
						<b>Nama</b>
						<input class="uk-input" type="text" placeholder="Masukan Nama">
					</div>
					
					<div>
						<b>Divisi</b>
						<input class="uk-input" type="text" placeholder="Masukan Divisi">
					</div>

					<div>
						<b>Indikator</b>
						<input class="uk-input" type="text" placeholder="Indikator">
					</div>

					<div>
						<b>Nilai</b>
						<input class="uk-input" type="text" placeholder="Masukan Nilai">
						<div style="padding-top:10px" align="right">
							<button class="uk-button uk-button-primary fl-button" type="button">Search</button>			
						</div>			
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
