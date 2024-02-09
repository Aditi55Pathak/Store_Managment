
		<div class='row' style='margin-bottom: 20px;'>
			<div class='col'>
				<a  id='createRegistercategory' class='btn btn-primary float-right' role='button'  style='color: white;'><i class='fa fa-user-plus' aria-hidden='true'></i>  Create Registercategory</a>
			</div>
		</div>
		
		<div class='col-sm-12'>
			<table class='table table-striped table-bordered  table-hover table-sm' id='dtOrderTable'>
				<thead id='colRegistercategory'>
				<?php echo "samar" ; ?>
				
					<?php
					if(isset($cols))
						echo $cols;
					?>

				</thead>
				<tbody id='fillRegistercategory'>
					<?php
					if(isset($rows))
						echo $rows;
					?>
				</tbody>
			</table>
		</div>
		<div class='modal fade' id='modelRegistercategory'>
			<div class='modal-dialog modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Create New Registercategory</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('registercategory/createRegistercategory'); ?>
					</div>
				</div>
			</div>
		</div>	
		<div class='modal fade' id='modelEditRegistercategory'>
			<div class='modal-dialog  modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Update Registercategory</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('registercategory/editRegistercategory'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='modal fade' id='modelDeleteRegistercategory'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Confirm deletion of Registercategory</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						Are You Sure?
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>No, Cancel</button>
						<button type='button' class='btn btn-danger' id='btnDeleteRegistercategory' data-id='0'>Yes, Remove</button>
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
			$(document).on('click','#btnDeleteRegistercategory',function(e) {
				e.preventDefault();
				var id=$(this).attr('data-id');
				$('#modelDeleteRegistercategory').appendTo('body').modal('hide');
				jQuery.ajax({
					url : baseurl + '/registercategory/removeRegistercategory',
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
							$.notify('Registercategory Cannot be removed','error');
						}
						else
						{
							$('#modelDeleteRegistercategory').appendTo('body').modal('hide');
							data=JSON.parse(data);
							$('#colRegistercategory').html(data.col);
							$('#filRegistercategory').html(data.row);
							$.notify('Registercategory Removed Successfully','success');

							
						}
					}
				});
			});
			$(document).delegate('#createRegistercategory','click',function(e) {
				e.preventDefault();
				$('#modelRegistercategory').appendTo('body').modal('show');
			});
			$(document).delegate('.clickablerow','click',function(){
				var id=$(this).data('id');
				jQuery.ajax({
					url : baseurl + '/registercategory/showEdit',
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
						$('#idfrmRegistercategory').val(id);
						$('#dltRegistercategory').attr('data-id',id);
						$.each(data,function(i,item){
							$('#idedit'+i).val(item);
						});
						$('#modelEditRegistercategory').appendTo('body').modal('show');
					}
				});
			});
		</script>
		