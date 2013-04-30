<div class="action-container">
<fieldset>
<legend style="font: bold 26px 'arial';"><i class="custom-icon-monitor" style="margin-top:-3px"></i>Administration</legend>
<h4>Welcome to devStation Content Management System Administrational panel</h4>

<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Information : </strong>Click an administration area below to perform tasks related to it.
</div>

<fieldset class="pull-left dashboard-nav-container">
<legend style="font: bold 14px 'arial';"><i class="custom-icon-small-account" style="margin-top:-3px"></i>Account</legend>
	<div class="dashboard-nav">
	<a href="<?=base_url('cms/account/information')?>"><i class="icon-info-sign"></i> My account information</a><br />
	<a href="<?=base_url('cms/account/settings')?>"><i class="icon-cog"></i> My account settings</a>
	</div>
</fieldset>

<fieldset class="pull-left dashboard-nav-container">
<legend style="font: bold 14px 'arial';"><i class="custom-icon-small-users" style="margin-top:-3px"></i>Users</legend>
	<div class="dashboard-nav">
	<a href="<?=base_url('cms/users')?>"><i class="icon-user"></i> View all user</a><br />
	<a href="<?=base_url('cms/users/new-user')?>"><i class="icon-plus-sign"></i> Add user</a>
	</div>
</fieldset>

<fieldset class="pull-left dashboard-nav-container">
<legend style="font: bold 14px 'arial';"><i class="custom-icon-small-users" style="margin-top:-3px"></i>Role</legend>
	<div class="dashboard-nav">
	<a href="<?=base_url('cms/role')?>"><i class="icon-user"></i>User role</a><br />
	<a href="<?=base_url('cms/role/create-new')?>"><i class="icon-plus-sign"></i> Add role</a>
	</div>
</fieldset>
</fieldset>
</div>