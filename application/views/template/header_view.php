<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<!-- <meta charset="UTF-8" /> -->
		<title>જિલ્લા પંચાયત</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/bootstrap.min.css') ?>"  />
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/font-awesome.min.css')?>" />
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/fonts/Lohit-Gujarati-sfntly-webfonts.woff')?>" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/jquery-ui.custom.min.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/fullcalendar.css');?>" />

		<!-- text fonts 
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />
-->
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ace.min.css') ?>" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ace-skins.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ace-rtl.min.css') ?>" />
		
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/chosen.css') ?>" />		
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/datepicker.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/bootstrap-datetimepicker.css') ?>" />
		<!-- inline styles related to this page -->


		

		<!-- ace settings handler -->
		<script src="<?php echo base_url('ace/assets/js/ace-extra.min.js') ?>"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script> -->


		<!-- data table -->
		<!-- <link rel="stylesheet" href="<?php echo base_url('ace/assets/css/datatable/jquery.dataTables.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/datatable/buttons.dataTables.min.css') ?>" />
 -->
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		<!-- fancy slider image  -->
		<!-- <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/jquery.fancybox.min.css') ?>" />

		<script src="<?php echo base_url('ace/assets/js/jquery.fancybox.min.js')?>"></script> -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" /> -->
		
		
		<!-- data table -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/datatable/jquery.dataTables.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/datatable/buttons.dataTables.min.css') ?>" />
		<!-- To override bootstrap css -->
		<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/ccms.css');?>" />
		<script src="<?php echo base_url('ace/assets/js/jquery.min.js')?>"></script>

		<style type="text/css">
			.bold { font-weight: bold ; }
  			/* table {
  				font-family : arial !important; 
  			} */
		</style>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
			  				<!-- Wrapped the logo without backgroung in a circular div with white bg. -->
			  				<div style="background-color:white; width:fit-content; display:inline-flex; border-radius:50%; vertical-align:middle"> 
								<img src="<?php echo base_url('image/logo.png');?>" height="40" width="40">
							</div>
						<small>
							જિલ્લા પંચાયત <?php echo $district_name;?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url('ace/assets/avatars/avatar4.png');?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('user_name');?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							
								<li class="divider"></li>
								<li>
									<a href="<?php echo site_url('reports/profile');?>">
										<i class="ace-icon fa fa-user"></i>
										Profile Change
									</a>
								</li>
								<!-- <li>
									<a href="<?php echo site_url('login/change_password');?>">
										<i class="ace-icon fa fa-key"></i>
										Change Password
									</a>
								</li> -->
								<li>
									<a href="<?php echo site_url('login/do_logout');?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				 <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>


				<ul class="nav nav-list">

					<li <?php if(isset($active)){ if($active=='home'){ echo "class='active'";}} ?> class="">
						<a href="<?php echo site_url('home');?>">
							<i class="menu-icon fa fa-home" style="font-size:24px;color:green"></i>
							<span class="menu-text"> હોમ </span>
						</a>
						<b class="arrow"></b>
					</li>

					<?php if($is_admin == '1' && $this->config->item('dashboard_feature') == 'on') { ?>
						<li <?php if(isset($active)){ if($active=='dashboard'){ echo "class='active'";}} ?> class="">
							<a href="<?php echo site_url('dashboard');?>">
								<i class="menu-icon fa fa-area-chart" style="font-size:24px;color:#4285F4"></i>
								<span class="menu-text"> ડેશબોર્ડ </span>
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>

					<li <?php if(isset($active)){ if($active=='calendar'){ echo "class='active'";}} ?> class="">
						<a href="<?php echo site_url('calendar');?>">
							<i class="menu-icon fa fa-calendar" style="font-size:24px;color:blue"></i>
							<span class="menu-text"> સુનવણી કેલેન્ડર </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li <?php if(isset($active)){
						if($active=='court' OR $active=='department' OR $active=='applicant' OR $active=='advocate' OR $active=='case_type') {
							echo "class='active open hsub'";
						}						
						}?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-briefcase " style="font-size:24px;color:red"></i>
							<span class="menu-text">  માસ્ટર મેન્યુ  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li <?php if(isset($active)){ if($active=='court'){ echo "class='active'";}} ?>>
								<a href="<?= site_url('indicator/court');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									કોર્ટ વિગત
								</a>

								<b class="arrow"></b>
							</li>

							 <li <?php if(isset($active)){ if($active=='case_type'){ echo "class='active'";}} ?> class="">
								<a href="<?= site_url('indicator/case_type');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									કેસનો પ્રકાર							
								</a>

								<b class="arrow"></b>
							</li>
							
							<!--<li <?php if(isset($active)){ if($active=='applicant'){ echo "class='active'";}} ?> class="">
								<a href="<?= site_url('indicator/applicant');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									અરજદાર વિગત							
								</a>

								<b class="arrow"></b>
							</li> -->
							
							<li <?php if(isset($active)){ if($active=='advocate'){ echo "class='active'";}} ?> class="">
								<a href="<?= site_url('indicator/advocate');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									એડવોકેટ વિગત 		
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li <?php if(isset($active)){ if($active=='court_case'){ echo "class='active'";}} ?> class="">
						<a href="<?php echo site_url('court_case');?>">
							<i class="menu-icon fa fa-book" style="font-size:24px;color:Fuchsia"></i>
							<span class="menu-text"> નવો કેસ-વિગત ઉમેરો  </span>
						</a>
						<b class="arrow"></b>
					</li>
					
					<li <?php if(isset($active)){ if($active=='court_case_detail'){ echo "class='active'";}} ?> class="">
						<a href="<?php echo site_url('court_case/department_wise_detail');?>">
							<i class="menu-icon fa fa-university" style="font-size:24px;color:Maroon"></i>
							<span class="menu-text"> ચાલુ
							 કેસ  વિગત જોવો</span>
						</a>
						<b class="arrow"></b>
					</li>

					<li <?php if(isset($active)){
							if($active=='hearing_date_wise' OR $active=='financial_expense' OR $active=='pending_case' OR $active=='appeal_case' 
								OR $active=='all_cases_report' OR $active=='log_report' OR $active=='entry_report') {
								echo "class='active open hsub'";
							}						
						}?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-text" style="font-size:24px;color:green"></i>
							<!-- <i class="fas fa-file-alt"></i> -->
							<span class="menu-text">  રિપોર્ટસ  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if(isset($active)){ if($active=='hearing_date_wise'){ echo "class='active'";}} ?> class="">
								<a href="<?php echo site_url('reports/appeal_report');?>">
									<i class="menu-icon fa fa-calendar" style="font-size:24px;color:green"></i>
									<span class="menu-text"> સુનવણી તારીખ વાઇસ રિપોર્ટ </span>
								</a>
								<b class="arrow"></b>
							</li>

							<!-- commented as it is not required-->
							<!-- <li <?php if(isset($active)){ if($active=='financial_expense'){ echo "class='active'";}} ?> class="">
								<a href="<?php echo site_url('reports/view?name=financial_expense_wise');?>">
									<i class="menu-icon fa fa-rupee" style="font-size:24px;color:Blue"></i>
									<span class="menu-text"> નાણાકીય ખર્ચ વાઇસ   </span>
								</a>
								<b class="arrow"></b>
							</li> -->

							<li <?php if(isset($active)){ if($active=='pending_case'){ echo "class='active'";}} ?> class="">
								<a href="<?php echo site_url('reports/view?name=pending_case');?>">
									<i class="menu-icon fa fa-book" style="font-size:24px;color:red"></i>
									<span class="menu-text"> પેન્ડિંગ કેસ રિપોર્ટ  </span>
								</a>
								<b class="arrow"></b>
							</li>

							<li <?php if(isset($active)){ if($active=='appeal_case'){ echo "class='active'";}} ?> class="">
								<a href="<?php echo site_url('reports/view?name=appeal_case');?>">
									<i class="menu-icon fa fa-file" style="font-size:24px;color:Olive"></i>
									<span class="menu-text"> અપીલ કરવા પાત્ર કેસ રિપોર્ટ  </span>
								</a>
								<b class="arrow"></b>
							</li>

							<li <?php if(isset($active)){ if($active=='all_cases_report'){ echo "class='active'";}} ?> class="">
								<a href="<?php echo site_url('reports/all_cases_report');?>">
									<i class="menu-icon fa fa-file" style="font-size:24px;color:DarkSlateGray"></i>
									<span class="menu-text"> તમામ કેસ રિપોર્ટ </span>
								</a>
								<b class="arrow"></b>
							</li>

							<?php if($is_admin == '1') { ?>
								<li <?php if(isset($active)){ if($active=='log_report'){ echo "class='active'";}} ?> class="">
									<a href="<?php echo site_url('reports/log_report');?>">
										<i class="menu-icon fa fa-users" style="font-size:24px;color:blue"></i>
										<span class="menu-text"> લોગીન  રિપોર્ટ</span>
									</a>
									<b class="arrow"></b>
								</li>

								<li <?php if(isset($active)){ if($active=='entry_report'){ echo "class='active'";}} ?> class="">
									<a href="<?php echo site_url('reports/entry_report');?>">
										<i class="menu-icon fa fa-book" style="font-size:24px;color:red"></i>
										<span class="menu-text"> એન્ટ્રી રિપોર્ટ</span>
									</a>
									<b class="arrow"></b>
								</li>
							<?php } ?>
						</ul>
					</li>

					<li <?php if(isset($active)){ if($active=='print_court_register'){ echo "class='active'";}} ?> class="">
						<a href="<?php echo site_url('court_case/print_court_register');?>">
							<i class="menu-icon fa fa-print" style="font-size:24px;color:DarkSlateGray"></i>
							<span class="menu-text"> પ્રિન્ટ કોર્ટ કેસ રજીસ્ટર</span>
						</a>
						<b class="arrow"></b>
					</li>

					<?php if($is_admin == '1') { ?>
						<li <?php if(isset($active)){ if($active=='send_sms_email'){ echo "class='active'";}} ?> class="">
							<a href="<?php echo site_url('send_sms_email');?>" >
								<i class="menu-icon fa fa-envelope" style="font-size:24px;color:green"></i>
								<span class="menu-text"> Send SMS / Email</span>
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
			
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
		</div>
