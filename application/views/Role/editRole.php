
		<div class='row'>
			<div class='col-sm-12'>
				<form class='row g-3' id='frmeditRole' method='post'>
					<input type='hidden' id='idfrmRole' name='iRole' value=0>
					<div class='col-12'>
						<label class='form-label'>Typerole</label>
							<input type='text' class='form-control'  readonly='readonly' name='typerole' id='idedittyperole' placeholder='Enter typerole'>
					</div>
					
						
					<div class='col-12'>
						<label class='form-label'>Remarks</label>
							<input type='text' class='form-control'  data-validation='custom' data-validation-regexp='^([0-9]+)$' name='remarks' id='ideditremarks' placeholder='Enter Remarks'>
					</div>
					
						<div class='col-12'>
								<a id='dltRole' role='button' style='color:white;' class='btn btn-danger' data-id='0'>Remove</a>
								<input type='submit' class='btn btn-warning' value='Update'>
							
						</div>
				</form>
			</div>
		</div>
		<script type='text/javascript'>
			$(document).ready(function(){
				$.validate({
					form : '#frmeditRole',
					modules : 'location, date, security, file',
					validateOnBlur : false,
					onSuccess : function($form) {
						var frm = document.getElementById('frmeditRole');
						var frmdt = new FormData(frm);
						jQuery.ajax({
							url : baseurl + '/role/editRole',
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
									$.notify('Could not UpdateRole','error');
								}
								else
								{
									$('#modelEditRole').appendTo('body').modal('hide');
									$('#frmeditRole').get(0).reset();
									data=JSON.parse(data);
									$('#colRole').html(data.col);
									$('#fillRole').html(data.row);
									$.notify('Role Updated Successfully','success');

								}
							}
						});
						return false;
					}
				});
				$(document).delegate('#dltRole','click',function(){

					$('#modelDeleteRole').appendTo('body').modal('show');
					$('#modelEditRole').appendTo('body').modal('hide');
					
					var id=$(this).attr('data-id');
					$('#btnDeleteRole').attr('data-id',id);
					//console.log($(this).data('id'));
				});
			});

		</script>
		