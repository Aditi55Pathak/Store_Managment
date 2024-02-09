
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditRegistercategory' method='post'>
					<input type='hidden' id='idfrmRegistercategory' name='idRegistercategory' value=0>

					<div class='col-12'>
						<label for='select' class='form-label'>Type of register</label>
							<select class='form-control' name='typeregister' id='idedittyperegister'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control' data-validation='required' 
							 name='remarks' id='ideditremarks' placeholder='Enter Remarks'>
					</div>
						<div class='col-12'>
								<a id='dltRegistercategory' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditRegistercategory',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditRegistercategory');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/registercategory/editRegistercategory',
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
									$.notify('Could not UpdateRegistercategory','error');
								}
								else
								{
									$('#modelEditRegistercategory').appendTo('body').modal('hide');
									$('#frmeditRegistercategory').get(0).reset();
									data=JSON.parse(data);
									$('#colRegistercategory').html(data.col);
									$('#fillRegistercategory').html(data.row);
									$.notify('Registercategory Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltRegistercategory','click',function(){

					$('#modelDeletRegistercategory').appendTo('body').modal('show');
					$('#modelEditRegistercategory').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteRegistercategory').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		