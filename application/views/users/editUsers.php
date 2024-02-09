
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditUsers' method='post'>
					<input type='hidden' id='idfrmUsers' name='idUsers' value=0>
					<div class='col-12'>
						<label class='form-label'>Emp name</label>
							<input type='text' class='form-control' data-validation='required'  name='empname' id='ideditempname' placeholder='Enter Name'>
					</div>
					<div class='col-12'>
						<label for='select' class='form-label'>Department ID</label>
							<select class='form-control' name='departmentid' id='ideditdepartmentid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>Emp post ID</label>
							<select class='form-control' name='emppostid' id='ideditemppostid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					<div class='col-12'>
						<label for='select' class='form-label'>Role ID</label>
							<select class='form-control' name='roleid' id='ideditroleid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>

					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='remarks' id='ideditremarks' placeholder='Enter Remarks'>
					</div>
					
						<div class='col-12'>
								<a id='dltUsers' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditUsers',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditUsers');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/users/editUsers',
							type:'POST',
							data : frmdt,
							processData: false,
							contentType: false,
							async:true,
							beforeSend: function(data) {
								$('#load').show();
							},
							complete: function(data) {
								$('#load').hide();
							},
							success:function(data){
								if(data=='0')
								{
									$.notify('Could not UpdateUsers','error');
								}
								else
								{
									$('#modelEditUsers').appendTo('body').modal('hide');
									$('#frmeditUsers').get(0).reset();
									data=JSON.parse(data);
									$('#colUsers').html(data.col);
									$('#fillUsers').html(data.row);
									$.notify('Users Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltUsers','click',function(){

					$('#modelDeleteUsers').appendTo('body').modal('show');
					$('#modelEditUsers').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteUsers').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		