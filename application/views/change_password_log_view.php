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
					મિલકત રજીસ્ટર
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						View your મિલકત રજીસ્ટર...
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<?php if ($this->session->flashdata('message')) { ?>
					<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-close"></i>
						</button>
						<i class="ace-icon fa fa-user red"></i>
						<strong class="red">
							<?php echo $this->session->flashdata('message');?>
						</strong>
					</div>
					<?php } ?>
				<div class="col-sm-12">
					<div class="widget-box widget-color-blue ui-sortable-handle">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter">
								<i class="ace-icon fa fa-table"></i>
								મિલકત રજીસ્ટર Detail : 												
							</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
								
								<table class="table table-striped table-bordered table-hover" id="myTable">
									<thead class="thin-border-bottom">
										<tr>

											<td class="center" width="5%">
												<i class="ace-icon fa fa-user"></i>
												ક્રમ  
											</td>
											<td>તલાટી નું નામ</td>
											<td>તાલુકા</td>
											<td>ગામ</td>
											<td>જૂનો પાસવર્ડ</td>
											<td>નવો પાસવર્ડ</td>
											<td>પાસવર્ડ બદલાયેલ સમય</td>
											<td>આઇપી એડ્રેસ</td>


										</tr>
									</thead>

									<tbody>
										<?php $i=1; foreach ($log as $key => $value) { ?>
										<tr>
											<td class="center"><?php echo $i;?></td>
											<td><?php echo ucfirst($log[$key]['name']);?></td>
											<td><?php echo ucfirst($log[$key]['taluka_name']);?></td>
											<td><?php echo ucfirst($log[$key]['village_name']);?></td>
											<td><?php echo $log[$key]['old_password'];?></td>
											<td><?php echo $log[$key]['password'];?></td>
											<td><?php echo ucfirst($log[$key]['updated_at']);?></td>
											<td><?php echo ucfirst($log[$key]['ip']);?></td>
											

										</tr>
										<?php $i++;} ?>

									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>

	</div><!-- /.page-content area -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->

