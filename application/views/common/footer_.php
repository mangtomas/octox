		<div id="footer">
			<strong>Content Management System</strong><br />
			devStation web development startup company <br />
			&copy; 2013
		</div>
	</div>
	<br style="clear:both" />
</div>
<!--end of wrapper//-->
 
    <script src="<?=base_url('public');?>/js/admin/bootstrap-transition.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-alert.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-modal.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-dropdown.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-scrollspy.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-tab.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-tooltip.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-popover.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-button.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-collapse.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-carousel.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-typeahead.js"></script>
    <script src="<?=base_url('public');?>/js/admin/bootstrap-datepicker.js"></script>
    <script src="<?=base_url('public');?>/js/admin/prettify/prettify.js"></script>
    <script src="<?=base_url('public');?>/js/admin/jmethods.js"></script>
    <script src="<?=base_url('public');?>/js/admin/jquery.alphanumeric.js"></script>
    <script src="<?=base_url('public');?>/js/admin/jquery.form.js"></script>
    <script src="<?=base_url('public');?>/js/admin/jquery.validate.js"></script>
    <script src="<?=base_url('public');?>/js/admin/generals.js"></script>
    <script src="<?=base_url('public');?>/js/admin/clock.js"></script>
	<script type="text/javascript">
		
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
  </body>
</html>