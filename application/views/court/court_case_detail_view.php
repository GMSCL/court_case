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

			<li class="active"> કોર્ટ કેસ રજીસ્ટર</li>
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
	<style type="text/css">
		.font {
			font-size: 20px !important;
		}

		.title {
			text-decoration-line: underline;
  			color:black;
		}
	</style>
	<div class="page-content">
		<div class="page-content-area">

			<div class="page-header">
				<h1 class="center green bold">
					<i class="menu-icon fa fa-star black"></i>
					કોર્ટ કેસ રજીસ્ટર
					<i class="menu-icon fa fa-star black"></i>
				</h1>

				
			</div><!-- /.page-header -->
			<!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">

					<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<td class="bolder blue font center" colspan="2"><span class ="title">કેસ ટાઇટલ</span> : <?= $data[0]['case_title']?> </td>
							</tr>
							<tr>
								<td class="bolder blue font"><span class ="title">શાખાનું નામ</span> : <?= $data[0]['department_name']?> </td>
								<td class="bolder blue font">કેસ નંબર : <?= $data[0]['case_no']?> </td>
							</tr>
							<tr>
								<td class="bolder blue font" ><span class ="title">અરજદારનું નામ</span> : <?= $data[0]['applicant_id']?> </td>
								<td class="bolder blue font" ><span class ="title">કેસનો પ્રકાર</span> : <?= $data[0]['case_type']?> </td>
							</tr>
							<tr>
								<td class="bolder blue font " ><span class ="title">કઈ કોર્ટમાં કેસ ચાલે છે</span> :<?= $data[0]['court_name']?> </td>
								<td class="bolder blue font " colspan="2"><span class ="title">એડવોકેટનું નામ</span> : <?= $data[0]['advocate_name']?> </td>
							</tr> 
							
							<tr>
								<td class="bolder blue font " ><span class ="title">સુનવણીની તારીખ</span> : <?php if($data[0]['appeal_date'] != '30-11--0001') { echo $this->my_model->date_format_2($data[0]['appeal_date']); } else { echo '';}?> </td>
								<td class="bolder blue font " ><span class ="title"> કેસ સ્ટેટસ</span> : <?php  if($data[0]['case_status'] == 0) { echo 'ચાલુ';}else{ echo 'પૂર્ણ';}?> </td>
							</tr>
							<tr>
								<td class="bolder blue font " ><span class ="title">વચગાળાનો હુકમ જારી થયેલ છે?</span> : <?php if($data[0]['interim_order_issued'] == 1) { echo 'હા';}else{ echo 'ના';}?> </td>
								<td class="bolder blue font " ><span class ="title"> વચગાળાનો હુકમ જારી થયા તારીખ</span> : <?php  if($data[0]['interim_order_issued_on'] != '30-11--0001') { echo $this->my_model->date_format_2($data[0]['interim_order_issued_on']); } else { echo '';}?> </td>
							</tr>
							<tr>
								<td class="bolder blue font " ><span class ="title"> વચગાળાનો હુકમ</span> : <?php  $data[0]['interim_order'] ?> </td>
								<td class="bolder blue font " colspan="2"><span class ="title">સદર કોર્ટ માં એફિડેવિટ કરવામાં આવેલ હોય તો તે તારીખ</span> : <?php if($data[0]['affidavit_date'] != '0000-00-00') { echo $this->my_model->date_format_2($data[0]['affidavit_date']); } else { echo '';}?> </td>
							</tr>
							<!-- <tr>
								<td class="bolder blue font " colspan="2"><span class ="title">વિપરીત ચુકાદાના અંજામ બાદ પડતો નાણાકીય ખર્ચ </span>: <?php echo $data[0]['expense'];?> </td>
							</tr> -->
							<tr>
								<td class="bolder blue font " colspan="2"><span class ="title">કોર્ટ કેસ ની ટૂંકી વિગત</span> : <?php echo $data[0]['short_note_of_case'];?> </td>
							</tr>
							<tr>
								<td class="bolder blue font " colspan="2"><span class ="title">ચુકાદો</span> : <?php  if($data[0]['court_judgement'] == 0) { echo 'વિપરીત';}else{ echo 'તરફેંણમાં';}?> </td>								
							</tr>
							<tr>
								<td class="bolder blue font " colspan="2"><span class ="title">અપીલ કરવાની છેલ્લી તારીખ</span> : <?php if($data[0]['last_date_to_appeal'] != '0000-00-00') { echo $this->my_model->date_format_2($data[0]['last_date_to_appeal']); } else { echo '';}?> </td>
							</tr>
							<tr>
								<td class="bolder blue font " colspan="2"><span class ="title">કોર્ટ નો હુકમ</span> : <?php echo $data[0]['court_order'];?> </td>								
							</tr>
							<tr>
								<td class="bolder blue font " colspan="2"><span class ="title">હુકમ ના અમલિકરણની છેલ્લી તારીખ</span> : <?php if($data[0]['order_compliance_date'] != '0000-00-00') { echo $this->my_model->date_format_2($data[0]['order_compliance_date']); } else { echo '';}?> </td>
							</tr>
						</tbody>
					</table>

					<h3 class="center green bold">
						<i class="menu-icon fa fa-star black"></i>
							સુનવણીની વિગત
						<i class="menu-icon fa fa-star black"></i>
					</h3>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>ક્રમ</td>
								<td>છેલ્લી સુનાવણીની તારીખ</td>
								<td>ટૂંકી નોધ :</td>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($case_hearing as $key => $value) { ?>
							<tr>
								<td class="center"><?php echo $i;?></td>
								<td><?php echo $this->my_model->date_format_2($case_hearing[$key]['case_hearing_date']);?></td>
								<td><?php echo $case_hearing[$key]['last_date_short_note'];?></td>
							</tr>
						<?php $i++; } ?>
						</tbody>
					</table>
					
			</div>
		</div>
	</div><!-- /.page-content area -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->

