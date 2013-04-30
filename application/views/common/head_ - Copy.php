<!Doctype html>
<html lang="eng">
<head>
<link href="<?=base_url('public');?>/css/normalize.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/google-datepicker.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/default.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/nanoscroller.css" rel="stylesheet">

<style type="text/css">
      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -41px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 30px;
      }
#footer {
border-top:1px solid #f5f5f5;
padding-top: 30px;
text-align:center;
border-top:1px solid #ddd;
color:#9a9a9a;
height:200px;
}
#logo{
margin: 0;
margin-top: -37px;
text-indent: 57px;
background: #fff url('<?=base_url();?>public/img/brand.png')no-repeat -46px -17px;
font: bold 10px 'arial';
padding-top: 59px;
color: rgb(124, 124, 124);
text-transform: uppercase;
margin-right: 15px;
margin-left: -20px;
height: 17px;
width: 232px;
}
.clear{clear:both}
.login-user{font:bold 12px 'Arial'}

.nav-custom-top{height:35px;margin-bottom:0!important;margin-top:-7px}
.nav-custom-bar{
  background-color: #fafafa;
  background-image: -moz-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#f2f2f2));
  background-image: -webkit-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: -o-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: linear-gradient(to bottom, #ffffff, #f2f2f2);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
  *zoom: 1;
  -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
     -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
          box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
		  height: 38px;
}
#main-container-scroll{border-left: 1px solid #ddd;border-top: none;padding: 0 15px 0 15px;height:635px;margin-bottom: -17px;min-height: 570px!important;max-height: 635px!important;background: #fff;margin-left: 211px;padding-top: 1px;}
</style>

<script src="<?=base_url('public');?>/js/jquery.js"></script>
 <script src="<?=base_url('public');?>/js/jquery.nanoscroller.js"></script>
<script type="text/javascript">
//jquery section
$(document).ready(function(){
  $('.nano').nanoScroller({
    preventPageScrolling: true
  });
});
var currenttime = '<?=date("F d, Y H:i:s", time())?>';
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)
 
function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}
 
function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}
</script>
</head>
<body>
 <div class="navbar nav-custom-top navbar-inverse" >
      <div class="navbar-inner" >
        <div class="container-fluid" style="padding:0">
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-left" style="margin-left:225px">
              <strong>IP Address: </strong><?=$_SERVER['REMOTE_ADDR']?>
				<strong style="margin-left:10px">Date and Time : </strong><span id="servertime"></span>
			  </p>
           
             <ul class="nav pull-right" role="navigation">
                    <li class="dropdown">
                      <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Logged in as <strong><?=$info['email_address']?></strong> <i class="icon-cog icon-white"></i></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin:-7px 0 0 !important">
                        <li><a href="<?=base_url('cms/account/information')?>"><i class="icon-info-sign"></i> My Account Information</a></li>
                        <li><a href="<?=base_url('cms/account/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('main/logout')?>"><i class="icon-off"></i> Logout</a></li>
                      </ul>
                    </li>
         
                  </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div id="header">
		<div class="custom-container nav-custom-bar">
			<div class="header">
				  <h2 id="logo" class="pull-left" style="float:left"></h2>
					<ul class="nav nav-tabs pull-left" style="margin-top:12px;margin-bottom:0">
					  <li class="<?=(_controller()=='main'AND _method()=='index')? 'active' : null?> right">
						<a href="<?=base_url('cms/main');?>"><i class="icon-home" style="margin-top:-1px"></i> Dashboard</a>
					  </li>
					  <li class="<?=(_controller()=='main' AND _method()=='information')? 'active' : null?>"><a href="<?=base_url('cms/main/information');?>"><i class="icon-cog"></i>Company Information</a></li>
					  <li class="<?=(_controller()=='main' AND _method()=='aboutcms')? 'active' : null?>"><a href="<?=base_url('cms/main/aboutcms');?>"><i class="icon-tasks"></i> About CMS</a></li>
					</ul>
				<br class="clear" />
			</div>
		</div>
	</div>
	
	<!--style="min-width:200px;max-width:225px"--->
	 <div style="background:#fff url('../public/img/fluid-repeat.png') repeat-y">
      <div class="row-fluid">
        <div class="span2" style="width: 231px;">
          <div class="well sidebar-nav" style="border-radius: 0;padding: 0;background: none;border: 0;margin-top: 15px;box-shadow: none;">
            <ul class="nav nav-list left-nav" style="font: bold 12px 'arial';">
              <li class="nav-header">www.website.com</li>
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Services</a></li>
			  <li><a href="#">About</a></li>
			  <li><a href="#">Contact</a></li>
			  <li class="divider"></li>
              <li class="nav-header">Manage System</li>
              <li><a href="#"><i class="custom-icon-small-users" style="margin-top: -3px;"></i> Users</a></li>
              <li><a href="<?=base_url('cms/role')?>"><i class="custom-icon-small-lock" style="margin-top:-6px"></i> Role</a></li>
        
              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div style="" id="main-container-scroll" class="nano">
		 <div class="content">