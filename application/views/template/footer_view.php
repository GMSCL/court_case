


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
							<a href=""><span class="blue bolder">Vinod Ahir : - Help Line No. 9638957848 </span> </a> -->
						</span>

						&nbsp; &nbsp;
						<!-- <span class="action-buttons no-print">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span> -->
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
		

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo base_url('ace/assets/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/bootstrap.min.js')?>"></script>

		<script src="<?php echo base_url('ace/assets/js/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('ace/assets/js/validation.js')?>"></script>

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
		<script src="<?php echo base_url('ace/assets/js/jquery.easypiechart.min.js') ?>"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	
	
<!-- inline scripts related to this page -->
	jQuery(function($) {

		$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})

		//datepicker plugin
		//link
		$('.dt-picker').datepicker({
			autoclose: true,
			todayHighlight: true
		})

		
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		//or change it into a date range picker
		$('.input-daterange').datepicker({autoclose:true});

		// chosen class
		if(!ace.vars['touch']) {
			$('.chosen-select').chosen({allow_single_deselect:true}); 
			//resize the chosen on window resize
	
			$(window)
			.off('resize.chosen')
			.on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			}).trigger('resize.chosen');
			//resize chosen on sidebar collapse/expand
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			});
	
			$('#chosen-multiple-style .btn').on('click', function(e){
				var target = $(this).find('input[type=radio]');
				var which = parseInt(target.val());
				if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
				 else $('#form-field-select-4').removeClass('tag-input-style');
			});
		}


			
	});


</script>
<script type="text/javascript">
	// $(document).ready(function() {
	//     $('#example').DataTable( {
	        
	//     } );
	// } );
	$(document).ready(function() {
	    $('#myTable').DataTable( {
		   "bSort": true,
		   "paging":   true,
		   "sScrollX": "100%",
           "bScrollCollapse": true

		} );
	} );

</script>
<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($){
	
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			//console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}

	//$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

	//but we want to change a few buttons colors for the third style
	$('#editor1').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');

	
	/**
	//make the editor have all the available height
	$(window).on('resize.editor', function() {
		var offset = $('#editor1').parent().offset();
		var winHeight =  $(this).height();
		
		$('#editor1').css({'height':winHeight - offset.top - 10, 'max-height': 'none'});
	}).triggerHandler('resize.editor');
	*/
	

	$('#editor2').css({'height':'200px'}).ace_wysiwyg({
		toolbar_place: function(toolbar) {
			return $(this).closest('.widget-box')
			       .find('.widget-header').prepend(toolbar)
				   .find('.wysiwyg-toolbar').addClass('inline');
		},
		toolbar:
		[
			'bold',
			{name:'italic' , title:'Change Title!', icon: 'ace-icon fa fa-leaf'},
			'strikethrough',
			null,
			'insertunorderedlist',
			'insertorderedlist',
			null,
			'justifyleft',
			'justifycenter',
			'justifyright'
		],
		speech_button: false
	});
	
	


	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#editor1').prev().get(0);
		if(which >= 1 && which <= 4) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
			if(which == 4) {
				$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
			} else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
		}
	});


	

	//RESIZE IMAGE
	
	//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {
							//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }

		enableImageResize();

		/**
		//or we can load the jQuery UI dynamically only if needed
		if (typeof jQuery.ui !== 'undefined') enableImageResize();
		else {//load jQuery UI if not loaded
			//in Ace demo dist will be replaced by correct assets path
			$.getScript("assets/js/jquery-ui.custom.min.js", function(data, textStatus, jqxhr) {
				enableImageResize()
			});
		}
		*/
	}


});
		</script>

		
</body>
</html>
