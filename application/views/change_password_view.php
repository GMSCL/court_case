<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>

			<li class="active">Add village</li>
		</ul><!-- /.breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">
		<div class="page-content-area">

			<div class="page-header">
				<h1>
					Change Password
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Change your password detail...
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- <h2 class="center"> Add Customer</h2> -->
					<div class="space-4"></div>
					<div class="clearfix form-actions">
						<div class="col-md-8">

							<div id="signup-box" class="signup-box widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header green lighter bigger">
											<i class="ace-icon fa fa-users blue"></i>
											New User Password Change : 
										</h4>
										<?php if(empty($user)) { ?>
										<h3>You can change your password only one time if your password is changed one time then please contact your Taluka panchayat</h3>
										<div class="space-6"></div>
										<p> Enter your details to begin: </p>

										<?php echo form_open('village/reset_password');?>
											<fieldset>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="password" class="form-control" placeholder="Password" id="pass1" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" placeholder="Repeat Password" id="pass2" onkeyup="checkPass(); return false;" onblur="confirmPass()" required/>
														<i class="ace-icon fa fa-retweet"></i>
													</span>
												</label>


												<div class="space-12"></div>

												<div class="clearfix">
													<button type="reset" class="width-30 pull-left btn btn-sm">
														<i class="ace-icon fa fa-refresh"></i>
														<span class="bigger-110">Reset</span>
													</button>

													<button type="submit" id="register" class="width-65 pull-right btn btn-sm btn-success">
														<span class="bigger-110">Save</span>

														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</button>
												</div>
											</fieldset>
											</form>
										<?php } else { ?>
											<h4 class="red">
												Your password was changed one time at <?php echo $user[0]['updated_at'];?>. So if you are forgot yur password plase contact your taluka panchayat.
											</h4>
										<?php } ?>
								</div>

								<div class="toolbar center">
									<a href="<?php echo site_url('login');?>" data-target="#login-box" class="back-to-login-link">
										<i class="ace-icon fa fa-arrow-left"></i>
										Back to login
									</a>
								</div>
							</div><!-- /.widget-body -->
						</div>
					</div>
			</div>
			
			
		</div>

	</div><!-- /.page-content area -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->


<script type="text/javascript">

function checkPass() {
			    //Store the password field objects into variables ...
			    var pass1 = document.getElementById('pass1');
			    var pass2 = document.getElementById('pass2');
			    //Store the Confimation Message Object ...
			    var message = document.getElementById('confirmMessage');
			    //Set the colors we will be using ...
			    var goodColor = "#66cc66";
			    var badColor = "#ff6666";
			    //Compare the values in the password field 
			    //and the confirmation field
			    if(pass1.value == pass2.value){
			    	pass2.style.backgroundColor = goodColor;
			    	message.style.color = goodColor;
			    	message.innerHTML = "Passwords Match!"
			    }else{
			    	pass2.style.backgroundColor = badColor;
			    	message.style.color = badColor;
			    	message.innerHTML = "Passwords Do Not Match!";

			    }
			}

			function confirmPass() {
				var pass1 = document.getElementById("pass1").value
				var pass2 = document.getElementById("pass2").value
				if(pass1 != pass2) {
					document.getElementById('register').disabled = true;
					alert('password do not match !');
				} else {
					document.getElementById('register').disabled = false;

				}
			}
			</script>