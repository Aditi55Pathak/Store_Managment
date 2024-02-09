
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmAllocate' method='post'>
					
					

							 <div class='col-12'>
						<label for='select' class='form-label' data-validation='required' >Item Name</label>
							<select class='form-control'  data-validation='required' name='iteminwardid' id='iditeminwardid'>
								<option class='active' value='0'>--Select --</option>
								<?php $dditems= $this->session->userdata('itemsresult');
					   foreach($dditems as $item){

						   echo "<option value='".$item['id']."'>"." ITEM ID : ".$item['id']." Name: ".$item['itemname']."  Qty Available:  "  .$item['unallotedqty']."</option>";
					   }
					   ?>
							</select>
					</div>
					
					<div class='col-12'>
						<label for='select' class='form-label' >Allocate To Department</label>
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
						<label class='form-label'  >Qty to be Allocated </label>
							<input type='text' value= "" class='form-control' data-validation='required' name='itemqtyalloted' id='iditemqtyalloted' placeholder='enter qty  '>
					</div>
					<div class='col-12'>
						<label for='select' class='form-label'  >Register Type</label>
							<select class='form-control'  data-validation='required' name='typeregisterid' id='idtyperegisterid'>
							<option class='active' value='0'>--Select --</option>
							<option class='active' value='Deadstock'>Deadstock</option>
								<option class='active' value='Furniture'>Furniture</option>
								<option class='active' value='Expendable'>Expendable</option>
								<option class='active' value='Consumable'>Consumable</option>
							</select>

					<div class='col-12'>
						<label class='form-label'>Empid</label>
							<input type='text' class='form-control' readonly='readonly' name='empid' id='idempid' placeholder='Enter Emp ID'>
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
					form : '#frmAllocate',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmAllocate');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/allocate/createAllocate',
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
									$.notify('Unable to CreateAllocate','error');
								}
								else
								{
									$('#modelAllocate').appendTo('body').modal('hide');
									$('#frmAllocate').get(0).reset();
									data=JSON.parse(data);
									$('#colAllocate').html(data.col);
									$('#fillAllocate').html(data.row);
									$.notify('Allocate Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		