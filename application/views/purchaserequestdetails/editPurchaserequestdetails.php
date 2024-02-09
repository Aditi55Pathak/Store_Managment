
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditPurchaserequestdetails' method='post'>
					<input type='hidden' id='idfrmPurchaserequestdetails' name='idPurchaserequestdetails' value=0>
					<div class='col-12'>
						<label for='select' class='form-label'>Purchaserequests_id</label>
							<select class='form-control' name='purchaseRequests_id' id='ideditpurchaseRequests_id'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					<div class='col-12'>
						<label for='select' class='form-label'>Articles_id</label>
							<select class='form-control' name='articles_id' id='ideditarticles_id'>
								<option class='active' value='0'>--Select Default--</option>
							</select>
					</div>
					
					<div class='col-12'>
						<label class='form-label'>Qty</label>
							<input type='text' class='form-control' data-validation='custom' data-validation-regexp='^([0-9]+)$' name='qty' id='ideditqty' placeholder='Enter Qty'>
					</div>
					
						<div class='col-12'>
								<a id='dltPurchaserequestdetails' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditPurchaserequestdetails',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditPurchaserequestdetails');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/purchaserequestdetails/editPurchaserequestdetails',
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
									$.notify('Could not UpdatePurchaserequestdetails','error');
								}
								else
								{
									$('#modelEditPurchaserequestdetails').appendTo('body').modal('hide');
									$('#frmeditPurchaserequestdetails').get(0).reset();
									data=JSON.parse(data);
									$('#colPurchaserequestdetails').html(data.col);
									$('#fillPurchaserequestdetails').html(data.row);
									$.notify('Purchaserequestdetails Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltPurchaserequestdetails','click',function(){

					$('#modelDeletePurchaserequestdetails').appendTo('body').modal('show');
					$('#modelEditPurchaserequestdetails').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeletePurchaserequestdetails').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		