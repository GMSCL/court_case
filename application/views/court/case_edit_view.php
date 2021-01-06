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

			<li class="active">Update Case</li>
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
				<h1 class="center green bold">
					<i class="menu-icon fa fa-star black"></i>
					Update Case
					<i class="menu-icon fa fa-star black"></i>
				</h1>
				</br></br>
				<h5><span class="red"><strong>*(star)</strong> ચિહ્નિત વિગત ફરજિયાત ભરવી.</span></h5>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-close"></i>
							</button>
							<i class="ace-icon fa fa-user green"></i>
							<strong class="green">
								<?php echo $this->session->flashdata('message');?>
							</strong>
						</div>
					<?php } ?>
					<?php echo form_open_multipart('court_case/update_court_case/'.$id, 'class="form-horizontal"  id="case_updation" name="case_updation" ')?>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> શાખા : </label>
							<div class="col-sm-3">
								<select class="form-control" name="department_id"  disabled>
									<option value="<?= $data[0]['id']?>"><?= $data[0]['department_name']?></option>
								</select>
							</div>
							<span class="red">*</span>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કઈ કોર્ટમાં કેસ ચાલે છે : </label>
							<div class="col-sm-3">
								<select class="form-control" name="court_id" id="court_id" readonly>
									<option value="<?= $data[0]['court_id'];?>"> <?= $data[0]['court_name'];?>  </option>
									<?php foreach ($court as $key => $value) { ?>
										<option value="<?= $court[$key]['court_id']?>" <?php echo set_select('court_name',$court[$key]['court_id'], ( !empty($court) && $court == $court[$key]['court_id'] ? TRUE : FALSE )); ?>><?= $court[$key]['court_name']?></option>
									<?php } ?>
								</select>
							</div>
							<span class="red">*</span>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1" readonly> કેસનો પ્રકાર : </label>
							<div class="col-sm-3">
								<select class="form-control" name="case_type_id" id="case_type_id">
									<option value="<?= $data[0]['case_type_id'];?>"> <?= $data[0]['case_type'];?>  </option>
									<?php foreach ($case_type as $key => $value) { ?>
										<option value="<?= $case_type[$key]['id']?>"><?= $case_type[$key]['case_type']?></option>
									<?php } ?>
								</select>
							</div>
							<span class="red">*</span>
							<div id="case_type_id_error" class="errorDiv">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1" > કેસ ટાઇટલ :  </label>
							<div class="col-sm-3">
								<input type="text" name="case_title" id="case_title" value="<?php echo $data[0]['case_title'];?>"  class="form-control">
							</div>
							<span class="red">*</span>
							<span class="red"><?php  echo form_error('case_title'); ?></span>
							<div id="case_title_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ રજીસ્ટર તારીખ : </label> 						
							<div  class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="register_date" name="register_date" value="<?php  if($data[0]['register_date'] != '0000-00-00') { echo $this->my_model->date_format_2($data[0]['register_date']); }?>" type="text" data-date-format="dd-mm-yyyy">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ નંબર :  </label>
							<div class="col-sm-3">
								<input type="text" name="case_no" id="case_no" value="<?php echo $data[0]['case_no'];?>" class="form-control">
							</div>
							<span class="red">*</span>
							<span class="red"><?php  echo form_error('case_no'); ?></span>
							<div id="case_no_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> અરજદારનું નામ : </label>
							<div class="col-sm-3">
								<input type="text" name="applicant_id" id="applicant_id" value="<?php echo $data[0]['applicant_id'];?>"  class="form-control">
							</div>
							<span class="red">*</span>
							<span class="red"><?php echo form_error('applicant_id'); ?></span>
							<div id="applicant_id_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> એડવોકેટનું નામ : </label>
							<div class="col-sm-3">
								<select class="form-control" name="advocate_id" id="advocate_id">
									<option value="<?= $data[0]['advocate_id'];?>"> <?= $data[0]['advocate_name'];?>  </option>
									<?php foreach ($advocate as $key => $value) { ?>
										<option value="<?= $advocate[$key]['advocate_id']?>" <?php echo set_select('made_advocate',$advocate[$key]['advocate_id'], ( !empty($advocate) && $advocate == $advocate[$key]['advocate_id'] ? TRUE : FALSE )); ?>><?= $advocate[$key]['advocate_name']?></option>
									<?php } ?>
								</select>
							</div>
							<span class="red">*</span>
							<span class="red"><?php  echo form_error('court'); ?></span>
							<div id="advocate_id_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> સદર કોર્ટ માં એફિડેવિટ કરવામાં આવેલ હોય તો તે તારીખ : </label> 
							<div class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="affidavit_date" name="affidavit_date" type="text" value="<?php if($data[0]['affidavit_date'] != '0000-00-00') { echo $this->my_model->date_format_2($data[0]['affidavit_date']);}else{ echo '';}?>" data-date-format="dd-mm-yyyy">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ સ્ટેટસ : </label> 
							<div class="col-sm-3 input-group ">
								<div class="controls"> 
									<label> <input name="case_status" id="case_status" type="radio" class="ace" value="1" <?php if($data[0]['case_status'] == '1') { echo 'checked';} ?> > <span class="lbl"> પૂર્ણ </span> </label>
									<label> <input name="case_status" id="case_status" type="radio" class="ace" value="0" <?php if($data[0]['case_status'] == '0') { echo 'checked';} ?>> <span class="lbl"> ચાલુ </span> </label> 
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વચગાળાનો હુકમ જારી થયેલ છે? : </label> 
							<div class="col-sm-3 input-group ">
								<div class="controls"> 	
									<label> <input name="interim_order_issued" id="interim_order_issued" type="radio" class="ace" value="1" <?php if($data[0]['interim_order_issued'] == '1') { echo 'checked';} ?> > <span class="lbl">  હા </span> </label>
									<label> <input name="interim_order_issued" id="interim_order_issued" type="radio" class="ace" value="0" <?php if($data[0]['interim_order_issued'] == '0') { echo 'checked';} ?> > <span class="lbl"> ના </span> </label> 
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વચગાળાનો હુકમ જારી થયા તારીખ : </label> 
							<div class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="interim_order_issue_date" name="interim_order_issue_date" type="text" value="<?php if($data[0]['interim_order_issued_on'] == '0000-00-00') { echo '';}else{ echo $this->my_model->date_format_2($data[0]['interim_order_issued_on']);}?>" data-date-format="dd-mm-yyyy" >
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
							<div id="interim_order_issue_date_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વચગાળાનો હુકમ :  </label>
							<div class="col-sm-3">
								<textarea name="interim_order" id="interim_order" cols="120" rows="4"><?= $data[0]['interim_order'];?></textarea>
							</div>
							<div id="interim_order_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1" > આવતી સુનવણીની તારીખ : </label> 
							<div class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="appeal_date" name="appeal_date" type="text" value="<?php if($data[0]['appeal_date'] == '0000-00-00') { echo '';}else{ echo $this->my_model->date_format_2($data[0]['appeal_date']);}?>" data-date-format="dd-mm-yyyy" >
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
						<!-- <h5> <?php echo $data[0]['case_status'] ?></h5> -->
						

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> ચુકાદો : </label> 
							<div class="col-sm-3 input-group ">
								<div class="controls"> 
									<label> <input name="court_judgement" id="court_judgement" type="radio" class="ace" value="0" <?php if($data[0]['court_judgement'] == '0') { echo 'checked';} ?> > <span class="lbl"> વિપરીત </span> </label>
									<label> <input name="court_judgement" id="court_judgement" type="radio" class="ace" value="1" <?php if($data[0]['court_judgement'] == '1') { echo 'checked';} ?>> <span class="lbl"> તરફેંણમાં</span> </label> 
								</div>
							</div>
							<div id="court_judgement_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કોર્ટ નો હુકમ :  </label>
							<div class="col-sm-3">
								<textarea name="court_order" id="court_order" cols="120" rows="4"><?= $data[0]['court_order'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> હુકમનું અમલિકરણ થઈ ગયું? : </label> 
							<div class="col-sm-3 input-group ">
								<div class="controls"> 
									<label> <input name="implementation_status" id="implementation_status" type="radio" class="ace" value="1" <?php if($data[0]['implementation_status'] == '1') { echo 'checked';} ?> > <span class="lbl"> હા </span> </label>
									<label> <input name="implementation_status" id="implementation_status" type="radio" class="ace" value="0" <?php if($data[0]['implementation_status'] == '0') { echo 'checked';} ?>> <span class="lbl"> ના </span> </label> 
								</div>
							</div>
							<div id="implementation_status_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> અમલવારી કર્યા તારીખ : </label> 
							<div class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="order_implementation_date" name="order_implementation_date" type="text" data-date-format="dd-mm-yyyy" value="<?php if($data[0]['order_implementation_date'] == '0000-00-00'){ echo '';} else { echo $this->my_model->date_format_2($data[0]['order_implementation_date']);}?>">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
							<div id="order_implementation_date_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> હુકમ ના અમલિકરણની છેલ્લી તારીખ : </label> 
							<div class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="order_compliance_date" name="order_compliance_date" type="text" data-date-format="dd-mm-yyyy" value="<?php if($data[0]['order_compliance_date'] == '0000-00-00'){ echo '';} else { echo $this->my_model->date_format_2($data[0]['order_compliance_date']);}?>">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>

						<!-- hid following field as it is not required for now -->
						<div class="form-group" hidden>
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વિપરીત ચુકાદાના અંજામ બાદ જિલ્લા પંચાયત પડતો નાણાકીય ખર્ચ :  </label>
							<div class="col-sm-3">
								<input type="text" name="expense" id="expense" value="<?$data[0]['expense'];?>" placeholder="નાણાકીય ખર્ચ" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> ચુકાદા બાદ અપીલ કરવા પાત્ર જણાય છે? : </label> 
							<div class="col-sm-3 input-group ">
								<div class="controls">
									<label> <input name="appealed" id="appealed" type="radio" class="ace" value="1" <?php if($data[0]['appealed'] == '1') { echo 'checked';} ?> > <span class="lbl"> હા </span> </label>
									<label> <input name="appealed" id="appealed" type="radio" class="ace" value="0" <?php if($data[0]['appealed'] == '0') { echo 'checked';} ?>> <span class="lbl"> ના </span> </label> 
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> અપીલ કરવાની છેલ્લી તારીખ : </label> 
							<div class="col-sm-3 input-group ">
								<input class="form-control dt-picker" id="last_date_to_appeal" name="last_date_to_appeal" type="text" data-date-format="dd-mm-yyyy"  value="<?php if($data[0]['last_date_to_appeal'] == '0000-00-00'){ echo '';} else { echo $this->my_model->date_format_2($data[0]['last_date_to_appeal']);} ?>">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
							<div id="last_date_to_appeal_error" class="errorDiv">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કોર્ટ કેસ ની ટૂંકી વિગત :  </label>
							<div class="col-sm-3">
								<textarea name="short_note_of_case" id="short_note_of_case" cols="120" rows="4"><?= $data[0]['short_note_of_case'];?></textarea>
							</div>
						</div>

						<!-- </div> -->
						<div class="space-4"></div>

						<center>
							<button type="submit" data-original-title="Edit Product" class="" >
								<i class="ace-icon fa fa-pencil bigger-120 green"> Submit </i>
							</button>
						</center>

						<!-- </div> -->
					</form>
				</div>
			</div>

			<div class="space-12"></div>
			<div class="hr hr2 hr-double"></div>
			<div class="space-1"></div>

			<?php echo form_open_multipart('court_case/add_appeal', 'class="form-horizontal" ')?>
				<div class="row">
					<div class="col-xs-12">
						<div class="main-box clearfix">
							<h3 class="center green bold">
								<i class="menu-icon fa fa-star black"></i>
								સુનવણીની વિગત
								<i class="menu-icon fa fa-star black"></i>
							</h3>
						</div>
					</div>
					<div class="hr hr2 hr-double"></div>
					<div class="space-2"></div>
					<input type="hidden" name="id" value="<?=$id?>">
					<div class="col-sm-3">
						<h4 class="header blue lighter smaller">
							<i class="ace-icon fa fa-calendar smaller-90"></i>
							છેલ્લી સુનવણીની તારીખ
						</h4>
						<div class="input-group ">
							<input class="form-control dt-picker"  name="new_appeal_date" id="new_appeal_date" type="text" value="<?php echo $this->my_model->date_format_2($data[0]['appeal_date']);?>" data-date-format="dd-mm-yyyy">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
					</div>

					<div class="col-sm-4">
						<h4 class="header blue lighter smaller">
							<i class="ace-icon fa fa-star smaller-90"></i>
							છેલ્લી સુનવણીની વિગત :
						</h4>
						<div class="input-group col-sm-12">
							<!-- <input type="text" name="last_date_short_note" id="last_date_short_note" class="form-control"> -->
							<textarea id="last_date_short_note" name="last_date_short_note"  cols="50" rows="1"></textarea>
						</div>
					</div>

					<div class="col-sm-3">
						<h4 class="header blue lighter smaller">
							<i class="ace-icon fa fa-calendar smaller-90"></i>
							આવતી સુનવણીની તારીખ
						</h4>
						<div class="input-group ">
							<input class="form-control dt-picker"  name="appeal_date" id="appeal_date" type="text" data-date-format="dd-mm-yyyy">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
					</div>

					<div class="col-sm-2">
						<h4 class="header blue lighter smaller">
							<i class="ace-icon fa fa-star smaller-90"></i>
							Save
						</h4>

						<button type="submit" class="btn btn-white btn-default btn-round">
							<i class="ace-icon fa fa-plus red2"></i>
							Save
						</button>
					</div>		
				</div>
			</form>

			<div class="space-12"></div>
			<div class="hr hr2 hr-double"></div>
			<div class="space-12"></div>

			<div class="row">
				<div class="col-sm-12">
					<div class="main-box clearfix">
						<!-- <header class="main-box-header clearfix">
							&nbsp;<h5 class="bold green"> <i class="ace-icon fa fa-plus star"></i>  વિગત  </h5>-
						</header> -->
					</div>
					<div class="space-2"></div>
						<table id="mttable" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>ક્રમ</th>
									<th width="20%">છેલ્લી સુનવણીની તારીખ</th>
									<th>છેલ્લી સુનવણીની વિગત </th>
									<th>Delete </th>
								</tr>
							</thead>

							<tbody>
								<?php $i=1; foreach ($case_hearing as $key => $value) { ?>
									<tr>
										<td class="center"><?php echo $i;?></td>
										<td><?php echo $this->my_model->date_format_2($case_hearing[$key]['case_hearing_date']);?></td>
										<td><?php echo $case_hearing[$key]['last_date_short_note'];?></td>
										<td>
											<center>
												<a href="#delete<?php echo $case_hearing[$key]['id'];?>" data-original-title="delete product" data-toggle="modal" class="tooltip-danger" data-rel="tooltip" title=""> 
													<button data-original-title="Delete Product" class="">
														<i class="ace-icon fa fa-trash-o bigger-120 red"></i>
													</button>
												</a>
											</center>
											<div class="modal fade" id="delete<?php echo $case_hearing[$key]['id'];?>">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4 class="modal-title"> Are you sure you want to delete ? </h4>
														</div>

														<div class="modal-footer">
															<button type="button" onclick="window.location.href='<?php echo site_url('court_case/case_hearing_delete/'.$id.'/'.$case_hearing[$key]['id']);?>'"  class="btn btn-success">Yes</button>
															<button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<?php $i++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!-- /.page-content area -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->

<script type="text/javascript">
	$(function() {
		// toggle judgement based on case status
	    $('input[name="case_status"]').on('click', function() {
	        if ($(this).val() == '1') {
	            $('#court_judgement').parent().parent().parent().parent().removeClass("hidden");
				if ($('input[name="court_judgement"]:checked').val() == '0') {
					$('#court_order').parent().parent().removeClass("hidden");
					$('#order_compliance_date').parent().parent().removeClass("hidden");
					$('#implementation_status').parent().parent().parent().parent().removeClass("hidden");;
					$('#appealed').parent().parent().parent().parent().removeClass("hidden");
				}
				$('#appeal_date').parent().parent().addClass("hidden");
				$('#interim_order_issued').parent().parent().parent().parent().addClass("hidden");
				$('#interim_order_issue_date').parent().parent().addClass("hidden");
				$('#interim_order').parent().parent().addClass("hidden");

	        } else {
	            $('#court_judgement').parent().parent().parent().parent().addClass("hidden");
				$('#order_compliance_date').parent().parent().addClass("hidden");
				$('#implementation_status').parent().parent().parent().parent().addClass("hidden");;
				$('#appealed').parent().parent().parent().parent().addClass("hidden");
				$('#last_date_to_appeal').parent().parent().addClass("hidden");
				$('#appeal_date').parent().parent().removeClass("hidden");
				$('#order_implementation_date').parent().parent().addClass("hidden");
				$('#court_order').parent().parent().addClass("hidden");
				$('#interim_order_issued').parent().parent().parent().parent().removeClass("hidden");
				$('#interim_order_issue_date').parent().parent().removeClass("hidden");
				$('#interim_order').parent().parent().removeClass("hidden");
	        }
	    });

		$('input[name="implementation_status"]').on('click', function() {
	        if ($(this).val() == '1') {
	            $('#order_implementation_date').parent().parent().removeClass("hidden");
	        } else {
	            $('#order_implementation_date').parent().parent().addClass("hidden");
	        }
	    });

		$('input[name="court_judgement"]').on('click', function() {
	        if ($(this).val() == '0') {
	            $('#court_order').parent().parent().removeClass("hidden");
				$('#order_compliance_date').parent().parent().removeClass("hidden");
				$('#implementation_status').parent().parent().parent().parent().removeClass("hidden");;
				if ($('input[name="implementation_status"]:checked').val() == '1') {
					$('#order_implementation_date').parent().parent().removeClass("hidden");
				}
				$('#appealed').parent().parent().parent().parent().removeClass("hidden");
				if ($('input[name="appealed"]:checked').val() == '1') {
					$('#order_implementation_date').parent().parent().removeClass("hidden");
				}
	        } else {
	            $('#court_order').parent().parent().addClass("hidden");
				$('#order_compliance_date').parent().parent().addClass("hidden");
				$('#implementation_status').parent().parent().parent().parent().addClass("hidden");;
				$('#appealed').parent().parent().parent().parent().addClass("hidden");
				$('#last_date_to_appeal').parent().parent().addClass("hidden");
				$('#order_implementation_date').parent().parent().addClass("hidden");
	        }
	    });
		
		$(document).ready(function() {

			if ($('input[name="implementation_status"]:checked').val() == '1') {
				$('#order_implementation_date').parent().parent().removeClass("hidden");
			} else {
				$('#order_implementation_date').parent().parent().addClass("hidden");
			}

			if ($('input[name="court_judgement"]:checked').val() == '1') {
				$('#court_order').parent().parent().addClass("hidden");
				$('#order_compliance_date').parent().parent().addClass("hidden");
				$('#appealed').parent().parent().parent().parent().addClass("hidden");
				$('#implementation_status').parent().parent().parent().parent().addClass("hidden");;
				$('#order_implementation_date').parent().parent().addClass("hidden");
			} else {
				$('#court_order').parent().parent().removeClass("hidden");
				$('#order_compliance_date').parent().parent().removeClass("hidden");
				$('#appealed').parent().parent().parent().parent().removeClass("hidden");
				$('#implementation_status').parent().parent().parent().removeClass("hidden");;
				if ($('input[name="implementation_status"]:checked').val() == '1') {
					$('#order_implementation_date').parent().parent().removeClass("hidden");
				}
			}

			if ($('input[name="case_status"]:checked').val() == '1') {
				$('#court_judgement').parent().parent().parent().parent().removeClass("hidden");
				$('#appeal_date').parent().parent().addClass("hidden");
				$('#interim_order_issued').parent().parent().parent().parent().addClass("hidden");
				$('#interim_order_issue_date').parent().parent().addClass("hidden");
				$('#interim_order').parent().parent().addClass("hidden");
			} else {
				$('#court_judgement').parent().parent().parent().parent().addClass("hidden");
				$('#court_order').parent().parent().addClass("hidden");
				$('#order_compliance_date').parent().parent().addClass("hidden");
				$('#appealed').parent().parent().parent().parent().addClass("hidden");
				$('#implementation_status').parent().parent().parent()	.parent().addClass("hidden");
				$('#interim_order_issued').parent().parent().parent().parent().removeClass("hidden");
				$('#interim_order_issue_date').parent().parent().removeClass("hidden");
				$('#interim_order').parent().parent().removeClass("hidden");
			}			

			if ($('input[name="interim_order_issued"]:checked').val() == '0') {
				$('#interim_order_issue_date').parent().parent().addClass("hidden");
				$('#interim_order').parent().parent().addClass("hidden");
			} else {
				$('#interim_order_issue_date').parent().parent().removeClass("hidden");
				$('#interim_order').parent().parent().removeClass("hidden");
			}

			if ($('input[name="appealed"]:checked').val() == '1') {
				$('#last_date_to_appeal').parent().parent().removeClass("hidden");
			} else {
				$('#last_date_to_appeal').parent().parent().addClass("hidden");
			}

			
		});

		// toggle last date for appeal based on appealed 
		$('input[name="appealed"]').on('click', function() {
	        if ($(this).val() == '1') {
				$('#last_date_to_appeal').parent().parent().removeClass("hidden");
	        }
	        else {
				$('#last_date_to_appeal').parent().parent().addClass("hidden");
	        }
	    });

		// validate order implementatoin date to be a future date.
		$('input[name="order_implementation_date"]').on('change', function(){
			dateStr = $(this).val();			
			var dateParts = dateStr.split("-");
			var implementationDate = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
			let currentDate = new Date();
			currentDate.setHours(0, 0, 0, 0); //  to ignore time part while comparing date.
			if (implementationDate > currentDate) {
				// Please select a future date for case hearing.
				alert('"અમલવારી કર્યા તારીખ" માં કૃપા કરીને પાછલી અથવા વર્તમાન તારીખ પસંદ કરો !');
				$('#order_implementation_date').val('');
				$('#order_implementation_date').focus();
			}
		});

		// toggle fields based on interim_order_issued yes/no 
		$('input[name="interim_order_issued"]').on('click', function() {
	        if ($(this).val() == '0') {
				$('#interim_order_issue_date').parent().parent().addClass("hidden");
				$('#interim_order').parent().parent().addClass("hidden");
				$('#interim_order_issue_date').val('');
            	$('#interim_order').empty();
	        }
	        else {
				$('#interim_order_issue_date').parent().parent().removeClass("hidden");
				$('#interim_order').parent().parent().removeClass("hidden");
	        }
	    });
	});
</script>