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

	</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

<div class="page-content-area">
<div class="page-header hidden">
	<h1>
		 Detail
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Search  detail by  date
		</small>
	</h1>
</div><!-- /.page-header -->

					<!-- box -->
<!-- style -->
<style type="text/css">

.tile-stats.tile-green {
  background: #00a65a;
}

.tile-stats {
  position: relative;
  display: block;
  background: #303641;
  padding: 20px;
  margin-bottom: 10px;
  overflow: hidden;
  -webkit-border-radius: 5px;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 5px;
  -moz-background-clip: padding;
  border-radius: 5px;
  background-clip: padding-box;
  -moz-transition: all 300ms ease-in-out;
  -o-transition: all 300ms ease-in-out;
  -webkit-transition: all 300ms ease-in-out;
  transition: all 300ms ease-in-out;
}

.tile-stats.tile-green .icon {
  color: rgba(0, 0, 0, 0.1);
}



.tile-stats.tile-green .num, .tile-stats.tile-green h3, .tile-stats.tile-green p {
  color: #ffffff;
}

.tile-stats .num {
  font-size: 38px;
  font-weight: bold;
}

.tile-stats .num, .tile-stats h3, .tile-stats p {
  position: relative;
  color: #ffffff;
  z-index: 5;
  margin: 0;
  padding: 0;
}

.tile-stats.tile-red .icon {
    color: rgba(0, 0, 0, 0.1);
}
.page-container .tile-stats .icon {
    bottom: 35px;
}

.tile-stats .icon {
    color: rgba(0, 0, 0, 0.1);
    position: absolute;
    right: 5px;
    bottom: -4px;
    z-index: 1;
}



.tile-stats .icon i {
    font-size: 100px;
    /*line-height: 0;*/
    margin: 0px;
    padding: 0px;
    vertical-align: bottom;
}

.tile-stats.tile-red {
    background: none repeat scroll 0% 0% #F56954;
}

.tile-stats.tile-aqua {
    background: none repeat scroll 0% 0% #00C0EF;
}

.tile-stats.tile-blue {
    background: none repeat scroll 0% 0% #0073B7;
}

</style>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-close"></i>
			</button>
			<i class="ace-icon fa fa-user green"></i>
			&nbsp;

			Welcome 
			<strong class="green">
				 <?php echo $this->session->userdata('user_name');?> !
			</strong>
		</div>

		<div class="row">
			<div class="col-xs-12">
					<!-- strat here  -->

					<?php if($is_admin != '1') { $i=0; foreach ($case as $key => $value) { ?>
						<a href="<?php echo site_url('court_case/department_detail/'.$case[$key]['user_id']);?>">
							<div class="col-md-4">   
							    <div <?php if (0 == $i % 2) { echo 'class="tile-stats tile-red"'; } else { echo 'class="tile-stats tile-blue"'; } ?> >
							        <div class="icon"><i class="ace-icon fa fa-users "></i></div>
							        <div class="num" data-start="0" data-end="11" data-postfix="" data-duration="200" data-delay="0">
							        	<h3>શાખા : <?php echo $case[$key]['department_name'];?></h3>
							        </div>
							        
							        <h3> કુલ કોર્ટ કેસ :  <?php echo $case[$key]['total_case'];?></h3>
							        <h3> કુલ પેન્ડીંગ કેસ :  <?php echo $case[$key]['total_pending_case'];?></h3>
							        <h4 style="color:white !important;"> <?php echo date('M '); ?> મહિના માં થતી કુલ સુનાવણી :  <?php echo $case[$key]['total_appeal'];?></h4 style="font-color:white !important;">
							    </div>
						    </div>
						</a>
					<?php $i++;}  } else { ?>
						<div class="widget-box widget-color-green ui-sortable-handle">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									શાખા વાઈસ કોર્ટ રજીસ્ટર વિગત : 												
								</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									
									<table class="table table-striped table-bordered table-hover" >
										<thead class="thin-border-bottom">
											<tr>
												<td class="center" width="5%">
													<i class="ace-icon fa fa-user"></i>
													ક્રમ  
												</td>
												<td>શાખા</td>
												<td>કુલ કોર્ટ કેસ</td>
												<td>કુલ ચાલુ કેસ</td>
												<td><?php echo date('M '); ?> મહિના માં થતી કુલ સુનાવણી</td>
											</tr>
										</thead>

										<tbody>
											<?php $i=1; foreach ($case as $key => $value) { ?>
												<tr>
													<td class="center">
														<?php echo $i;?>
													</td>
													<td>
														<a href="<?php echo site_url('court_case/department_detail/'.$case[$key]['user_id']);?>">
														<?php echo $case[$key]['department_name'];?>	
														</a>
													</td>
													<td><?php echo $case[$key]['total_case'];?></td>
													<td><?php echo $case[$key]['total_pending_case'];?></td>
													<td><?php echo $case[$key]['total_appeal'];?></td>
												</tr>
											<?php $i++;} ?>
										</tbody>
									</table>
									
								</div>
							</div>
						</div>
					<?php } ?>

				<!-- end here -->
				
				<div class="col-sm-12">
					<div class="widget-box widget-color-blue ui-sortable-handle">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter">
								<i class="ace-icon fa fa-table"></i>
								  આવતી કુલ સુનવણી - કોર્ટ કેસ રજીસ્ટર  : 												
							</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
								
								<table class="table table-striped table-bordered table-hover" id="">
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
											<td>સુનવણી માટે રહેતા બાકી દિવસો</td>
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
											<td class="center">
														<?php
															date_default_timezone_set("Asia/Kolkata");
															$daydiff=floor((abs(strtotime(date("Y-m-d")) - strtotime($data[$key]['appeal_date']))/(60*60*24)));
														;?>
												<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="<?php echo 100 - $daydiff;?>" data-size="46" style="height: 46px; width: 46px; line-height: 45px;">
													<span class="percent">
														<?php echo $daydiff  ;?>
													</span>
												<canvas height="46" width="46"></canvas></div>
												</div>
											</td>
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
		</div>


		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.row -->
</div><!-- /.row -->