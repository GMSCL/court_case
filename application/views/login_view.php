<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page </title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/bootstrap.min.css');?>" />
		<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" /> -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/font-awesome.min.css')?>" />

		<!-- text fonts -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ace.min.css');?>" />
		
		<!-- ccms styles to override ace.css,bootstrap.css -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ccms.css');?>" />
		

			<!--[if lte IE 9]>
				<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
				<![endif]-->
				<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ace-rtl.min.css');?>" />

				<style type="text/css">
				body {
					background-image: url(<?php echo base_url('image/logo.png');?>);
					/*-moz-background-size: cover;
					-webkit-background-size: cover;
					background-size: cover;*/
					background-position: top center !important;
					background-repeat: no-repeat !important;
					background-attachment: fixed;
					background-color: white !important;

				}

				div{
					border-radius: 25px, 25px, 25px
				}
				</style>

	</head>

	<body background="" class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-12 col-sm-offset-0" style="padding-top: 170px !important;">
						<div class="login-container">
							<div class="center">
								<h2>
									<i class="ace-icon fa fa-home green"></i>
									<span class="orange">જિલ્લા </span>
									<span class="black" id="id-text2"> પંચાયત </span>
									<span class="green" id="id-text2"><?php echo $district_name[0]['district_name'];?> </span>
								</h2>
								<h4 class="blue" id="id-company-text">&copy; કોર્ટ કેસ રજીસ્ટર</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>
											<?php if($this->session->flashdata('error_msg')) { ?>
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert">
													<i class="ace-icon fa fa-times"></i>
												</button>

												<strong>
													<i class="ace-icon fa fa-times"></i>
													Username or Password is wrong.
												</strong>
												<br>
											</div>
											<?php } ?>

											<?php if($this->session->flashdata('success_msg')) { ?>
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="success">
													<i class="ace-icon fa fa-times"></i>
												</button>

												<strong>
													<i class="ace-icon fa fa-check green"></i>
													Thank you For Registration. 
												</strong>
												<br>
											</div>
											<?php } ?>
											<div class="space-6"></div>

											<?php echo form_open('login/user_login',  'id="login"');?>
												<fieldset>
													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" class="form-control" placeholder="Username" name="username"/>
																<i class="ace-icon fa fa-user"></i>
																<div id="usernameError" class="errorDiv">
																	<!--Display name error here-->
																</div>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" class="form-control" placeholder="Password" name="password"/>
																<i class="ace-icon fa fa-lock"></i>
																<div id="passwordError" class="errorDiv">
																	<!--Display name error here-->
																</div>
															</span>
														</label>
													</div>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<!-- <span class="bigger-110"> Or Login Using</span> -->
											</div>

											<div class="space-6"></div>

											<!-- <div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div> -->
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">

											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<!-- <i class="ace-icon fa fa-arrow-left"></i>
														I forgot my password -->
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">													
													<!-- <i class="ace-icon fa fa-arrow-right"></i> -->
													<!-- I want to register -->
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your detail to receive password
											</p>

											<div class="row">
											<div class="col-xs-12">
											<?php echo form_open_multipart('login/forgot_password', 'class="form-horizontal"')?>
												<fieldset>
													<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> તાલુકા : </label>
														<div class="col-sm-6">
															<select class=" form-control" name="taluka" id="taluka">
																<option>સિલેક્ટ તાલુકા</option>
																<?php foreach ($taluka as $key => $value) { ?>
																<option value="<?= $taluka[$key]['id']?>"><?= $taluka[$key]['taluka_name']?></option>
																<?php } ?>
															</select>
														</div>
														<span class="red">*</span>
														<span class="red"><?php  echo form_error('taluka'); ?></span>
													</div>

													<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> ગામ : </label>
														<div class="col-sm-6">
															<select class="form-control" name="village" id="village">
															</select>
														</div>
														<span class="red">*</span>
														<span class="red"><?php  echo form_error('village'); ?></span>
													</div>
													
													<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> તલાટીનું નામ:  </label>
														<div class="col-sm-6">
															<input type="text" name="talati_name"  placeholder="તલાટી નું નામ" class="form-control">
														</div>
													</div>
													
													<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> ઇ-મેઈલ :  </label>
													<div class="col-sm-6">
														<input type="text" name="email"  placeholder=" ઇ-મેઈલ" class="form-control">
													</div>
													<span class="red">*</span>
														<span class="red"><?php  echo form_error('email'); ?></span>
													</div>

													<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> મોબાઈલ નં.:  </label>
													<div class="col-sm-6">
														<input type="text" name="mobile_no"  placeholder=" મોબાઈલ નં." class="form-control">
													</div>
													<span class="red">*</span>
														<span class="red"><?php  echo form_error('mobile_no'); ?></span>
													</div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Submit!</span>
														</button>
													</div>
												</fieldset>
											</form>
											</div>
											</div>
										</div><!-- /.widget-main -->

										<<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<!-- <div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<?php echo form_open('login/insert_company');?>
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="name" class="form-control" placeholder="Owner Name" />
														<i class="ace-icon fa fa-user green"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="company_name" class="form-control" placeholder="Company Name" />
														<i class="ace-icon fa fa-users"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="email" name="email" class="form-control" placeholder="email" />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>													

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="username" class="form-control" placeholder="Username" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

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

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="city" class="form-control" placeholder="City" />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="mobile_no" class="form-control" placeholder="Mobile Number" />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<label class="block">
													<input type="checkbox" class="ace" />
													<span class="lbl">
														I accept the
														<a href="#">User Agreement</a>
													</span>
												</label>

												<div class="space-12"></div>

												<div class="clearfix">
													<button type="reset" class="width-30 pull-left btn btn-sm">
														<i class="ace-icon fa fa-refresh"></i>
														<span class="bigger-110">Reset</span>
													</button>

													<button type="submit" id="register" class="width-65 pull-right btn btn-sm btn-success">
														<span class="bigger-110">Register</span>

														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</button>
												</div>
											</fieldset>
										</form>
									</div>

									<div class="toolbar center">
										<a href="#" data-target="#login-box" class="back-to-login-link">
											<i class="ace-icon fa fa-arrow-left"></i>
											Back to login
										</a>
									</div>
								</div> --><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<!-- <div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div> -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url('ace/assets/js/jquery.validate.min.js');?>"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">


			$(document).ready(function() {

				$('select[name="taluka"]').on('change', function() {

					var talukaID = $(this).val();

					if(talukaID) {

						$.ajax({


							url: 'http://localhost:3333/milkat_register_new/index.php/login/get_village/'+talukaID,

							type: "GET",

							dataType: "json",

							success:function(data) {

								$('select[name="village"]').empty();

								$.each(data, function(key, value) {

									$('select[name="village"]').append('<option value="'+ value.id +'">'+ value.village_name +'</option>');

								});

							}

						});

					}else{

						$('select[name="village"]').empty();

					}

				});

			});

		</script>
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

			jQuery(function($) {
				$(document).on('click', '.toolbar a[data-target]', function(e) {
					e.preventDefault();
					var target = $(this).data('target');
					$('.widget-box.visible').removeClass('visible');//hide others
					$(target).addClass('visible');//show target
				});
			});

			//you don't need this, just used for changing background
			jQuery(function($) {
				$('#btn-login-dark').on('click', function(e) {
					$('body').attr('class', 'login-layout');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-light').on('click', function(e) {
					$('body').attr('class', 'login-layout light-login');
					$('#id-text2').attr('class', 'grey');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-blur').on('click', function(e) {
					$('body').attr('class', 'login-layout blur-login');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'light-blue');

					e.preventDefault();
				});

			});
			$("#login").validate({
				// Specify validation rules
				rules: {
					// The key name on the left side is the name attribute
					// of an input field. Validation rules are defined
					// on the right side
					username: "required",
					password: "required"
				},
				// Specify validation error messages
				messages: {
					username: "Please enter your Username!", // Please enter Case Number.
					password: "Please enter your Password!"
				},      

				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				},
				errorPlacement: function(error, element) {
					var errDiv = '#' +element.attr("name") + "Error";
					error.appendTo(errDiv);
				},
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
					form.submit();
				}
			});
		</script>
	</body>
</html>
