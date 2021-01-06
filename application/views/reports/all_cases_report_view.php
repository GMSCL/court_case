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
			<li class="active">All Cases</li>
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
				<h1> All Cases </h1>
			</div><!-- /.page-header -->

			<?= form_open('reports/view?name=all_cases_report');?>
				<div class="row">
					<div class="col-md-4">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ નંબર:  </label>
						<div class="col-sm-7">
							<input type="text" name="case_no" id="case_no" value="<?php echo set_value('case_no');?>" placeholder="કેસ નંબર" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<label class="col-sm-3 control-label bolder blue">તારીખ :</label>
						<br>
						<div class="input-daterange input-group">
							<input type="text" class="input-sm form-control" name="start">
							</br>
							<span class="input-group-addon">
								<i class="fa fa-exchange"></i>
							</span>
							<input type="text" class="input-sm form-control" name="end">
						</div>
					</div>
					<div class="col-md-4">
						<label class="col-sm-3 control-label no-padding-right bolder blue" for="form-field-1"> શાખા : </label>
						<div class="col-sm-7">
							<select class="form-control" name="department_id" >
								<!-- <option value="<?= $department[0]['id']?>"><?= $department[0]['department_name']?></option> -->
								<option value="">  શાખા </option>
								<?php foreach ($department as $key => $value) { ?>
									<option value="<?= $department[$key]['id']?>"><?= $department[$key]['department_name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</row>
				</br></br></br></br>
				<div class="row">
					<div class="col-md-4">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કોર્ટ : </label>
						<div class="col-sm-7">
							<select class="form-control" name="court_id" id="court_id" >
								<option value="">  કોર્ટ </option>
								<?php foreach ($court as $key => $value) { ?>
									<option value="<?= $court[$key]['court_id']?>" <?php echo set_select('court_name',$court[$key]['court_id'], ( !empty($court) && $court == $court[$key]['court_id'] ? TRUE : FALSE )); ?>><?= $court[$key]['court_name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<label class="col-sm-3 control-label no-padding-right bolder blue" for="form-field-1"> એડવોકેટ : </label>
						<div class="col-sm-7">
							<select class="form-control" name="advocate_id" id="advocate_id">
								<option value="">  એડવોકેટ  </option>
								<?php foreach ($advocate as $key => $value) { ?>
									<option value="<?= $advocate[$key]['advocate_id']?>"><?= $advocate[$key]['advocate_name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<label class="col-sm-3 control-label no-padding-right bolder blue" for="form-field-1"> કેસનો પ્રકાર : </label>
						<div class="col-sm-7">
							<select class="form-control" name="case_type_id" id="case_type_id">
								<option value="">  કેસનો પ્રકાર </option>
								<?php foreach ($case_type as $key => $value) { ?>
									<option value="<?= $case_type[$key]['id']?>" <?php echo set_select('case_type_name',$case_type[$key]['id'], ( !empty($case_type) && $case_type == $case_type[$key]['id'] ? TRUE : FALSE )); ?>><?= $case_type[$key]['case_type']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<br></br>
				<div class="row">
					<div class="col-md-4">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> કેસ સ્ટેટસ : </label> 
						<div class="col-sm-3 input-group ">
							<div class="controls"> 	
								<label> <input name="case_status" type="radio" class="ace" value="1"> <span class="lbl"> પૂર્ણ </span> </label>
								<label> <input name="case_status" type="radio" class="ace" value="0"> <span class="lbl"> ચાલુ </span> </label> 
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label class="col-sm-3 control-label no-padding-right bolder blue" for="form-field-1"> અરજદાર : </label>
						<div class="col-sm-7">
							<input type="text" name="applicant_id" id="applicant_id" value="<?php echo set_value('applicant_id');?>" placeholder="અરજદારનું નામ" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<label class="col-sm-3 control-label no-padding-right bolder blue" for="form-field-1"> ચુકાદો : </label> 
						<div class="col-sm-3 input-group ">
							<div class="controls"> 
								<label> <input name="court_judgement" type="radio" class="ace" value="0" > <span class="lbl"> વિપરીત </span> </label>
								<label> <input name="court_judgement" type="radio" class="ace" value="1" > <span class="lbl"> તરફેંણમાં</span> </label> 
							</div>
						</div>
					</div>				
				</div>
				<br></br>
				<div class="row">
					<div class="col-md-4">
						<label class="col-sm-4 control-label no-padding-right bolder blue" for="form-field-1"> વચગાળાનો હુકમ જારી છે? : </label> 
						<div class="col-sm-3 input-group ">
							<div class="controls"> 	
								<label> <input name="interim_order_issued" type="radio" class="ace" value="1"> <span class="lbl"> હા </span> </label>
								<label> <input name="interim_order_issued" type="radio" class="ace" value="0"> <span class="lbl"> ના </span> </label> 
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<!-- <label class="control-label bolder blue">Submit :</label> -->
						<br>
						<button type="submit" class="btn btn-sm btn-primary">
							<i class="ace-icon fa fa-key"></i>
							<span class="bigger-110">Submit</span>
						</button>
					</div>					
				</div>
			</form>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready( function() {   
		$("#send").click( function() {       
		$.ajax({
			type: "POST",
			url: base_url + "chat/post_action", 
			data: { textbox: $("#textbox").val() },
			dataType: "text",  
			cache:false,
			success: 
				function(data){
					alert(data);  //as a debugging message.
				}
			});		// you have missed this bracket
		return false;
		});
	});
</script>