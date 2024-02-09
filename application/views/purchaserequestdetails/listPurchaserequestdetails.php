
		<div class='row' style='margin-bottom: 20px;'>
			<div class='col'>
				<a  id='createPurchaserequestdetails' class='btn btn-primary float-right' role='button'  style='color: white;'><i class='fa fa-user-plus' aria-hidden='true'></i>  Create Purchaserequestdetails</a>
			</div>
		</div>
		
		<div class='col-sm-12'>
			<table class='table table-striped table-bordered  table-hover table-sm' id='dtOrderTable'>
				<thead id='colPurchaserequestdetails'>

					<?php
					if(isset($cols))
						echo $cols;
					?>

				</thead>
				<tbody id='fillPurchaserequestdetails'>
					<?php
					if(isset($rows))
						echo $rows;
					?>
				</tbody>
			</table>
		</div>
		<div class='modal fade' id='modelPurchaserequestdetails'>
			<div class='modal-dialog modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Create New Purchaserequestdetails</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('purchaserequestdetails/createPurchaserequestdetails'); ?>
					</div>
				</div>
			</div>
		</div>	
		<div class='modal fade' id='modelEditPurchaserequestdetails'>
			<div class='modal-dialog  modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Update Purchaserequestdetails</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('purchaserequestdetails/editPurchaserequestdetails'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='modal fade' id='modelDeletePurchaserequestdetails'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Confirm deletion of Purchaserequestdetails</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						Are You Sure?
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>No, Cancel</button>
						<button type='button' class='btn btn-danger' id='btnDeletePurchaserequestdetails' data-id='0'>Yes, Remove</button>
					</div>
				</div>
			</div>
		</div>

		<script type='text/javascript'>
			$(document).ready(function () {
				$('#dtOrderTable').DataTable({
					'order': [[ 0, 'asc' ]],
					'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
					'language': {
						'emptyTable': '<b>No Record Found!</b>'
					},
					'info': false
				});
				$('.dataTables_length').addClass('bs-select');
			});
			$(document).on('click','#btnDeletePurchaserequestdetails',function(e) {
				e.preventDefault();
				var id=$(this).attr('data-id');
				$('#modelDeletePurchaserequestdetails').appendTo('body').modal('hide');
				jQuery.ajax({
					url : baseurl + '/purchaserequestdetails/removePurchaserequestdetails',
					type:'POST',
					data : {id:id},
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
							$.notify('Purchaserequestdetails Cannot be removed','error');
						}
						else
						{
							$('#modelDeletePurchaserequestdetails').appendTo('body').modal('hide');
							data=JSON.parse(data);
							$('#colPurchaserequestdetails').html(data.col);
							$('#fillPurchaserequestdetails').html(data.row);
							$.notify('Purchaserequestdetails Removed Successfully','success');

							
						}
					}
				});
			});
			$(document).delegate('#createPurchaserequestdetails','click',function(e) {
				e.preventDefault();
				$('#modelPurchaserequestdetails').appendTo('body').modal('show');
			});
			$(document).delegate('.clickablerow','click',function(){
				var id=$(this).data('id');
				jQuery.ajax({
					url : baseurl + '/purchaserequestdetails/showEdit',
					type:'POST',
					dataType:'text',
					data : {id:id},
					async:true,
					beforeSend: function(data) {
						$('#load').show();
					},
					complete: function(data) {
						$('#load').hide();
					},
					success:function(data){
						data=JSON.parse(data);
						$('#idfrmPurchaserequestdetails').val(id);
						$('#dltPurchaserequestdetails').attr('data-id',id);
						$.each(data,function(i,item){
							$('#idedit'+i).val(item);
						});
						$('#modelEditPurchaserequestdetails').appendTo('body').modal('show');
					}
				});
			});
		</script>
		