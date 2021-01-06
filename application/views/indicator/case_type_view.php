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
			<li class="active">Master</li>
			<li class="active">Add Case Type</li>
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
				<h1> Add Case Type </h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- <h2 class="center"> Add Customer</h2> -->
					<?php echo form_open('indicator/insert_case_type', 'class="form-horizontal"')?>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> નામ : </label>
						<div class="col-sm-6">
							<input type="text" name="case_type" id="form-field-1" placeholder="નામ" class="col-xs-10 col-sm-5">
						<span class="red">*</span>
						<span class="red"><?php  echo form_error('case_type_name'); ?></span>
						</div>
					</div>
					
					<div class="space-4"></div>
					<div class="clearfix form-actions">
						<div class="col-md-offset-4 col-md-8">
							<button class="btn btn-info" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								સેવ
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								રીસેટ
							</button>
						</div>
					</div>
				</form>
			</div>

			<div class="col-sm-12">
				<div class="widget-box widget-color-blue ui-sortable-handle">
					<div class="widget-header">
						<h5 class="widget-title bigger lighter">
							<i class="ace-icon fa fa-table"></i>
							કેસ પ્રકાર  વિગત  : 												
						</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-striped table-bordered table-hover">
								<thead class="thin-border-bottom">
									<tr>
										<th class="center" width="5%">
											<i class="ace-icon fa fa-user"></i>
											ક્રમ  
										</th>
										<th>કેસ પ્રકાર વિગત</th>
										<th style="vertical-align:middle;text-align:center;">Edit</th>
										<th style="vertical-align:middle;text-align:center;">Delete</th>

									</tr>
								</thead>

								<tbody>
									<?php $i=1; foreach ($case_type as $key => $value) { ?>
										<tr>
											<td class="center"><?php echo $i;?></td>
											<td><?php echo $case_type[$key]['case_type'];?></td>
											<td>
												<center>
													<a href="#edit<?php echo $case_type[$key]['id'];?>" data-original-title="edit product" data-toggle="modal" class="tooltip-danger" data-rel="tooltip" title=""> 
														<button data-original-title="Edit Product">
															<i class="ace-icon fa fa-pencil bigger-120 green"></i>
														</button>
													</a>
												</center>
												<div class="modal fade" id="edit<?php echo $case_type[$key]['id'];?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<?php echo form_open('indicator/case_type_update/'.$case_type[$key]['id']);?>
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																<h4 class="modal-title center bolder green"> 
																	<i class="ace-icon fa fa-pencil bigger-120 green"></i>&nbsp;&nbsp;
																	<!-- changed case_type_name to case_type -->
																	Edit case_type Detail : <?php echo $case_type[$key]['case_type'];?></h4>
																	<div class="space-6"></div>

																	<div class="row">
																		<div class="col-xs-12">
																			<div class="form-group">
																				<label class="col-sm-3 control-label bolder blue" for="form-field-1"> નામ : </label>
																				<div class="input-group col-sm-9">
																					<!-- changed case_type_name to case_type -->
																					<input type="text" id="form-field-1" name="case_type" value="<?php echo $case_type[$key]['case_type'];?>" class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																		</div>
																	</div>

																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-success">Submit</button>
																	<button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</td>
											<td>
												<center>
													<a href="#delete<?php echo $case_type[$key]['id'];?>" data-original-title="delete product" data-toggle="modal" class="tooltip-danger" data-rel="tooltip" title=""> 
														<button data-original-title="Delete Product" class="">
															<i class="ace-icon fa fa-trash-o bigger-120 red"></i>
														</button>
													</a>
												</center>
												<div class="modal fade" id="delete<?php echo $case_type[$key]['id'];?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																<h4 class="modal-title"> Are you sure you want to delete ? </h4>
															</div>

															<div class="modal-footer">
																<button type="button" onclick="window.location.href='<?php echo site_url('indicator/case_type_delete/'.$case_type[$key]['id']);?>'"  class="btn btn-success">Yes</button>
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

