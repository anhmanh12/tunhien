@extends('admin.master')
@section('Title', 'Menu')
@section('MenuHeader')
<style>

#addmenu{
	width: 100px;
	height: 44px;
	font-size: 18px;
	margin-bottom: 1%;
}
div.modal-dialog{
	width: 52%;
}
div.modal-content{
	margin-top: 15%;
}
#submitadd{
	width: 100px;
	height: 44px;
	font-size: 18px;
}
button.btn.btn-warning.btn-lg.btn-edit{
	width: 85px;
}
</style>
<script >
	function deletemenu() {
		return confirm("Do you want to delete?");
	}
</script>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Menu</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- form start-->
				<!-- {{url('admin/menu')}} action="#" method="POST"-->

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
								<h4 class="modal-title" id="myModalLabel">Add Menu</h4>
							</div>

							<div class="modal-body"><!-- action="api/create.php" -->
								<form data-toggle="validator"  method="POST" action="{{url('admin/menu')}}">

									<div class="form-group">
										<label class="control-label" for="addnamemenu">Name Menu:</label>
										<input type="text" name="addnamemenu" class="form-control" data-error="Please enter a Menu Name." required/>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="addlinkmenu">Link Menu:</label>
										<input type="text" name="addlinkmenu" class="form-control" data-error="Please enter a link menu." required/>
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
				<form action="" method="post">
					{!! csrf_field() !!}
					<table class="table table-bordered" >

						<tr style="background: #428bca;color: white;font-size: 20px;"">
							<th class="col-xs-3" style="text-align: center;">Name Menu</th>
							<th class="col-xs-7" style="text-align: center;">Link</th>
							<th class="col-xs-2" style="text-align: center;">Function</th>
						</tr>

<?php
$datamenu = file_get_contents(storage_path()."/jsonmenu/menu.json");
$datamenu = json_decode($datamenu, true);
if (!empty($datamenu)) {
	foreach ($datamenu as $key => $value) {
		?>
		<tr style="text-align: center;font-size: 22px;">
											<td>{{$value['NameMenu']}}</td>
											<td ><a href="{{$value['LinkMenu']}}" target="_blank">{{$value['LinkMenu']}}</a></td>
											<td style="text-align: center;">
												<button type="button" class="btn btn-warning btn-lg btn-edit" data-url={{route('menu.edit', $value['ID'])}} data-id={{$value['ID']}} data-toggle="modal" data-target="#edit-item-1">Edit
												</button>

												<a href="{{route('menu.delete')}}?id={{$value['ID']}}" name="deletemenu" data-id="{{$value['ID']}}" class="btn btn-danger btn-lg" onclick="return deletemenu();" >Delete</a>
											</td>
										</tr>
		<?php
	}
}
?>
					</table>
				</form>
				<div class="modal fade" id="edit-item-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel">Edit Menu</h4>
							</div>
							<div class="modal-body"><!-- action="api/create.php" -->
								<form data-toggle="validator"  method="POST" action="{{url('admin/menu')}}">
									<div class="form-group" style="display: none;">
										<label class="control-label" for="editnamemenu">ID Menu:</label>
										<input type="text" name="idmenu" class="form-control" readonly />

									</div>
									<div class="form-group">
										<label class="control-label" for="editnamemenu">Name Menu:</label>
										<input type="text" name="editnamemenu" class="form-control" data-error="Please enter a Menu Name." required/>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<label class="control-label" for="editlinkmenu">Link Menu:</label>
										<input type="text" name="editlinkmenu" class="form-control" data-error="Vui lòng nhập link menu." required/>
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
								$('.modal-content input[name=idmenu]').val(data.ID);
								$('.modal-content input[name=editnamemenu]').val(data.NameMenu);
								$('.modal-content input[name=editlinkmenu]').val(data.LinkMenu);
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