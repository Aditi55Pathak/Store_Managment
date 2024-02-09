
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditRegister' method='post'>
				    <div class='col-12'>
						<label class='form-label'>Item inward ID</label>
							<input type='int' class='form-control' readonly='readonly' name='iteminwardid' id='idedititeminwardid' placeholder='Enter Iteminwardid'>
					</div>
					
					<div class='col-12'>
						<label for='select' class='form-label'>Department ID</label>
							<input type='int'select class='form-control' name='departmentid' id='ideditdepartmentid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					
					<div class='col-12'>
						<label for='select' class='form-label'>Register category ID</label>
							<select class='form-control' name='registercategoryid' id='ideditregistercategoryid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>

					<div class='col-12'>
						<label class='form-label'>Record date</label>
							<input type='date' class='form-control' data-validation='required' 
							 name='recorddate' id='ideditrecorddate' placeholder='Enter Record date'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Emp ID</label>
							<input type='int' class='form-control' readonly='readonly' name='empid' id='ideditempid' placeholder='Enter Empid'>
					</div>
						<div class='col-12'>
								<a id='dltRegister' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditRegister',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditRegister');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/register/editRegister',
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
									$.notify('Could not UpdateRegister','error');
								}
								else
								{
									$('#modelEditRegister').appendTo('body').modal('hide');
									$('#frmeditRegister').get(0).reset();
									data=JSON.parse(data);
									$('#colRegister').html(data.col);
									$('#fillRegister').html(data.row);
									$.notify('Register Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltRegister','click',function(){

					$('#modelDeleteRegister').appendTo('body').modal('show');
					$('#modelEditRegister').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteRegister').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		