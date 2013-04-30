<!Doctype html>
<html lang="eng">
<head>
<link href="<?=base_url('public');?>/css/admin/loader.css" rel="stylesheet">

<style type="text/css">
      html,
      body {
        height: 100%;
		margin:0;
		padding:0;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto;
      }
</style>

<script src="<?=base_url('public');?>/js/admin/jquery.js"></script>
 <script src="<?=base_url('public');?>/js/admin/jquery.nanoscroller.js"></script>

</script>
</head>
<body>
<div id="wrapper">
<div id="top-nav-fixed">
			<p class="navbar-text pull-left">
				<strong>IP Address&nbsp;:&nbsp;<?=$_SERVER['REMOTE_ADDR']?> &nbsp;&nbsp;&nbsp;Date and Time : <span id="servertime"></span></strong>
			  </p>
			  
			 <ul class="nav pull-right" role="navigation" id="user-login">
                    <li class="dropdown">
                      <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Logged in as <strong><?=$info['email_address']?></strong> <i class="icon-cog icon-white"></i></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin: 6px 72px 0 !important;">
                        <li><a href="<?=base_url('cms/account/information')?>"><i class="icon-info-sign"></i> My Account Information</a></li>
                        <li><a href="<?=base_url('cms/account/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('main/logout')?>"><i class="icon-off"></i> Logout</a></li>
                      </ul>
                    </li>
         
                  </ul>
				 
		</div>
	<div id="leftPanel" class="pull-left">
		<div id="brand-logo">
			<a href="<?=base_url('cms/');?>"><img src="<?=base_url('public/images/admin/brand.png')?>" alt="Devstation Content Management System" /></a>
		</div>
		
		 <ul class="nav nav-list left-nav" style="font: bold 12px 'arial';">
            
			 <li class="nav-header">Content Management System</li>
				<li><a href="<?=base_url('cms')?>"><i class="icon-home"></i> Dashboard</a> <?=(_controller()=='main'AND _method()=='index')? '<span class="arrow-left"></span>' : null?></li>
				<li><a href="<?=base_url('cms/main/information')?>"><i class="icon-info-sign"></i> Company Information</a> <?=(_controller()=='main'AND _method()=='information')? '<span class="arrow-left"></span>' : null?></li>
				<li><a href="<?=base_url('cms/main/aboutcms')?>"><i class="icon-certificate"></i> About CMS</a> <?=(_controller()=='main'AND _method()=='aboutcms')? '<span class="arrow-left"></span>' : null?></li>
				<li class="divider"></li>
			 <li class="nav-header">www.website.com</li>
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Services</a></li>
				  <li><a href="#">About</a></li>
				  <li><a href="#">Contact</a></li>
			  <li class="divider"></li>
              <li class="nav-header">Manage System</li>
              <li><a href="#"><i class="custom-icon-small-users" style="margin-top: -3px;"></i> Users</a> <?=(_controller()=='user'AND _method()=='index')? '<span class="arrow-left"></span>' : null?></li>
              <li><a href="<?=base_url('cms/role')?>"><i class="custom-icon-small-lock" style="margin-top:-6px"></i> Role</a> <?=(_controller()=='role'AND _method()=='index')? '<span class="arrow-left"></span>' : null?></li>
        
              
            </ul>
	</div>
	
<div id="rightPanel">
	
