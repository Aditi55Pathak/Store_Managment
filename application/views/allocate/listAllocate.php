
		<div class='row' style='margin-bottom: 20px;'>
			<div class='col'>
				<a  id='createAllocate' class='btn btn-primary float-right' role='button'  style='color: white;'><i class='fa fa-user-plus' aria-hidden='true'></i>Allocate To Deptt</a>
			</div>
		</div>
		
		<div class='col-sm-12'>
			<table class='table table-striped table-bordered  table-hover table-sm' id='dtOrderTable'>
				<thead id='colAllocate'>
				<?php  $dd3 = $this->session->userdata('itemsresult') ; var_dump($dd3); ?>
				<?php  $dd4 = $this->session->userdata('unalloted') ; var_dump($dd4); ?>
				

					<?php
					if(isset($cols))
						echo $cols;
					?>

				</thead>
				<tbody id='fillAllocate'>
					<?php
					if(isset($rows))
						echo $rows;
					?>
				</tbody>
			</table>
		</div>
		<div class='modal fade' id='modelAllocate'>
			<div class='modal-dialog modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Allocation To Department</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('allocate/createAllocate'); ?>
					</div>
				</div>
			</div>
		</div>	
		<div class='modal fade' id='modelEditAllocate'>
			<div class='modal-dialog  modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Update Allocate</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('allocate/editAllocate'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='modal fade' id='modelDeleteAllocate'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Confirm deletion of Allocate</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						Are You Sure?
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>No, Cancel</button>
						<button type='button' class='btn btn-danger' id='btnDeleteAllocate' data-id='0'>Yes, Remove</button>
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
			$(document).on('click','#btnDeleteAllocate',function(e) {
				e.preventDefault();
				var id=$(this).attr('data-id');
				$('#modelDeleteAllocate').appendTo('body').modal('hide');
				jQuery.ajax({
					url : baseurl + '/allocate/removeAllocate',
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
							$.notify('Allocate Cannot be removed','error');
						}
						else
						{
							$('#modelDeleteAllocate').appendTo('body').modal('hide');
							data=JSON.parse(data);
							$('#colAllocate').html(data.col);
							$('#fillAllocate').html(data.row);
							$.notify('Allocate Removed Successfully','success');

							
						}
					}
				});
			});
			$(document).delegate('#createAllocate','click',function(e) {
				e.preventDefault();
				$('#modelAllocate').appendTo('body').modal('show');
			});
			$(document).delegate('.clickablerow','click',function(){
				var id=$(this).data('id');
				jQuery.ajax({
					url : baseurl + '/allocate/showEdit',
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
						$('#idfrmAllocate').val(id);
						$('#dltAllocate').attr('data-id',id);
						$.each(data,function(i,item){
							$('#idedit'+i).val(item);
						});
						$('#modelEditAllocate').appendTo('body').modal('show');
					}
				});
			});
		</script>
		