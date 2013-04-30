

<div id="login-container">
	<div class="login-brand">
			<h1 class="brand">devStation CMS</h1>
	</div>
	
		<?php
			if(isset($error)){
				?>
					<script type="text/javascript">
						$(document).ready(function(){
							
						});
					</script>
				<?php
			}
		?>
	 <form class="form-signin" method="POST" action="<?=base_url('main/login')?>">
        <h2 class="form-signin-heading">Please sign in</h2>
		<?=(isset($error))? "<p class='alert alert-error'>".$error."</p>": null;
		
			
		
		?>
		
		
        <input type="text" name="userlogin" class="input-block-level" placeholder="Email address">
        <input type="password" name="userauth" class="input-block-level" placeholder="Password">
        <button class="btn btn-small btn-success" name="usersubmit" type="submit">Sign in</button> <a href="<?=base_url('main/forgot')?>" class="pull-right">Forgot Password?</a>
      </form>
	
</div>
