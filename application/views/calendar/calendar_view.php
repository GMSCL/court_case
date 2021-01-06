<div class="main-content">
<link rel="stylesheet" href="<?php echo base_url('ace/assets/css/fullcalendar.css');?>" />
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>

			<li class="active">Calendar</li>
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
				<h1> સુનવણી કેલેન્ડર </h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-block alert-danger">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-close"></i>
							</button>
							<i class="ace-icon fa fa-user red"></i>
							<strong class="red">
								<?php echo $this->session->flashdata('message');?>
							</strong>
						</div>
					<?php } ?>
					<div class="col-sm-12">
						<div class="widget-box widget-color-blue ui-sortable-handle">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									સુનવણી કેલેન્ડર  												
								</h5>
							</div>
							<style type="text/css">
								.calendar : hover{
									cursor: pointer;
								}
							</style>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<div id="calendar" ></div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div><!-- /.page-content area -->
		</div><!-- /.page-content -->
	</div><!-- /.main-content -->
	


		<style type="text/css">

		  @media print
		  {
		    .no-print, .no-print *
		    {
		      display: none !important;
		    }
		  }

		</style>


			<div class="footer">
				<div class="footer-inner no-print">
					<div class="footer-content no-print">
						<span class="bigger-120">
							<!-- <a href=""><span class="blue bolder">Lalit Sharma </span> </a> &nbsp;&nbsp;
							<a href=""><span class="blue bolder">Vinod Chad </span> </a> -->
						</span>

						&nbsp; &nbsp;
						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> 

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='ace/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url('assets/js/jquery.mobile.custom.min.js');?>'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url('ace/assets/js/bootstrap.min.js')?>"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo base_url('ace/assets/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/chosen.jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/ace-elements.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/ace.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/jquery-ui.custom.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/jquery.ui.touch-punch.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/date-time/moment.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/date-time/bootstrap-datepicker.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/date-time/daterangepicker.min.js') ?>"></script>
		<!-- inline scripts related to this page -->

		<!-- page specific plugin scripts -->
		<!-- <script src="<?php echo base_url('ace/assets/js/jquery-ui.custom.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/jquery.ui.touch-punch.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/date-time/moment.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/date-time/bootstrap-datepicker.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/date-time/daterangepicker.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/bootbox.min.js') ?>"></script>
		 -->
		<!-- <script src="<?php echo base_url('ace/assets/js/chosen.jquery.min.js') ?>"></script> -->
		<!-- data table -->
		<script src="<?php echo base_url('ace/assets/js/datatable/jquery.dataTables.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/datatable/dataTables.buttons.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/datatable/jszip.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/datatable/pdfmake.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/datatable/vfs_fonts.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/datatable/buttons.html5.min.js') ?>"></script>

		<script src="<?php echo base_url('ace/assets/js/jquery-ui.custom.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/jquery.ui.touch-punch.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/markdown.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/bootstrap-markdown.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/jquery.hotkeys.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/bootstrap-wysiwyg.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/bootbox.min.js') ?>"></script>
		<script src="<?php echo base_url('ace/assets/js/fullcalendar.min.js') ?>"></script>


<script type="text/javascript">
	$(document).ready(function() {
	    $('#myTable').DataTable( {
		   "bSort": false,
		   "paging":   true,
		   "sScrollX": "100%",
           "bScrollCollapse": true

		} );
	} );

</script>
<!-- inline scripts related to this page -->
		

		<!-- inline scripts related to this page -->
<script type="text/javascript">
		jQuery(function($) {

/* initialize the external events
-----------------------------------------------------------------*/

$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/
	var events = <?php echo json_encode($data) ?>;

	
	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		//firstDay: 1,// >> change first day of week 
		
		buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},

		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},

		events: events,

		eventClick: function(calEvent) {

			var link = "<?php echo site_url('court_case/court_case_detail/')?>" + "/" +calEvent.id;

            window.location.href = link;

		}

		
	});


})
</script>
</body>
</html>
