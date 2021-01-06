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

			<li class="active">Report</li>
			<li class="active">Login Log</li>
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
				<h1> Login Log</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="widget-box widget-color-blue ui-sortable-handle">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter">
								<i class="ace-icon fa fa-table"></i>
								લોગીન લોગ રજીસ્ટર વિગત : 												
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
											<td style="vertical-align:middle;text-align:center;">શાખા</td>
											<td style="vertical-align:middle;text-align:center;">આઈ. પી એડ્રેસ</td>
											<td style="vertical-align:middle;text-align:center;">લાસ્ટ લોગીન સમય</td>
										</tr>
									</thead>

									<tbody>
										<?php $i=1; foreach ($data as $key => $value) { ?>
										<tr>
											<td class="center"><?php echo $i;?></td>
											<td><?php echo $data[$key]['name'];?></td>
											<td><?php echo $data[$key]['ip_address'];?></td>
											<td><?php echo $data[$key]['date_login'];?></td>
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

