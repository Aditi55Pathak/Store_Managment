
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmUsers' method='post'>
					<div class='col-12'>
						<label class='form-label'>Emp name</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='empname' id='idempname' placeholder='Enter Empname'>
					</div>
					
					
					<div class='col-12'>
						<label for='select' class='form-label'>Department</label>
							<select class='form-control' name='departmentid' id='iddepartmentid'>
								<option class='active' value='0'>--Select Default--</option>
								<?php $dd= $this->session->userdata('deptlist');
					   foreach($dd as $dept){

						   echo "<option value='".$dept['id']."'>".$dept['name']."</option>";
					   }
					   ?>
							</select>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>Emp post ID</label>
							<select class='form-control' name='emppostid' id='idemppostid'>
								<option class='active' value='0'>--Select Default--</option>
								<?php $dd= $this->session->userdata('postlist');
					   foreach($dd as $post){

						   echo "<option value='".$post['id']."'>".$post['typepost']."</option>";
					   }
					   ?>
							</select>
					</div>
					<div class='col-12'>
						<label for='select' class='form-label'>Role ID</label>
							<select class='form-control' name='roleid' id='idroleid'>
								<option class='active' value='0'>--Select Default--</option>
								<?php $dd= $this->session->userdata('rolelist');
								foreach($dd as $role){
		 
									echo "<option value='".$role['id']."'>".$role['typerole']."</option>";
								}
								?>
							</select>
					</div>
					<div class='col-12'>
						<label class='form-label'>Username</label>
							<input type='text' class='form-control' data-validation='required'  
							 name='username' id='idusername' placeholder='Enter username'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Password</label>
							<input type='password' class='form-control' data-validation='required'  
							 name='password' id='idpassword' placeholder='Enter password'>
					</div>
					<div class='col-12'>
						<label for='select' class='form-label'>Department Access</label>
							<select class='form-control'  name='departmentaccessid' id='iddepartmentaccessid'>
								<option class='active' value='0'>--Select Default--</option>
								<?php $dd= $this->session->userdata('deptlist');
					   foreach($dd as $dept){

						   echo "<option value='".$dept['id']."'>".$dept['name']."</option>";
					   }
					   ?>
							</select>
					</div>

					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control'  
							 name='remarks' id='idremarks' placeholder='Enter Remarks'>
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
					form : '#frmUsers',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmUsers');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/users/createUsers',
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
									$.notify('Unable to CreateUsers','error');
								}
								else
								{
									$('#modelUsers').appendTo('body').modal('hide');
									$('#frmUsers').get(0).reset();
									data=JSON.parse(data);
									$('#colUsers').html(data.col);
									$('#fillUsers').html(data.row);
									$.notify('Users Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		