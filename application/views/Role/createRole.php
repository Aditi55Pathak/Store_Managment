
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmRole' method='post'>
					<div class='col-12'>
						<label class='form-label'>Typerole</label>
							<input type='text' class='form-control'  name='typerole' id='idtyperole' placeholder='Enter typerole'>
					</div>
					
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control'   name='remarks' id='idremarks' placeholder='Enter Remarks'>
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
					form : '#frmRole',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmRole');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/role/createRole',
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
									$.notify('Unable to CreateRole','error');
								}
								else
								{
									$('#modelRole').appendTo('body').modal('hide');
									$('#frmRole').get(0).reset();
									data=JSON.parse(data);
									$('#colRole').html(data.col);
									$('#fillRole').html(data.row);
									$.notify('Role Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		