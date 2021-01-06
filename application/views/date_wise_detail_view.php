
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
				<div class="col-sm-12">
					<div class="widget-box widget-color-blue ui-sortable-handle">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter">
								<i class="ace-icon fa fa-table"></i>
								મિલકત રજીસ્ટર Detail Between Date : <?php echo $date_1. ' To ' .$date_2 ; ?> 												 
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
											<td>તાલુકા</td>
											<td>ટોટલ ગામ</td>
											<!-- <td>ટોટલ યુઝર</td> -->
											<td>ટોટલ એન્ટ્રી મિલકત રજીસ્ટર</td>
										</tr>
									</thead>

									<tbody>
										<?php $i=1; foreach ($taluka as $key => $value) { ?>
										<tr>
											<td class="center">
											<?php echo $i;?>
											</td>
											<td><a href="<?php echo site_url('milkat/date_wise_village_detail/'.$taluka[$key]['id'].'/'.$date_1.'/'.$date_2);?>"><?php echo ucfirst($taluka[$key]['taluka_name']);?></a></td>
											<td><?php echo ucfirst($taluka[$key]['total_village']);?></td>
											<!-- <td><?php echo ucfirst($taluka[$key]['total_user']);?></td> -->
											<td><?php echo ucfirst($taluka[$key]['total_entry']);?></td></a>
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

