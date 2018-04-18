@extends('admin.master')
@section('Title', 'Slide Show')
@section('slideshow')
<style >
#addmenu{
	width: 100px;
	height: 44px;
	font-size: 18px;
	margin-bottom: 1%;
}
#files{
	display: block;
	opacity: 0;
	font-size: 32px !important;
	position: absolute;
}
#submitadd{
	margin-left: 2.4%;
}
#output{
	width: 100%;
	margin-top: 1%;
	margin-bottom: 1%;
}
</style>
<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		$("#output").css('display','block');
	};
	function deleteimg() {
		return confirm("Do you want to delete ?");
	}
</script>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Slide Show</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- form start-->

				<div class="pull-right">
					<button type="button" id="addmenu" class="btn btn-success" data-toggle="modal" data-target="#create-item">
						Add
					</button>
				</div>

				<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel">Add Image</h4>
							</div>
							<!-- {{url('admin/menu')}} -->
							<div class="modal-body"><!-- action="api/create.php" -->
								<form data-toggle="validator"  method="POST" enctype="multipart/form-data" role="form" action="">

									<div class="col-xs-12">
										<button type="button" class="btn btn-success btn-block withImageAndIcon">
											<input type="file" name="files" id="files" accept="image/*" onchange="loadFile(event)" required>
											<div class="fa-lg withFolder32">
												<i class="fa fa-plus"></i>
											</div>
											Select Image
										</button>
									</div>
									<div class="col-xs-12">
										<img id="output"/>
									</div>

									<div class="form-group">
										<button type="submit" id="submitadd" name="submitadd" class="btn crud-submit btn-success">Submit</button>
									</div>
									{!! csrf_field() !!}
								</form>

							</div>
						</div>

					</div>
				</div>
				<form action="" method="post">
					{!! csrf_field() !!}
					<table class="table table-bordered" >

						<tr style="background: #428bca;color: white;font-size: 20px;"">
							<th class="col-xs-1" style="text-align: center;">
								STT
							</th>
							<th class="col-xs-3" style="text-align: center;">
								Images
							</th>
							<th class="col-xs-6" style="text-align: center;">
								Name Image
							</th>
							<th class="col-xs-2" style="text-align: center;">Function</th>
						</tr>
<?php
$data = file_get_contents(storage_path()."/jsonSlideshow/slideshow.json");
$data = json_decode($data, true);
if (!empty($data)) {
	foreach ($data as $key => $value) {
		?>
		<tr style="text-align: center;font-size: 22px;">
											<td ><p style="margin-top: 34%;">{{$value['ID']+1}}</p></td>
											<td>
												<img style="height: 100px;" src="@if($value['NameImage']!=null) {{asset('public/tunhien/images')."/". $value['NameImage']}} @endif ">
											</td>
											<td ><p style="margin-top: 4.5%;">{{$value['NameImage']}}</p></td>
											<td style="text-align: center;">
												<a style="margin-top: 10%;" href="{{route('slideshow.delete')}}?id={{$value['ID']}}" name="deleteimg" data-id="{{$value['ID']}}" class="btn btn-danger btn-lg" onclick="return deleteimg();" >Delete</a>
											</td>
										</tr>
		<?php }}?>
							</table>
						</form>

						<!-- end form -->
					</div>
					<!-- /.box-body -->
				</div>
				@stop