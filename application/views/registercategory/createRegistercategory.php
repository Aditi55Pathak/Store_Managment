
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmRegistercategory' method='post'>
					<div class='col-12'>
						<label for='select' class='form-label'>Type of register</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='typeregister' id='idtyperegister' placeholder='Enter Name'>
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
					form : '#frmRegistercategory',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmRegistercategory');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/registercategory/createRegistercategory',
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
									$.notify('Unable to CreateRegistercategory','error');
								}
								else
								{
									$('#modelRegistercategory').appendTo('body').modal('hide');
									$('#frmRegistercategory').get(0).reset();
									data=JSON.parse(data);
									$('#colRegistercategory').html(data.col);
									$('#fillRegistercategory').html(data.row);
									$.notify('Registercategory Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		