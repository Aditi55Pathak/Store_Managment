
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3'  id='frmPurchaserequestdetails' method='post'>
					<div class='col-12'>
						<label for='select' class='form-label'>Purchaserequests_id</label>
							<select class='form-control' name='purchaseRequests_id' id='idpurchaseRequests_id'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					<div class='col-12'>
						<label for='select' class='form-label'>Articles_id</label>
							<select class='form-control' name='articles_id' id='idarticles_id'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					<div class='col-12'>
						<label class='form-label'>Qty</label>
							<input type='text' class='form-control'  data-validation='custom' data-validation-regexp='^([0-9]+)$' name='qty' id='idqty' placeholder='Enter Qty'>
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
					form : '#frmPurchaserequestdetails',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmPurchaserequestdetails');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/purchaserequestdetails/createPurchaserequestdetails',
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
									$.notify('Unable to CreatePurchaserequestdetails','error');
								}
								else
								{
									$('#modelPurchaserequestdetails').appendTo('body').modal('hide');
									$('#frmPurchaserequestdetails').get(0).reset();
									data=JSON.parse(data);
									$('#colPurchaserequestdetails').html(data.col);
									$('#fillPurchaserequestdetails').html(data.row);
									$.notify('Purchaserequestdetails Successfully Created','success');
							
								}
							}
						});
						return false; 
					}
				});
			});
		</script>
		