@extends('admin.master')
@section('Title', 'Logo')
<!-- @section('titlespan', 'Header') -->
@section('LogoHeader')
<link rel="stylesheet" href="{{ asset('public/logo') }}/logocss.css">
<link rel="stylesheet" href="{{ asset('public/logo') }}/logojs.js">
<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		$("#output").css('display','block');
	};

	var loadFileSocial = function(event) {
		var output = document.getElementById('outimg');
		output.src = URL.createObjectURL(event.target.files[0]);
		$("#outimg").css('display','block');
	};

	$(document).ready(function() {
		$("#delete").click(function() {
			if (confirm("Do you want to delete?")) {
				$(this).closest("img").fadeOut();
				$("#files").val(null); //xóa tên của file trong input
				$("#output").hide('slow');
			} else
			return false;
		});
	});

	$(document).ready(function() {
		$("#deletesologan").click(function() {
			if (confirm("Do you want to delete?")) {
				$(this).closest("img").fadeOut();
				$("#filesologan").val(null); //xóa tên của file trong input
				$("#outimg").hide('slow');
			} else
			return false;
		});
	});

</script>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Logo</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<form id="login-form" action="{{url('admin/logo')}}" method="POST" enctype="multipart/form-data" role="form" style="display: block;">
					<div class="container">
						<div class="row">
							<div class="col-xs-4">
								<button type="button" class="btn btn-success btn-block withImageAndIcon">
									<input type="file" name="files" id="files" accept="image/*" onchange="loadFile(event)">
									<div class="fa-lg withFolder32">
										<i class="fa fa-plus"></i>
									</div>
									Select Image
								</button>
							</div>
							<div class="col-xs-4">
								<button type="submit" id="upload" class="btn btn-primary btn-block withImageAndIcon" name="upload">
									<div class="fa-lg withFolder32">
										<i class="glyphicon glyphicon-upload"></i>
									</div>
									Start Upload
								</button>
							</div>
							<div class="col-xs-4">
								<button type="submit" id="delete" name="delete" class="btn btn-danger btn-block withImageAndIcon">
									<div class="fa-lg withFolder32">
										<i class="glyphicon glyphicon-trash"></i>
									</div>
									Delete
								</button>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12">
<?php
$name = file_get_contents(__DIR__ ."/../../../storage/jsonLogo/logo.json");
$name = json_decode($name, true);
?>
<img style="width: 210px;" src="@if($name['Image']!=null) {{asset('public/tunhien/images')."/". $name['Image']}} @endif" id="output"/>
							</div>
						</div>
					</div>
					{!! csrf_field() !!}
				</form>

			</div>
			<!-- /.box-body -->
		</div>
		@stop

		@section('SologanHeader')
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Sologan</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<form id="login-form" action="{{url('admin/logo')}}" method="POST" enctype="multipart/form-data" role="form" style="display: block;">
							<div class="container">
								<div class="row">
									<div class="col-xs-4">
										<button type="button" class="btn btn-success btn-block withImageAndIcon">
											<input type="file" name="filesologan" id="filesologan" accept="image/*" onchange="loadFileSocial(event)">
											<div class="fa-lg withFolder32">
												<i class="fa fa-plus"></i>
											</div>
											Select Image
										</button>
									</div>
									<div class="col-xs-4">
										<button type="submit" id="uploadsologan" class="btn btn-primary btn-block withImageAndIcon" name="uploadsologan">
											<div class="fa-lg withFolder32">
												<i class="glyphicon glyphicon-upload"></i>
											</div>
											Start Upload
										</button>
									</div>
									<div class="col-xs-4">
										<button type="submit" id="deletesologan" name="deletesologan" class="btn btn-danger btn-block withImageAndIcon">
											<div class="fa-lg withFolder32">
												<i class="glyphicon glyphicon-trash"></i>
											</div>
											Delete
										</button>
									</div>
								</div><br>
								<div class="row">
									<div class="col-xs-12">
<?php
$sologan = file_get_contents(__DIR__ ."/../../../storage/jsonLogo/sologan.json");
$sologan = json_decode($sologan, true);
?>
										<img style="width: 210px;" src="@if($sologan['Image']!=null) {{asset('public/tunhien')."/". $sologan['Image']}} @endif" id="outimg"/>
									</div>
								</div>
							</div>
							{!! csrf_field() !!}
						</form>
					</div>
					<!-- /.box-body -->
				</div>

				@stop