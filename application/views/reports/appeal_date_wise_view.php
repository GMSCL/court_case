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

			<li class="active">Reports</li>
			<li class="active">Hearing Date Wise</li>
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
				<h1> Hearing Date Wise Cases </h1>
			</div><!-- /.page-header -->
			<?= form_open('reports/view?name=hearing_date_wise');?>
			<div class="row">
				<div class="col-md-4">
					<label class="control-label bolder blue">તારીખ :</label>
					<br>
					<div class="input-daterange input-group">
						<input type="text" class="input-sm form-control" name="start">
						<span class="input-group-addon">
							<i class="fa fa-exchange"></i>
						</span>

						<input type="text" class="input-sm form-control" name="end">
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
