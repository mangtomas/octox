<fieldset class="title-container">
<legend style="font: bold 26px 'arial';margin-bottom:10px"><i class="custom-icon-lock" style="margin-top:-3px"></i>Role</legend>
	<div class="btn-group">
  <a class="btn btn-small" href="<?=base_url('cms/role/create')?>"><i class="icon-plus-sign"></i> Add Role</a>
  <a class="btn btn-small" id="delete-role"><i class="icon-minus-sign"></i> Delete</a>

</div>
	<table class="table table-striped table-condensed table-hover" style="font: 12px 'Arial';margin-top:5px">
		<thead>
			<tr>
			  <th valign="center" class="text-align-center" style='width:20px'><input type='checkbox' class="checkall" style='margin:0;margin-left: -7px!important;' /></th>
			  <th>User role</th>
			  <th class="acl">Create</th>
			  <th class="acl">Read</th>
			  <th class="acl">Update</th>
			  <th class="acl">Delete</th>
			  <th class="width110">Action</th>
			</tr>
        </thead>
		<tbody>
			
		<?php
		foreach($userRole as $k){
			$delete 	= ($k['role_id']!=1) ? "<a href='#delete' role='button'  data-toggle='modal' class='actions role-delete' id='id_".$k['role_id']."'><span class='issue-icon delete'></span> Delete</a>": '- -';
			$edit 		= ($k['role_id']!=1) ? "<a href='".base_url()."cms/role/edit/".genKey($k['role_id'])."' class='actions'><span class='issue-icon update'></span> Edit</a>" : "- - ";
			$checkbox 		= ($k['role_id']!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
			
			
			$actions 	=  $edit." ".$delete;
			$delete 	= ($k['_delete']==1) ? "true" : "false";
			$update 	= ($k['_update']==1) ? "true" : "false";
			$read 		= ($k['_read']==1) ? "true" : "false";
			$create 	= ($k['_create']==1) ? "true" : "false";
			
		echo "<tr id='delete_".$k['role_id']."'><td style='width:20px'>".$checkbox."</td><td class='text-align'><strong>".$k['role']."</strong></td><td class='align-center'><span class='acl-".$create."'></td><td class='align-center'><span class='acl-".$read."'></td><td class='align-center'><span class='acl-".$update."'></td><td class='align-center'><span class='acl-".$delete."'></td><td>".$actions."</td></tr>";
		}
			
			
			?>
			
		
			
		</tbody>
	</table>


</fieldset>

<div id="delete" style="width:400px;left:60%;top:35%" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
    <h3 id="deleteLabel">Delete Role</h3>
  </div>
  <div class="modal-body">
    <p id="result">Are you sure do you want to delete?</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-small" data-dismiss="modal" aria-hidden="true" id="cancel">Cancel</button>
    <button class="btn btn-small btn-primary" id="yesDelete">Yes, Delete</button>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
var id = null;
	$('.role-delete').bind('click',function(){
		id = this.id.replace('id_','');
		$('#cancel').html('Cancel');
		$('#yesDelete').show();				/*  */
			
	});
	
	$('#yesDelete').bind('click',function(){
		$.post('<?=base_url('cms/role/')?>',{_delete:true,id:id},function(data){
			if(data==1){
					$('#delete').modal('hide');
					$('#delete_'+id).fadeOut();
				}else{
				$('#yesDelete').hide();
				$('#cancel').html('Ok');
				$('#result').fadeIn('slow').addClass('alert alert-error').html('Unable to Delete. This role was use by another user.').css({'margin-botton':'5px!important'});
			}
		});
	});					 
	
	$('#delete').on('hide',function(){
		$('#result').removeClass('alert alert-error').html('Are you sure do you want to delete?');

	});
			 
	});
</script>