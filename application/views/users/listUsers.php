
		<div class='row' style='margin-bottom: 20px;'>
			<div class='col'>
				<a  id='createUsers' class='btn btn-primary float-right' role='button'  style='color: white;'><i class='fa fa-user-plus' aria-hidden='true'></i>  Create Users</a>
			</div>
		</div>
		
		<div class='col-sm-12'>
			<table class='table table-striped table-bordered  table-hover table-sm' id='dtOrderTable'>
				<thead id='colUsers'>
				<?php  $dd = $this->session->userdata('empname') ; var_dump($dd); ?>
                   <?php  $dd = $this->session->userdata('role') ; var_dump($dd); ?>
				   <?php  $dd = $this->session->userdata('emppost') ; var_dump($dd); ?>
				   <?php  $dd = $this->session->userdata('loggeduserndetails') ; var_dump($dd["post"]); ?>
				   <?php  $dd = $this->session->userdata('loggeduserndetails') ; var_dump($dd["menustr"]); ?>
                   <?php  $dd = $this->session->userdata('deptlist') ; var_dump($dd); ?>
				     
       
					<?php
					if(isset($cols))
						echo $cols;
					?>

				</thead>
				<tbody id='fillUsers'>
					<?php
					if(isset($rows))
						echo $rows;
					?>
				</tbody>
			</table>
		</div>
		<div class='modal fade' id='modelUsers'>
			<div class='modal-dialog modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Create New Users</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('users/createUsers'); ?>
					</div>
				</div>
			</div>
		</div>	
		<div class='modal fade' id='modelEditUsers'>
			<div class='modal-dialog  modal-dialog-centered'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Update Users</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<?php $this->load->view('users/editUsers'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='modal fade' id='modelDeleteUsers'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Confirm deletion of Users</h4>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						Are You Sure?
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>No, Cancel</button>
						<button type='button' class='btn btn-danger' id='btnDeleteUsers' data-id='0'>Yes, Remove</button>
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
			$(document).on('click','#btnDeleteUsers',function(e) {
				e.preventDefault();
				var id=$(this).attr('data-id');
				$('#modelDeleteUsers').appendTo('body').modal('hide');
				jQuery.ajax({
					url : baseurl + '/users/removeUsers',
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
							$.notify('Users Cannot be removed','error');
						}
						else
						{
							$('#modelDeleteUsers').appendTo('body').modal('hide');
							data=JSON.parse(data);
							$('#colUsers').html(data.col);
							$('#fillUsers').html(data.row);
							$.notify('Users Removed Successfully','success');

							
						}
					}
				});
			});
			$(document).delegate('#createUsers','click',function(e) {
				e.preventDefault();
				$('#modelUsers').appendTo('body').modal('show');
			});
			$(document).delegate('.clickablerow','click',function(){
				var id=$(this).data('id');
				jQuery.ajax({
					url : baseurl + '/users/showEdit',
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
						$('#idfrmUsers').val(id);
						$('#dltUsers').attr('data-id',id);
						$.each(data,function(i,item){
							$('#idedit'+i).val(item);
						});
						$('#modelEditUsers').appendTo('body').modal('show');
					}
				});
			});
		</script>
		