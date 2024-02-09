
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmDepartment' method='post'>
					<div class='col-12'>
						<label class='form-label'>Name</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='name' id='idname' placeholder='Enter Name'>
					</div>
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control'  name='remarks' id='idremarks' placeholder='Enter Remarks'>
					</div>
					
					
					</div>
					
						<div class='col-12'>
								<input type='submit' class='btn btn-success' value='Create'>
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmDepartment',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmDepartment');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/department/createDepartment',
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
								if(data==0)
								{
									$.notify('Unable to CreateDepartment','error');
								}
								else
								{
									$('#modelDepartment').appendTo('body').modal('hide');
									$('#frmDepartment').get(0).reset();
									data=JSON.parse(data);
									$('#colDepartment').html(data.col);
									$('#fillDepartment').html(data.row);
									$.notify('Department Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		