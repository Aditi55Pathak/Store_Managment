
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditDepartment' method='post'>
					<input type='hidden' id='idfrmDepartment' name='idDepartment' value=0>
					<div class='col-12'>
						<label class='form-label'>Name</label>
							<input type='text' class='form-control' data-validation='required'  name='name' id='ideditname' placeholder='Enter Name'>
					</div>
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control' data-validation='custom' data-validation-regexp='^([0-9]+)$' name='remarks' id='ideditremarks' placeholder='Enter Remarks'>
					</div>
					
					
					
						<div class='col-12'>
								<a id='dltDepartment' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditDepartment',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditDepartment');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/department/editDepartment',
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
									$.notify('Could not UpdateDepartment','error');
								}
								else
								{
									$('#modelEditDepartment').appendTo('body').modal('hide');
									$('#frmeditDepartment').get(0).reset();
									data=JSON.parse(data);
									$('#colDepartment').html(data.col);
									$('#fillDepartment').html(data.row);
									$.notify('Department Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltDepartment','click',function(){

					$('#modelDeleteDepartment').appendTo('body').modal('show');
					$('#modelEditDepartment').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteDepartment').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		