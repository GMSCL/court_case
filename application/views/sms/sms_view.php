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

			<li class="active">Send SMS / Email</li>
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
				<h1> Send SMS / Email</h1>
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
				<div class="col-sm-12">
					<div class="widget-box widget-color-blue ui-sortable-handle">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter">
								<i class="ace-icon fa fa-envelope"></i>
								Send SMS & Email - કોર્ટ કેસ રજીસ્ટર વિગત  												
							</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
								<?php echo form_open_multipart('send_sms_email/send_sms', 'class="form-horizontal"')?>
									<table class="table table-striped table-bordered table-hover" id="myTable">
										<thead class="thin-border-bottom">
											<tr>

												<td class="center" width="5%">
													<i class="ace-icon fa fa-user"></i>
													ક્રમ  
												</td>
												<td>શાખા</td>
												<td>સુનવણી માટે રહેતા બાકી દિવસો</td>
												<td>કેસ ટાઇટલ</td>
												<td>કેસ નંબર</td>
												<td>કઈ કોર્ટમાં કેસ ચાલે છે</td>
												<td>અરજદારનું નામ</td>
												<td>એડવોકેટનું નામ</td>
												<td>આવતી સુનવણીની તારીખ</td>
												<td>Update </td>
												<td>View </td>
												<td>Delete </td>


											</tr>
										</thead>

										<tbody>
											<?php $i=1; foreach ($data as $key => $value) { ?>
											
											<?php
												date_default_timezone_set("Asia/Kolkata");

												$now = time(); // or your date as well
												$your_date = strtotime($data[$key]['appeal_date']);
												$datediff = $now - $your_date;

												$date_diff =  round($datediff / (60 * 60 * 24));

												if($date_diff == '15') {

											?>

											<input type="text" value="<?php echo $data[$key]['mobile_no'];?>" name="mobile_no[]">
											<input type="text" value="<?php echo $data[$key]['case_no'];?>" name="case_no[]">
											<input type="text" value="<?php echo $data[$key]['case_title'];?>" name="case_title[]">
											<input type="text" value="<?php echo $data[$key]['court_name'];?>" name="court_name[]">
											<input type="text" value="<?php echo $data[$key]['appeal_date'];?>" name="appeal_date[]"> 
											<input type="text" value="<?php echo $data[$key]['advocate_name'];?>" name="advocate_name[]"> 
											<input type="text" value="<?php echo $data[$key]['email'];?>" name="email[]"> 
											<input type="text" value="<?php echo $data[$key]['department_name'];?>" name="department_name[]"> 
											<input type="text" value="<?php echo $data[$key]['applicant_id'];?>" name="applicant_name[]"> 
											
											
											<tr>
												<td class="center"><?php echo $i;?></td>
												<td><?php echo $data[$key]['department_name'];?></td>
												<td class="center">
															
													<div class="infobox-progress">
													<div class="easy-pie-chart percentage" data-percent="<?php echo 100 - $date_diff;?>" data-size="46" style="height: 46px; width: 46px; line-height: 45px;">
														<span class="percent">
															<?php echo $date_diff  ;?>
														</span>
													<canvas height="46" width="46"></canvas></div>
													</div>
												</td>
												<td><?php echo $data[$key]['case_title'];?></td>
												<td><?php echo $data[$key]['case_no'];?></td>
												<td><?php echo $data[$key]['court_name'];?></td>
												<td><?php echo $data[$key]['applicant_id'];?></td>
												<td><?php echo $data[$key]['advocate_name'];?></td>
												<td><?php echo $this->my_model->date_format_2($data[$key]['appeal_date']);?></td>
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
																	<button type="button" onclick="window.location.href='<?php echo site_url('court_case/delete/'.$data[$key]['id']);?>'"  class="btn btn-success">Yes</button>
																	<button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<?php $i++;} }?>
										</tbody>
									</table>
									<center>
										<button type="submit" data-original-title="Edit Product" class="" >
											<i class="ace-icon fa fa-pencil bigger-120 green"> Submit </i>
										</button>
									</center>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- /.page-content area -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->

