
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmEmppost' method='post'>
					<div class='col-12'>
						<label class='form-label'>Type of post</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='typepost' id='idtypepost' placeholder='Enter Typepost'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control' data-validation='required' 
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
					form : '#frmEmppost',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmEmppost');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/emppost/createEmppost',
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
									$.notify('Unable to CreateEmppost','error');
								}
								else
								{
									$('#modelEmppost').appendTo('body').modal('hide');
									$('#frmEmppost').get(0).reset();
									data=JSON.parse(data);
									$('#colEmppost').html(data.col);
									$('#fillEmppost').html(data.row);
									$.notify('Emppost Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		