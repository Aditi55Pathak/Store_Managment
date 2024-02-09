
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditEmppost' method='post'>
					<input type='hidden' id='idfrmEmppost' name='idEmppost' value=0>
					<div class='col-12'>
						<label class='form-label'>Type of Role</label>
							<input type='text' class='form-control' data-validation='required'  name='typepost' id='idedittypepost' placeholder='Enter Type post'>
					</div>

					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control' data-validation='required'  name='remarks' id='ideditremarks' placeholder='Enter Remarks'>
					</div>
					
						<div class='col-12'>
								<a id='dltEmppost' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditEmppost',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditEmppost');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/emppost/editEmppost',
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
									$.notify('Could not UpdateEmppost','error');
								}
								else
								{
									$('#modelEditEmppost').appendTo('body').modal('hide');
									$('#frmeditEmppost').get(0).reset();
									data=JSON.parse(data);
									$('#colEmppost').html(data.col);
									$('#fillEmppost').html(data.row);
									$.notify('Emppost Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltEmppost','click',function(){

					$('#modelDeleteEmppost').appendTo('body').modal('show');
					$('#modelEditEmppost').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteEmppost').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		