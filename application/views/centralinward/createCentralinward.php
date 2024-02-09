
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmCentralinward' method='post'>
					<div class='col-12'>
						<label class='form-label'>podate</label>
							<input type='date' class='form-control' data-validation='required' 
							 name='podate' id='idpodate' placeholder='Enter Iteminwardid'>
					</div>

					<div class='col-12'>
						<label class='form-label'>ponumber</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='ponumber' id='idponumber' placeholder='Enter Ponumber'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Item name</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='itemname' id='iditemname' placeholder='Enter item name'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Item qty</label>
							<input type='int' class='form-control' data-validation='required' 
							 name='itemqty' id='iditemqty' placeholder='Enter Qty'>
					</div>

					
					<div class='col-12'>
						<label for='select' class='form-label'>Item measure type</label>
							<select class='form-control'  name='itemmeasuretype' id='iditemmeasuretype'>
							<option class='active' value='0'>--Select --</option>
								<option class='active' value='nos'>nos</option>
								<option class='active' value='litres'>litres</option>
								<option class='active' value='kgs'>kgs</option>
								<option class='active' value='meters'>meters</option>

							</select>
					</div>

					<div class='col-12'>
						<label for='address' class='form-label'>Description</label>
							<textarea class='form-control' rows='3' name='description' id='iddescription' placeholder='Enter Description' ></textarea>
					</div>

					<div class='col-12'>
						<label class='form-label'>Unit cost</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='unitcost' id='idunitcost' placeholder='Enter Unitcost'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Total cost</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='totalcost' id='idittotalcost' placeholder='Enter totalcost'>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>Register Type</label>
							<select class='form-control' name='typeregisterid' id='idtyperegisterid'>
							<option class='active' value='0'>--Select --</option>
							<option class='active' value='Deadstock'>Deadstock</option>
								<option class='active' value='Furniture'>Furniture</option>
								<option class='active' value='Expendable'>Expendable</option>
								<option class='active' value='Consumable'>Consumable</option>
							</select>
					</div>

					

					<div class='col-12'>
						<label for='select' class='form-label'>maintaince contract</label>
							<select class='form-control' name='mntcontract' id='idmntcontract'>
								<option class='active' value='YES'>Yes</option>
								<option class='active' value='NO'>No</option>
								<option class='active' value='Unknown'>Unknown</option>
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
					form : '#frmCentralinward',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmCentralinward');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/centralinward/createCentralinward',
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
									$.notify('Unable to CreateCentralinward','error');
								}
								else
								{
									$('#modelCentralinward').appendTo('body').modal('hide');
									$('#frmCentralinward').get(0).reset();
									data=JSON.parse(data);
									$('#colCentralinward').html(data.col);
									$('#fillCentralinward').html(data.row);
									$.notify('Centralinward Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		