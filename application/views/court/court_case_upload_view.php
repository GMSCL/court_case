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

			<li class="active"> Add New Case </li>
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
					Add New Case
					<i class="menu-icon fa fa-star black"></i>
				</h1>
				</br></br>
				<h5><span class="red"><strong>*(star)</strong> ચિહ્નિત વિગત ફરજિયાત ભરવી. નવા એડવોકેટ અથવા કોર્ટ દાખલ કરવા માટે માસ્ટર મેન્યુમાં એન્ટ્રી કરવી. </span></h5>
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
					<!-- <h2 class="center"> Add Customer</h2> -->
					<?php echo form_open_multipart('court_case/insert_court_case', 'class="form-horizontal" id="case_registration" name="case_registration" ')?>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> શાખા : </label>
						<div class="col-sm-3">
							<select class="form-control" name="department_id" disabled>
								<option value="<?= $department[0]['id']?>"><?= $department[0]['department_name']?></option>
							</select>
						</div>
						<span class="red">*</span>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કઈ કોર્ટમાં કેસ ચાલે છે : </label>
						<div class="col-sm-3">
							<select class="form-control" name="court_id" id="court_id" required>
								<option value="">  કોર્ટ </option>
								<?php foreach ($court as $key => $value) { ?>
									<option value="<?= $court[$key]['court_id']?>" <?php echo set_select('court_name',$court[$key]['court_id'], ( !empty($court) && $court == $court[$key]['court_id'] ? TRUE : FALSE )); ?>><?= $court[$key]['court_name']?></option>
								<?php } ?>
							</select>
						</div>
						<span class="red">*</span>
						<div id="court_id_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસનો પ્રકાર : </label>
						<div class="col-sm-3">
							<select class="form-control" name="case_type_id" id="case_type_id">
								<option value="">  કેસનો પ્રકાર </option>
								<?php foreach ($case_type as $key => $value) { ?>
									<option value="<?= $case_type[$key]['id']?>" <?php echo set_select('case_type_name',$case_type[$key]['id'], ( !empty($case_type) && $case_type == $case_type[$key]['id'] ? TRUE : FALSE )); ?>><?= $case_type[$key]['case_type']?></option>
								<?php } ?>
							</select>
						</div>
						<span class="red">*</span>
						<div id="case_type_id_error" class="errorDiv">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ ટાઇટલ :  </label>
						<div class="col-sm-3">
							<input type="text" name="case_title" id="case_title" value="<?php echo set_value('case_title');?>" placeholder="કેસ ટાઇટલ" class="form-control" >
						</div>
						<span class="red">*</span>
						<span class="red"><?php  echo form_error('case_title'); ?></span>
						<div id="case_title_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ નંબર :  </label>
						<div class="col-sm-3">
							<input type="text" name="case_no" id="case_no" value="<?php echo set_value('case_no');?>" placeholder="કેસ નંબર" class="form-control">
						</div>
						<span class="red">*</span>
						<span class="red"><?php  echo form_error('case_no'); ?></span>
						<div id="case_no_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ રજીસ્ટર તારીખ : </label> 
						<div class="col-sm-3 input-group ">
							<input class="form-control dt-picker" id="register_date" name="register_date" type="text" data-date-format="dd-mm-yyyy">
							<span  class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> અરજદારનું નામ : </label>
						<div class="col-sm-3">
							<input type="text" name="applicant_id" id="applicant_id" value="<?php echo set_value('applicant_id');?>" placeholder="અરજદારનું નામ" class="form-control">
						</div>
						<span class="red">*</span>
						<span class="red"><?php  echo form_error('applicant'); ?></span>
						<div id="applicant_id_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> એડવોકેટનું નામ : </label>
						<div class="col-sm-3">
							<select class="form-control" name="advocate_id" id="advocate_id" required>
								<option value="">  એડવોકેટ  </option>
								<?php foreach ($advocate as $key => $value) { ?>
									<option value="<?= $advocate[$key]['advocate_id']?>"><?= $advocate[$key]['advocate_name']?></option>
								<?php } ?>
							</select>
						</div>
						<span class="red">*</span>
						<span class="red"><?php  echo form_error('case_type'); ?></span>
						<div id="advocate_id_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> એફિડેવિટ ફાઇલ કરેલ છે ? : </label> 
						<div class="col-sm-3 input-group ">
							<div class="controls"> 
								<label> <input name="affidavit" type="radio" class="ace" value="1"> <span class="lbl"> હા </span> </label>
								<label> <input name="affidavit" type="radio" class="ace" value="0" checked> <span class="lbl"> ના</span> </label> 
							
							</div>
						</div>
					</div>

					<div class="form-group" id="show_div" style="display: none">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1" > સદર કોર્ટ માં એફિડેવિટ કરવામાં આવેલ હોય તો તે તારીખ : </label> 
						<div class="col-sm-3 input-group ">
							<input class="form-control dt-picker" id="affidavit_date" name="affidavit_date" type="text" data-date-format="dd-mm-yyyy">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
						<div id="affidavit_date_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ સ્ટેટસ : </label> 
						<div class="col-sm-3 input-group ">
							<div class="controls"> 	
								<label> <input name="case_status" type="radio" class="ace" value="1" disabled> <span class="lbl"> પૂર્ણ </span> </label>
								<label> <input name="case_status" type="radio" class="ace" value="0" checked> <span class="lbl"> ચાલુ </span> </label> 
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વચગાળાનો હુકમ જારી થયેલ છે? : </label> 
						<div class="col-sm-3 input-group ">
							<div class="controls"> 	
								<label> <input name="interim_order_issued" type="radio" class="ace" value="1" > <span class="lbl">  હા </span> </label>
								<label> <input name="interim_order_issued" type="radio" class="ace" value="0" checked> <span class="lbl"> ના </span> </label> 
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વચગાળાનો હુકમ જારી થયા તારીખ : </label> 
						<div class="col-sm-3 input-group ">
							<input class="form-control dt-picker" id="interim_order_issue_date" name="interim_order_issue_date" type="text" data-date-format="dd-mm-yyyy" >
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
							<textarea name="interim_order" id="interim_order" cols="120" rows="4"></textarea>
						</div>
						<div id="interim_order_error" class="errorDiv">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> આવતી સુનવણીની તારીખ :</label> 
						<div class="col-sm-3 input-group ">
							<input class="form-control dt-picker" id="appeal_date" name="appeal_date" type="text" data-date-format="dd-mm-yyyy" >
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
					</div>

					<div class="form-group" hidden>
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વિપરીત ચુકાદો
						 પડવાનો અંદાજીત નાણાકીય ખર્ચ :  </label>
						<div class="col-sm-3">
							<input type="text" name="expense" id="expense" value="<?php echo set_value('expence');?>" placeholder="નાણાકીય ખર્ચ" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કોર્ટ કેસ ની ટૂંકી વિગત :  </label>
						<div class="col-sm-3">
							<textarea name="short_note_of_case" id="short_note_of_case" cols="120" rows="4"></textarea>
						</div>
					</div>


					<div class="space-4"></div>

					<center>
						<a href="" data-original-title="edit milkat register" data-toggle="modal" class="tooltip-danger" data-rel="tooltip" title="" onclick="get_preview()">
							<button data-original-title="Edit Product" class="" id="preview">
								<i id="previewanchor" class="ace-icon fa fa-pencil bigger-120 green"> Preview </i>
							</button>
						</a>

					</center>
					<div class="modal fade" id="insert" hidden>
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title center bolder green">
										Are you sure you want to submit this ?
									</h4>
									<div class="space-6"></div>

									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-sm-4 control-label border blue" for="form-field-1"> શાખા : </label>
												<div class="input-group col-sm-8">
													<select class="col-xs-10 col-sm-8" id="department_id_pp" name="department_id_pp" disabled>
														<option value="<?= $department[0]['id']?>"><?= $department[0]['department_name']?></option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> કઈ કોર્ટમાં કેસ ચાલે છે : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="court_id_pp" name="court_id_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> કેસનો પ્રકાર : </label>
												<div class="input-group col-sm-8">
													<textarea name="case_type_id_pp" id="case_type_id_pp" cols="60" rows="1" readonly></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> કેસ ટાઇટલ : </label>
												<div class="input-group col-sm-8">
													<textarea name="case_title_pp" id="case_title_pp" cols="60" rows="1" readonly></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> કેસ નંબર : </label>
												<div class="input-group col-sm-8">
													<input type="text" name="case_no_pp" id="case_no_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> અરજદારનું નામ : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="applicant_pp" name="applicant_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> કેસ રજીસ્ટર તારીખ   : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="case_register_date_pp" name="case_register_date_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> એડવોકેટનું નામ : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="advocate_pp" name="advocate_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> સદર કોર્ટ માં એફિડેવિટ કરવામાં આવેલ હોય તો તે તારીખ : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="affidavit_date_pp" name="affidavit_date_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> વચગાળાનો હુકમ જારી થયા તારીખ : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="interim_order_issue_date_pp" name="interim_order_issue_date_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> વચગાળાનો હુકમ : </label>
												<div class="input-group col-sm-8">
													<textarea name="interim_order_pp" id="interim_order_pp" cols="80" readonly></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> આવતી સુનવણીની તારીખ : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="appeal_date_pp" name="appeal_date_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group" hidden>
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> વિપરીત ચુકાદાના અંજામ બાદ જિલ્લા પંચાયત પડતો નાણાકીય ખર્ચ   : </label>
												<div class="input-group col-sm-8">
													<input type="text" id="expense_pp" name="expense_pp"  class="col-xs-10 col-sm-8" readonly>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label bolder blue" for="form-field-1"> કોર્ટ કેસ ની ટૂંકી વિગત  : </label>
												<div class="input-group col-sm-8">
													<textarea name="short_note_of_case_pp" id="short_note_of_case_pp" cols="80" readonly></textarea>
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
			</form>
		</div><!-- /.page-content area -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->