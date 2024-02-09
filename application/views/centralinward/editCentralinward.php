
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditCEntralinward' method='post'>
					<input type='hidden' id='idfrmCentralinward' name='idCentralinward' value=0>
					<div class='col-12'>
						<label class='form-label'>podate</label>
							<input type='date' class='form-control' data-validation='required' 
							 name='podate' id='ideditpodate' placeholder='Enter Iteminwardid'>
					</div>

					<div class='col-12'>
						<label class='form-label'>ponumber</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='ponumber' id='ideditponumber' placeholder='Enter Ponumber'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Item name</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='itemname' id='idedititemname' placeholder='Enter Price'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Item qty</label>
							<input type='int' class='form-control' data-validation='required' 
							 name='itemqty' id='idedititemqty' placeholder='Enter Qty'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Item measure type</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='itemmeasuretype' id='idedititemmeasuretype' placeholder='Enter measure type'>
					</div>

					<div class='col-12'>
						<label for='address' class='form-label'>Description</label>
							<textarea class='form-control' rows='3' name='description' id='ideditdescription' 
							placeholder='Enter Description' data-validation='required' ></textarea>
					</div>

					<div class='col-12'>
						<label class='form-label'>Unit cost/label>
							<input type='text' class='form-control' data-validation='required' 
							 name='unitcost' id='ideditunitcost' placeholder='Enter Unitcost'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Total cost</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='totalcost' id='idedittotalcost' placeholder='Enter totalcost'>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>Type register ID</label>
							<select class='form-control' name='typeregisterid' id='idedittyperegisterid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>Allocated status</label>
							<select class='form-control' name='allocatedstatus' id='ideditallocatedstatus'>
								<option class='active' value='1'>Yes</option>
								<option class='active' value='2'>No</option>
								<option class='active' value='0'>Deallocated</option>
							</select>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>maintaince contract</label>
							<select class='form-control' name='mntcontract' id='ideditmntcontract'>
								<option class='active' value='1'>Yes</option>
								<option class='active' value='2'>No</option>
								<option class='active' value='0'>Unknown</option>
							</select>
					</div>

					<div class='col-12'>
						<label for='select' class='form-label'>Emp ID:</label>
							<select class='form-control' name='empid' id='ideditempid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>

					<div class='col-12'>
						<label class='form-label'>Entry date</label>
							<input type='date' class='form-control' data-validation='required' 
							 name='entrydate' id='ideditentrydate' placeholder='Enter Entrydate'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control' readonly='readonly' name='remarks' id='ideditremarks' placeholder='Enter remarks'>
					</div>
					
						<div class='col-12'>
								<a id='dltCentralinward' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditCentralinward',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditCentralinward');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/centralinward/editCentralinward',
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
									$.notify('Could not UpdateCentralinward','error');
								}
								else
								{
									$('#modelEditCentralinward').appendTo('body').modal('hide');
									$('#frmeditCentralinward').get(0).reset();
									data=JSON.parse(data);
									$('#colCentralinward').html(data.col);
									$('#fillCentralinward').html(data.row);
									$.notify('Centralinward Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltCentralinward','click',function(){

					$('#modelDeleteCentralinward').appendTo('body').modal('show');
					$('#modelEditCentralinward').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteCentralinward').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		