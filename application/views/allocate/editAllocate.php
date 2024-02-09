
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditAllocate' method='post'>
					<input type='hidden' id='idfrmAllocate' name='idAllocate' value=0>
					<div class='col-12'>
						<label class='form-label'>Iteminwardid</label>
							<input type='text' class='form-control' data-validation='required'  name='itminwardid' id='itminwardid' placeholder='Enter Iteminwardid'>
					</div>
					
					<div class='col-12'>
						<label for='select' class='form-label'>Departmentid</label>
							<select class='form-control' name='departmentid' id='editdepartmentid'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					<div class='col-12'>
						<label class='form-label'>Allocationdate/label>
							<input type='text' class='form-control'  readonly='readonly' name='allocationdate' id='ideditallocationdate' placeholder='Enter Date of allocation'>
					</div>
					
					<div class='col-12'>
						<label class='form-label'>Empid</label>
							<input type='text' class='form-control'  readonly='readonly' name='empid' id='ideditempid' placeholder='Enter emp ID'>
					</div>
					
					
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control'  readonly='readonly' name='remarks' id='ideditremarks' placeholder='Enter Remarks'>
					</div>

					<div class='col-12'>
								<a id='dltAllocate' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
					
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditAllocate',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditAllocate');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/allocate/editAllocate',
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
									$.notify('Could not UpdateAllocate','error');
								}
								else
								{
									$('#modelEditAllocate').appendTo('body').modal('hide');
									$('#frmeditAllocate').get(0).reset();
									data=JSON.parse(data);
									$('#colAllocate').html(data.col);
									$('#fillAllocate').html(data.row);
									$.notify('Allocate Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltAllocate','click',function(){

					$('#modelDeleteAllocate').appendTo('body').modal('show');
					$('#modelEditAllocate').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteAllocate').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		