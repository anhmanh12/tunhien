@extends('admin.master')
@section('Title', 'About')
@section('about')
<style>
div.modal-dialog{
	width: 52%;
}
div.modal-content{
	margin-top: 5%;
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
	function deleteabout() {
		return confirm("Do you want to delete ?");
	}
</script>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">About</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">

				</div>
			</div>

			<div class="box-body">
				<!-- form start-->
				<form action="" method="POST">
					<div class="pull-right">
						<button type="button" name="buttonadd" id="addmenu" class="btn btn-success" data-toggle="modal" data-target="#add-item-1">
							Add
						</button>
					</div>
				</form>
				<form action="" method="post">
					{!! csrf_field() !!}
					<table class="table table-bordered" >

						<tr style="background: #428bca;color: white;font-size: 20px;"">
							<th class="col-xs-1" style="text-align: center;">Icon</th>
							<th class="col-xs-1" style="text-align: center;">Title Top</th>
							<th class="col-xs-1" style="text-align: center;">Title Bot</th>
							<th class="col-xs-4" style="text-align: center;">Text</th>
							<th class="col-xs-3" style="text-align: center;">Link</th>
							<th class="col-xs-2" style="text-align: center;">Function</th>
						</tr>
<?php $dataabout = file_get_contents(storage_path()."/jsonabout/about.json");
$dataabout       = json_decode($dataabout, true);
if (!empty($dataabout)) {
	foreach ($dataabout as $key => $value) {?>
		<tr style="text-align: center;font-size: 22px;">
										<td><i class="fa fa-{{$value['NameIcon']}}" style="backface-visibility: hidden;margin-top: 40%;"></i></td>
										<td ><p style="margin-top: 38%;">{{$value['TitleTop']}}</p></td>
										<td ><p style="margin-top: 38%;">{{$value['TitleBot']}}</p></td>
										<td >{{$value['Text']}}</td>
										<td ><a href="{{$value['Link']}}" target="_blank"><p style="margin-top: 8%;" >{{$value['Link']}}</p></a></td>
										<td style="text-align: center;">
											<p style="margin-top: 11%;">
												<button name="buttonedit" type="button" class="btn btn-warning btn-lg btn-edit" data-url="{{route('about.edit', $value['ID'])}}" data-id="{{$value['ID']}}" data-toggle="modal" data-target="#edit-item-1">Edit
												</button>
												<a href="{{route('about.delete')}}?id={{$value['ID']}}" name="deletesocial" data-id="{{$value['ID']}}" class="btn btn-danger btn-lg" onclick="return deleteabout();" >Delete</a>
											</p>
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
									<h4 class="modal-title" id="myModalLabel">Add Item About</h4>
								</div>
								<div class="modal-body"><!-- action="api/create.php" -->
									<form data-toggle="validator"  method="POST" action="">

										<div class="form-group">
											<label for="sel1">Select icon :</label>
											<select name="selecticonabout" class="form-control" >
												<option value="wrench">Wrench</option>
												<option value="users">Users</option>
												<option value="paper-plane-o">Paper plane</option>
												<option value="archive">Archive</option>

											</select>
										</div>
										<div class="form-group">
											<label class="control-label" for="addtitletop">Title Top:</label>
											<input type="text" name="addtitletop" class="form-control" data-error="Please enter title top." required/>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label class="control-label" for="addtitlebot">Title Bot:</label>
											<input type="text" name="addtitlebot" class="form-control" data-error="Please enter title bot." required/>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label class="control-label" for="addtext">Text :</label>
											<textarea name="addtext" class="form-control" data-error="Please enter text." required/></textarea>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label class="control-label" for="addlink">Link :</label>
											<input type="text" name="addlink" class="form-control" data-error="Please enter link." required/>
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
									<h4 class="modal-title" id="myModalLabel">edit Item About</h4>
								</div>
								<div class="modal-body"><!-- action="api/create.php" -->
									<form data-toggle="validator"  method="POST" action="">
										<div class="form-group" style="display: none;">
											<label class="control-label" for="idabout">ID About:</label>
											<input type="text" name="idabout" class="form-control" readonly />

										</div>

										<div class="form-group">
											<label for="sel1">Select icon :</label>
											<select name="selecticonabout" class="form-control" >
												<option value="wrench">Wrench</option>
												<option value="users">Users</option>
												<option value="paper-plane-o">Paper plane</option>
												<option value="archive">Archive</option>

											</select>
										</div>
										<div class="form-group">
											<label class="control-label" for="edittitletop">Title Top:</label>
											<input type="text" name="edittitletop" class="form-control" data-error="Please enter title top." required/>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label class="control-label" for="edittitlebot">Title Bot:</label>
											<input type="text" name="edittitlebot" class="form-control" data-error="Please enter title bot." required/>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label class="control-label" for="edittext">Text :</label>
											<textarea name="edittext" class="form-control" data-error="Please enter text." required/></textarea>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label class="control-label" for="editlink">Link :</label>
											<input type="text" name="editlink" class="form-control" data-error="Please enter link." required/>
											<div class="help-block with-errors"></div>
										</div>

										<div class="form-group">
											<button type="submit" id="submitadd" name="submitedit" class="btn crud-submit btn-success">Submit</button>
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
									$('.modal-content input[name=idabout]').val(data.ID);
									$('.modal-content select[name=selecticonabout]').val(data.NameIcon);
									$('.modal-content input[name=edittitletop]').val(data.TitleTop);
									$('.modal-content input[name=edittitlebot]').val(data.TitleBot);
									$('.modal-content textarea[name=edittext]').val(data.Text);
									$('.modal-content input[name=editlink]').val(data.Link);
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