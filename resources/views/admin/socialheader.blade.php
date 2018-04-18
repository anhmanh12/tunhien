@extends('admin.master')
@section('Title', 'Social Header')
@section('SocialHeader')
<style>
div.modal-dialog{
	width: 52%;
}
div.modal-content{
	margin-top: 15%;
}
#addmenu{
	width: 100px;
	height: 44px;
	font-size: 18px;
	margin-bottom: 1%;
}
button.btn.btn-warning.btn-lg.btn-edit{
	width: 85px;
}
</style>
<script >
	function deletesocial() {
		return confirm("Do you want to delete ?");
	}
</script>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Social Header</h3>

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
					<button type="button" id="addmenu" class="btn btn-success" data-toggle="modal" data-target="#add-item-1">
						Add
					</button>
				</div>
				<form action="" method="post">
					{!! csrf_field() !!}
					<table class="table table-bordered" >

						<tr style="background: #428bca;color: white;font-size: 20px;"">
							<th class="col-xs-3" style="text-align: center;">Share</th>
							<th class="col-xs-7" style="text-align: center;">Link</th>
							<th class="col-xs-2" style="text-align: center;">Functions</th>
						</tr>

<?php
$datasocial = file_get_contents(storage_path()."/jsonSocial/socialheader.json");
$datasocial = json_decode($datasocial, true);
if (!empty($datasocial)) {
	foreach ($datasocial as $key => $value) {
		?>
		<tr style="text-align: center;font-size: 22px;">
															<td><i class="fa fa-{{$value['NameSocial']}}" aria-hidden="true"></i></td>
															<td >{{$value['LinkSocial']}}</td>
															<td style="text-align: center;">
																<button type="button" class="btn btn-warning btn-lg btn-edit" data-url={{route('socialheader.edit', $value['ID'])}} data-id="{{$value['ID']}}" data-toggle="modal" data-target="#edit-item-1">Edit
																</button>
																<a href="{{route('socialheader.delete')}}?id={{$value['ID']}}" name="deletesocial" data-id="{{$value['ID']}}" class="btn btn-danger btn-lg" onclick="return deletesocial();" >Delete</a>
															</td>
														</tr>
		<?php }}?>
							</table>
						</form>
						<div class="modal fade" id="add-item-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="myModalLabel">Add Social</h4>
									</div>
									<div class="modal-body"><!-- action="api/create.php" -->
										<form data-toggle="validator"  method="POST" action="{{url('admin/socialheader')}}">

											<div class="form-group">
												<label for="sel1">Select Social :</label>
												<select name="selectsocial" class="form-control" >
													<option value="facebook">Facebook</option>
													<option value="youtube-play">Youtube</option>
													<option value="vimeo">Vimeo</option>
													<option value="twitter">Twitter</option>
													<option value="delicious">Delicious</option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label" for="addlinksocial">Link Menu:</label>
												<input type="text" name="addlinksocial" class="form-control" data-error="Please enter link Social." required/>
												<div class="help-block with-errors"></div>
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

						<div class="modal fade" id="edit-item-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="myModalLabel">Edit Social</h4>
									</div>
									<div class="modal-body"><!-- action="api/create.php" -->
										<form data-toggle="validator"  method="POST" action="{{url('admin/socialheader')}}">
											<div class="form-group" style="display: none;">
												<label class="control-label" for="editsocila">ID Social:</label>
												<input type="text" name="idsocial" class="form-control" readonly />

											</div>
											<div class="form-group">
												<label for="sel1">Select Social :</label>
												<select class="form-control" name="editselect" ">
													<option value="facebook">Facebook</option>
													<option value="youtube-play">Youtube</option>
													<option value="vimeo">Vimeo</option>
													<option value="twitter">Twitter</option>
													<option value="delicious">Delicious</option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label" for="editlinksocial">Link Menu:</label>
												<input type="text" name="editlinksocial" class="form-control" data-error="Please enter link Social." required/>
												<div class="help-block with-errors"></div>
											</div>

											<div class="form-group">
												<button type="submit" id="submitedit" name="submitedit" class="btn crud-submit btn-success">Submit</button>
											</div>
											{!! csrf_field() !!}
										</form>

									</div>
								</div>

							</div>
						</div>
						<!-- end form -->
					</div>
					<!-- /.box-body -->
				</div>
				@stop

				@section('script')
				<script type="text/javascript">
					$(document).ready(function(){

						$(document).on('click', '.btn-edit', function(e){
							e.preventDefault();
							var $url = $(this).data('url');
							$.ajax({
								url     : $url,
								method  : 'get',
								data    : {

								},
								headers:
								{
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
								success : function(response){
									console.log('Success: ' + response);

									if(response && response.error == false){
										var data = response.data;
										$('.modal-content input[name=idsocial]').val(data.ID);
										$('.modal-content select[name=editselect]').val(data.NameSocial);
										$('.modal-content input[name=editlinksocial]').val(data.LinkSocial);
									}
								},
								error: function(response){
									console.log('Error: ' + response);
								}
							});
						})

					});
				</script>
				@stop