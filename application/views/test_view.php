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

			<li class="active">Add જાવક</li>
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
					ડીઝલ/કેરોસીન જાવક
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Add your જાવક detail...
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- <h2 class="center"> Add Customer</h2> -->
					<?php echo form_open('fuel/insert_javak', 'class="form-horizontal"')?>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> પ્રકાર : </label>
						<div class="col-sm-3">
							<select class="form-control" name="fuel_type" id="form-field-select-1">
								<option value="">પ્રકાર</option>
								<?php foreach ($fuel_type as $key => $value) { ?>
									<option value="<?= $fuel_type[$key]['id']?>">"<?= $fuel_type[$key]['name']?>"</option>
								<?php } ?>
							</select>
							<!-- <span class="red"><?php  echo form_error('name'); ?></span> -->
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> કેટેગરી : </label>
						<div class="col-sm-3">
							<select class="form-control" name="f_used_in" id="form-field-select-1">
								<option value=""> યુઝ્ડ</option>
								<?php foreach ($f_used_in as $key => $value) { ?>
									<option value="<?= $f_used_in[$key]['id']?>">"<?= $f_used_in[$key]['name']?>"</option>
								<?php } ?>
							</select>
							<!-- <span class="red"><?php  echo form_error('name'); ?></span> -->
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> લિટર : </label>
						<div class="col-sm-3">
							<input type="text" name="qty" id="form-field-1" placeholder="લિટર" class="form-control">
							<span class="red"><?php  echo form_error('qty'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> તારીખ : </label>
						<div class="col-sm-3">
							<div class="input-group">
								<input class="form-control dt-picker" id="date-picker" name="date" type="text" data-date-format="dd-mm-yyyy" required="">
								<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
							<span class="red"><?php  echo form_error('date'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> નોધ : </label>
						<div class="col-sm-3">
							<input type="text" name="remark" id="form-field-1" placeholder="નોધ" class="form-control">
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
							જાવક લિસ્ટ : 												
						</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table id="myTable" class="table table-striped table-bordered table-hover">
								<thead class="thin-border-bottom">
									<tr>
										<th class="center" width="5%">
											ક્રમ  
										</th>
										<th>પ્રકાર</th>
										<th>used in</th>
										<th>qty</th>
										<th>તારીખ</th>
										<th>રીમાર્ક</th>
										<!-- <th>Edit</th> -->
										<th>Delete</th>

									</tr>
								</thead>

								<tbody>
									<?php $i=1; foreach ($f_javak as $key => $value) { ?>
									<tr>
										<td class="center"><?php echo $i;?></td>
										<td><?php echo ucfirst($f_javak[$key]['fuel_type']);?></td>
										<td><?php echo ucfirst($f_javak[$key]['used_in']);?></td>
										<td><?php echo ucfirst($f_javak[$key]['qty']);?></td>
										<td><?php echo $this->fuel_model->date_format_2($f_javak[$key]['date']);?></td>
										<td><?php echo ucfirst($f_javak[$key]['remark']);?></td>
										
										<td>
											<center>
												<a href="#delete<?php echo $f_javak[$key]['id'];?>" data-original-title="delete product" data-toggle="modal" class="tooltip-danger" data-rel="tooltip" title=""> 
													<button data-original-title="Delete Product" class="">
														<i class="ace-icon fa fa-trash-o bigger-120 red"></i>
													</button>
												</a>
											</center>
											<div class="modal fade" id="delete<?php echo $f_javak[$key]['id'];?>">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4 class="modal-title"> Are you sure you want to delete ? </h4>
														</div>

														<div class="modal-footer">
															<button type="button" onclick="window.location.href='<?php echo site_url('fuel/f_javak_delete/'.$f_javak[$key]['id']);?>'"  class="btn btn-success">Yes</button>
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

							<table class="table table-striped table-bordered table-hover">
								<tr>
									<td colspan="2">  ટોટલ સિમેન્ટ થેલી : <b><?= $total_qty[0]['total_qty']?></b></td>
								</tr>	
							</table>
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.page-content area -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->

