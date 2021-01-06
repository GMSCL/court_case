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

			<li class="active">View Cases</li>
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
				<h1> View Cases </h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<?php echo form_open('court_case/search_court_case', 'class="form-horizontal"')?>
						<div class="col-xs-12 hidden">
							<div class="col-md-2">
								<label class="control-label bolder blue"> શાખા  :</label>
								<br>
								<div class="input-daterange input-group">
									<select class="form-control" name="department_id" >
										<option value="all">  ALL </option>
										<?php foreach ($department as $key => $value) { ?>
											<option value="<?= $department[$key]['id']?>"><?= $department[$key]['department_name']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<label class="control-label bolder blue"> કોર્ટ  :</label>
								<br>
								<div class="input-daterange input-group">
									<select class="form-control" name="court" >
										<option value="all">  ALL </option>
										<?php foreach ($court as $key => $value) { ?>
											<option value="<?= $court[$key]['court_id']?>"><?= $court[$key]['court_name']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<label class="control-label bolder blue"> કેસનો પ્રકાર  :</label>
								<br>
								<div class="input-daterange input-group">
									<select class="form-control" name="case_type" id="case_type">
										<option value="all">  ALL </option>
										<?php foreach ($case_type as $key => $value) { ?>
											<option value="<?= $case_type[$key]['id']?>"><?= $case_type[$key]['case_type']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<label class="control-label bolder blue"> નાણાકીય ખર્ચ  :</label>
								<br>
								<div class="input-daterange input-group">
									<select class="form-control" name="financial_expense">
										<option value="">  નાણાકીય ખર્ચ </option>
										<?php foreach ($financial_expense as $key => $value) { ?>
											<option value="<?= $financial_expense[$key]['id']?>"><?= $financial_expense[$key]['from_rupees']. " - ".$financial_expense[$key]['to_rupees']; ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<label class="control-label bolder blue">સુનવણી તારીખ :</label>
								<br>
								<div class="input-daterange input-group">
									<input type="text" class="input-sm form-control" name="start_date">
									<span class="input-group-addon">
										<i class="fa fa-exchange"></i>
									</span>

									<input type="text" class="input-sm form-control" name="end_date">
								</div>
							</div>

						</div>
						<div class="col-xs-12 hidden">
							<br />
							<div class="col-md-4">
								<label class="control-label bolder blue"> કેટલા સમયથી પેન્ડિંગ છે (દિવસમાં) :</label>
								<br>
								<div class="input-group">
									<input type="text" class="input-sm form-control" name="start_day">
									<span class="input-group-addon">
										<i class="fa fa-exchange"></i>
									</span>

									<input type="text" class="input-sm form-control" name="end_day">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label bolder blue">Search :</label>
								<br>
								<button type="submit" class="btn btn-sm btn-primary">
									<i class="ace-icon fa fa-search"></i>
									<span class="bigger-110">Search</span>
								</button>
							</div>
						</div>
					</form>
					
					<div class="col-sm-12">
						<br/>
						<br/>
						<div class="widget-box widget-color-blue ui-sortable-handle">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									કોર્ટ કેસ રજીસ્ટર Detail : 												
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
												<td>શાખા</td>
												<td>કેસ ટાઇટલ</td>
												<td>કેસ નંબર</td>
												<td>કઈ કોર્ટમાં કેસ ચાલે છે</td>
												<td>અરજદારનું નામ</td>
												<td>એડવોકેટનું નામ</td>
												<td>વચગાળાનો હુકમ જારી થયેલ છે ?</td>
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
												<td><?php echo $data[$key]['department_name'];?></td>
												<td><?php echo $data[$key]['case_title'];?></td>
												<td><?php echo $data[$key]['case_no'];?></td>
												<td><?php echo $data[$key]['court_name'];?></td>
												<td><?php echo $data[$key]['applicant_id'];?></td>
												<td><?php echo $data[$key]['advocate_name'];?></td>
												<td><?php if ($data[$key]['interim_order_issued'] == 1) { echo "હા"; } else { echo "ના"; };?></td>
												<td><?php if($data[$key]['appeal_date'] == '0000-00-00') { echo "";} else { echo $this->my_model->date_format_2($data[$key]['appeal_date']) ;} ?></td>
												
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
																<i class="ace-icon fa fa-print bigger-120"></i>
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
																	<button type="button" onclick="window.location.href='<?php echo site_url('court_case/court_case_delete/'.$data[$key]['id']);?>'"  class="btn btn-success">Yes</button>
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

