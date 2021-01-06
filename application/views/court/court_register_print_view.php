<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb no-print">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
				<li class="active">Print Cases</li>
			</li>

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
			<!-- <h3 class="center"></h3> -->
			<h1 class="center">કોર્ટ કેસ રજીસ્ટર  પત્રક</h1>
			<br>
			<div class="row">
				<div onclick="printDiv('printableArea')" value="Print Report"><i class="fa fa-print" aria-hidden="true"></i> Print</div>
				<div id="printableArea">
					<table style="table-layout:fixed" class="table table-striped table-bordered">
						<thead>
							<tr>
								<td class="center" width="5%">
									<i class="ace-icon fa fa-user"></i>
									ક્રમ  
								</td>
								<td>શાખા</td>
								<td>કેસ નંબર</td>
								<td>કેસ ટાઇટલ</td>
								<td>કઈ કોર્ટમાં કેસ ચાલે છે</td>
								<td>પ્રતિવાદીનું નામ</td>
								<td>એડવોકેટનું નામ</td>
								<td>આવતી સુનવણીની તારીખ</td>
								<!-- <td>નાણાકીય ખર્ચ</td> hid this as not required for now -->
								<!-- <td>એન્ટ્રી ટાઈમ</td> --> <!-- this is not required-->
								<td>કેસની ટૂંકી વિગત</td>
								<td>વચગાળાનો હુકમ જારી થયેલ છે ?</td>
								<td>વચગાળાનો હુકમ</td>
							</tr>
						</thead>
						
						<tbody>
							<?php $i=1; foreach ($data as $key => $value) { ?>
								<tr>
									<td class="center"><?php echo $i;?></td>
									<td><?php echo $data[$key]['department_name'];?></td>
									<td><?php echo $data[$key]['case_no'];?></td>
									<td><?php echo $data[$key]['case_title'];?></td>
									<td><?php echo $data[$key]['court_name'];?></td>
									<td><?php echo $data[$key]['applicant_id'];?></td>
									<td><?php echo $data[$key]['advocate_name'];?></td>
									<td><?php if($data[$key]['appeal_date'] == '0000-00-00') { echo "";} else { echo $this->my_model->date_format_2($data[$key]['appeal_date']) ;} ?></td>
									<!-- <td><?php echo $data[$key]['expense'];?></td> -->
									<!-- <td><?php echo $data[$key]['created_at'];?></td> -->
									<td><?php echo $data[$key]['short_note_of_case'];?></td>
									<td><?php if ($data[$key]['interim_order_issued'] == 1) { echo "હા"; } else { echo "ના"; };?></td>
									<td><?php echo $data[$key]['interim_order'];?></td>
								</tr>
								<?php $i++;} ?>
							</tbody>
					</table>

					<br>

					<div class="col-sm-6">
						આ સાથે ઉપરોક્ત તમામ માહિતી સાચી છે. જેની અમે ખાતરી કરેલ છે.
					</div>

					<br />
					<br />
					<br />
					<br />

					<div class="col-sm-8">
					</div>

					<div class="col-sm-4">
						શાખા અધ્યક્ષશ્રી ની સહી અને સિક્કો
					</div>
				</div>
			</div>
		</div><!-- /.page-content area -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->

<script type="text/javascript">
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>