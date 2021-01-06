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

			<li class="active"></li>
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
					કોર્ટ કેસ રજીસ્ટર
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						View your કોર્ટ કેસ રજીસ્ટર...
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="success">
								<i class="ace-icon fa fa-close"></i>
							</button>
							<i class="ace-icon fa fa-user green"></i>
							<strong class="green">
								<?php echo $this->session->flashdata('message');?>
							</strong>
						</div>
					<?php } ?>
					<?php echo form_open('reports/change_profile', 'class="form-horizontal"')?>
					<div class="col-sm-6">
						<div class="widget-box widget-color-blue ui-sortable-handle">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-user"></i>
									પ્રોફાઇલ વિગત  												
								</h5>
							</div>

							<div class="profile-user-info profile-user-info-striped">
								<div class="profile-info-row">
									<div class="profile-info-name"> શાખા </div>

									<div class="profile-info-value">
										<span class="editable editable-click" id="username">
											<input type="text" name="name" id="name" value="<?php echo $user[0]['name'];?>" class="form-control" readonly>
										</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> યુઝર નામ </div>

									<div class="profile-info-value">
										<input type="text" name="username" id="username" value="<?php echo $user[0]['username'];?>" class="form-control" readonly>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> ઈ મેઈલ આઈડી : </div>

									<div class="profile-info-value">
										<span class="editable editable-click" id="signup">
										<input type="text" name="email" id="email" value="<?php echo $user[0]['email'];?>" class="form-control">
										</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> મોબાઈલ નંબર : </div>

									<div class="profile-info-value">
										<span class="editable editable-click" id="login">
										<input type="text" name="mobile_no" id="mobile_no" value="<?php echo $user[0]['mobile_no'];?>" class="form-control">	
										</span>
									</div>
								</div>

							</div>

							<br />
							<center>	
								<button type="submit" data-original-title="Edit Product" class="" >
									<i class="ace-icon fa fa-pencil bigger-120 green"> Submit </i>
								</button>
							</center>
							<br />
						</div>
					</div>
					</form>
				</div>

			</div><!-- /.page-content area -->
		</div><!-- /.page-content -->
	</div><!-- /.main-content -->

