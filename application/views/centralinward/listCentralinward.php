
		<div class='row' style='margin-bottom: 20px;'>
			<div class='col'>
				<a  id='createCentralinward' class='btn btn-primary float-right' role='button'  style='color: white;'><i class='fa fa-user-plus' aria-hidden='true'></i>Entry Central Store</a>
			</div>
		</div>
		
		<div class='col-sm-12'>
			<table class='table table-striped table-bordered  table-hover table-sm' id='dtOrderTable'>
				<thead id='colCentralinward'>
				<?php  $dd = $this->session->userdata('empname') ; var_dump($dd); ?>

					<?php
					if(isset($cols))
						echo $cols;
					?>

				</thead>
				<tbody id='fillCentralinward'>
					<?php
					if(isset($rows))
						echo $rows;
					?>
				</tbody>
			</table>
		</div>
		<div class='modal fade' id='modelCentralinward'>
			<div class='modal-dialog modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Create New Centralinward</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('centralinward/createCentralinward'); ?>
					</div>
				</div>
			</div>
		</div>	
		<div class='modal fade' id='modelEditCentralinward'>
			<div class='modal-dialog  modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Update Centralinward</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('centralinward/editCentralinward'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='modal fade' id='modelDeleteCentralinward'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Confirm deletion of Centralinward</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						Are You Sure?
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>No, Cancel</button>
						<button type='button' class='btn btn-danger' id='btnDeleteCentralinward' data-id='0'>Yes, Remove</button>
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
			$(document).on('click','#btnDeleteCentralinward',function(e) {
				e.preventDefault();
				var id=$(this).attr('data-id');
				$('#modelDeleteCentralinward').appendTo('body').modal('hide');
				jQuery.ajax({
					url : baseurl + '/centralinward/removeCentralinward',
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
							$.notify('Centralinward Cannot be removed','error');
						}
						else
						{
							$('#modelDeleteCentralinward').appendTo('body').modal('hide');
							data=JSON.parse(data);
							$('#colCentralinward').html(data.col);
							$('#fillCentralinward').html(data.row);
							$.notify('Centralinward Removed Successfully','success');

							
						}
					}
				});
			});
			$(document).delegate('#createCentralinward','click',function(e) {
				e.preventDefault();
				$('#modelCentralinward').appendTo('body').modal('show');
			});
			$(document).delegate('.clickablerow','click',function(){
				var id=$(this).data('id');
				jQuery.ajax({
					url : baseurl + '/centralinward/showEdit',
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
						$('#idfrmCentralinward').val(id);
						$('#dltCentralinward').attr('data-id',id);
						$.each(data,function(i,item){
							$('#idedit'+i).val(item);
						});
						$('#modelEditCentralinward').appendTo('body').modal('show');
					}
				});
			});
		</script>
		