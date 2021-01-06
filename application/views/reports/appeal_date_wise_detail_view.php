
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

			<li class="active">Reports</li>
			<li class="active">Hearing Date Wise</li>
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
				<h1> Hearing Date Wise Cases </h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="widget-box widget-color-blue ui-sortable-handle">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter">
								<i class="ace-icon fa fa-table"></i>
								સુનવણી તારીખ : <?php echo $date_1. ' થી ' .$date_2 ; ?> 												 
							</h5>
							<a class="pull-right btn btn-warning btn-large" href="<?php echo site_url('reports/export?name=hearing_date_wise');?>">
								<i class="fa fa-file-excel-o"></i> Export
							</a>
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
											<td>શાખા</td>
											<td>કેસ ટાઇટલ</td>
											<td>કેસ નંબર</td>
											<td>કઈ કોર્ટમાં કેસ ચાલે છે</td>
											<td>અરજદારનું નામ</td>
											<td>એડવોકેટનું નામ</td>
											<td>વચગાળાનો હુકમ જારી થયેલ છે?</td>
											<td>આવતી સુનવણીની તારીખ</td>
											<td>Update </td>
											<td>View </td>
											<td>Delete </td>


										</tr>
									</thead>

									<tbody>
										<?php $i=1; foreach ($data as $key => $value) { ?>
										<tr>
											<td class="center"><?php echo $i;?></td>
											
											</td>
											<td><?php echo $data[$key]['department_name'];?></td>
											<td><?php echo $data[$key]['case_title'];?></td>
											<td><?php echo $data[$key]['case_no'];?></td>
											<td><?php echo $data[$key]['court_name'];?></td>
											<td><?php echo $data[$key]['applicant_id'];?></td>
											<td><?php echo $data[$key]['advocate_name'];?></td>
											<td><?php echo $data[$key]['interim_order_issued'];?></td>
											<td><?php if($data[$key]['appeal_date'] == '0000-00-00') { echo "";} else { echo $this->my_model->date_format_2($data[$key]['appeal_date']); }?></td>
											<td>
												<center>
													<a href="<?php echo site_url('court_case/case_detail/'.$data[$key]['id']);?>" data-original-title="delete product" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title=""> 
														<button data-original-title="Delete Product" class="">
															<i class="ace-icon fa fa-pencil bigger-120 green"></i>
														</button>
													</a>
												</center>
											</td>
											<td>
												<center>
													<a href="<?php echo site_url('court_case/court_case_detail/'.$data[$key]['id']);?>" data-original-title="delete product" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title=""> 
														<button data-original-title="Delete Product" class="">
															<i class="ace-icon fa fa-print bigger-120 "></i>
														</button>
													</a>
												</center>
											</td>
											<td>
												<center>
													<a href="#delete<?php echo $data[$key]['id'];?>" data-original-title="delete product" data-toggle="modal" class="tooltip-danger" data-rel="tooltip" title=""> 
														<button data-original-title="Delete Product" class="">
															<i class="ace-icon fa fa-trash-o bigger-120 red"></i>
														</button>
													</a>
												</center>
												<div class="modal fade" id="delete<?php echo $data[$key]['id'];?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																<h4 class="modal-title"> Are you sure you want to delete ? </h4>
															</div>

															<div class="modal-footer">
																<button type="button" onclick="window.location.href='<?php echo site_url('court_case/delete/'.$data[$key]['id']);?>'"  class="btn btn-success">Yes</button>
																<button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
															</div>
														</div>
													</div>
												</div>
											</td>
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

