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

<body>
<body>

	
	<div class="fl-main-container">
		<!---Header----------->
		<div class="fl-header fl-header-margin">
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
					<img class="uk-preserve-width uk-border-circle" src="templateslide/assets/img/icon/sopReadMore.png" width="65">
					Management Report	
				</span>
				<span style="float:right;margin-top:15px">
					<button class="uk-button uk-button-default fl-button" type="button">Upload Report</button>
					<button class="uk-button uk-button-default fl-button" type="button" onclick="showModal()">Filter</button>
					<button class="uk-button uk-button-primary fl-button" type="button">Lihat Lebih Banyak</button>
				</span>
			</div>

			<div uk-slider="clsActivated: uk-transition-active" style="margin-top:15px">
				<ul class="uk-grid-small uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l uk-grid">
					
					<li>
						<div class="uk-card uk-card-default uk-card-body fl-menu-box" align="center">
							<table style="height:55vh">
								<tr>
									<td>
										<div align="center" style="padding:10px">
											<img src="templateslide/assets/img/icon/sopUpload.png" width="120"><br>
											<span style="font-size:22px;font-weight:600">Upload Report</span>
											<div>
												<br>
											</div>
											<div style="margin-top:15px">
												<button class="uk-button uk-button-success fl-button" type="button">
													Upload
												</button>
											</div>
										</div
									</td>
								</tr>
							</table>								    
						</div>	
					</li>

					<?php for($a=1;$a<=5;$a++){ ?>
							<li>
								<div class="uk-card uk-card-default uk-card-body fl-menu-box" align="center">
									<table style="height:55vh">
										<tr>
											<td>
												<div align="center">
													<img src="templateslide/assets/img/icon/sopExcel.png" width="120"><br>
													<span style="font-size:22px;font-weight:600">Report <?php echo $a; ?></span>
													<div>
														Title Report
													</div>
													<div style="margin-top:15px">
														<button class="uk-button uk-button-success fl-button" type="button">
															Download
														</button>
													</div>
												</div
											</td>
										</tr>
									</table>								    
								</div>	
							</li>
					<?php } ?>
				</ul>

				<a class="uk-position-center-left uk-position-small uk-hidden-hover uk-light" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover  uk-light" href="#" uk-slidenav-next uk-slider-item="next"></a>
			</div>
		</div>
	</div>


	<div id="mymodal" uk-modal >
		<div class="uk-modal-dialog uk-modal-body">
			<div>
				<div uk-grid class="uk-grid-small uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-2@s" align="left	">
					<div>
						<b>Jenis SOP</b>
						<input class="uk-input" type="text" placeholder="Masukan Jenis">
					</div>
					
					<div>
						<b>Judul</b>
						<input class="uk-input" type="text" placeholder="Masukan Judul">
					</div>

					<div>
						<b>Tanggal Upload</b>
						<input class="uk-input" type="text" placeholder="Masukan Tanggal Upload">
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
