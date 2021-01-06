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

			<li class="active">View Detail</li>
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
					Case Register
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						View your case register  detail by appeal date wise...
					</small>
				</h1>
			</div><!-- /.page-header -->
			<?= form_open('reports/financial_expense_wise_detail');?>
			<div class="row">
				<div class="col-md-2">
					<label class="control-label bolder blue"> નાણાકીય ખર્ચ  :</label>
					<br>
					<div class="input-daterange input-group">
						<select class="form-control" name="financial_expense" id="financial_expense" required>
							<option value="">  નાણાકીય ખર્ચ </option>
							<?php foreach ($financial_expense as $key => $value) { ?>
								<option value="<?= $financial_expense[$key]['id']?>"><?= $financial_expense[$key]['from_rupees']. " - ".$financial_expense[$key]['to_rupees']; ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="col-md-2">
					<label class="control-label bolder blue">Submit :</label>
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
