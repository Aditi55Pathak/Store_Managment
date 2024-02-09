
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmRegister' method='post'>
					
				<div class='col-12'>
						<label for='select' class='form-label' data-validation='required' >Item Name</label>
							<select class='form-control'  data-validation='required' name='iteminwardid' id='iditeminwardid'>
								<option class='active' value='0'>--Select --</option>
								<?php $dditemsalloted= $this->session->userdata('itemsalloted');
					   foreach($dditemsalloted as $item){

						   echo "<option value='".$item['iteminwardid']."'>"." Central inward ID : ".$item['iteminwardid']." RegisterType: ".$item['typeregisterid']."  Qty:  "  .$item['itemqtyalloted']."</option>";
					   }
					   ?>
							</select>
					</div>
					
					<div class='col-12'>
						<label for='select' class='form-label' >Department</label>
							<select class='form-control'  data-validation='required' name='departmentid' id='iddepartmentid'>
								<option class='active' value='0'>--Select --</option>
								<?php $dd= $this->session->userdata('deptlist');
					   foreach($dd as $dept){

						   echo "<option value='".$dept['id']."'>".$dept['name']."</option>";
					   }
					   ?>
							</select>
					</div>
						

										
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control'  name='remarks' id='idremarks' placeholder='Enter remarks'>
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
					form : '#frmRegister',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmRegister');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/register/createRegister',
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
									$.notify('Unable to CreateRegister','error');
								}
								else
								{
									$('#modelRegister').appendTo('body').modal('hide');
									$('#frmRegister').get(0).reset();
									data=JSON.parse(data);
									$('#colRegister').html(data.col);
									$('#fillRegister').html(data.row);
									$.notify('Register Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		