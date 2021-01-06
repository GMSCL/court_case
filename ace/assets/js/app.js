(function($){
  $(document).ready(function() {
   $(document).on('click', 'th input:checkbox' , function(){
     var that = this;
     $(this).closest('table').find('tr > td:first-child input:checkbox')
     .each(function(){
      this.checked = that.checked;
      $(this).closest('tr').toggleClass('selected');
    });
   });

   $.mask.definitions['~']='[+-]';
   $('.input-mask-date').mask('99-99-9999');
 });

  $('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
  })
  //show datepicker when clicking on the icon
  .next().on(ace.click_event, function(){
    $(this).prev().focus();
  });

  var del_button = '<button type="button" class="btn btn-warning btn-sm DelButton"><i class="fa fa-minus"></i></button>';

  function cloneRow(template_row) {
    $new_row = $(template_row).clone();
    $new_row.children('td:last').html(del_button);
    $new_row.removeClass('TemplateRow');
    $new_row.insertBefore($(template_row));
    $(template_row).find('textarea').each(function(index, el) {
      $new_row.find('textarea').eq(index).val($(this).val());
    });
    $(template_row).find('select').each(function(index, el) {
      $new_row.find('select').eq(index).val($(this).val());
    });
    $(template_row).find(':input').not('.Unchanged').each(function() {
      $(this).val('');
    });
    $(template_row).find('input[type="checkbox"]').not('.Unchanged').prop('checked', '');
    $(template_row).find('td.ClearText').each(function() {
      $(this).text('');
    });
    $(template_row).find('.Increment').each(function() {
      $(this).val(parseInt($(this).val(), 10)+1);
    });
    $(template_row).find(':input.Focus').focus();
  }

  $('table.DataEntry').on('click', 'button.AddButton', function(e) {
    var submit_row = $(this).hasClass('RowSubmit');
    var clone_row  = true;
    $template_row  = $(this).parents('tr.TemplateRow');
    $template_row.find('.Validate').each(function(index, el) {
      if ($(this).val() === '') {
        clone_row = false;
        $(this).addClass('has-error');
      }
      else {
        $(this).removeClass('has-error');
      }
    });
    if (clone_row) {
      cloneRow($template_row);
      if (submit_row === false) {
        e.preventDefault();
      }
    }
    else {
      e.preventDefault();
    }
  });

  $('table.DataEntry').on('click', 'button.DelButton', function() {
    $(this).parents('tr').remove();
  });

  if (jQuery.isFunction(jQuery.fn.sortable)) {
    $('.DataEntry.Sortable tbody').sortable({
      cursor: 'move',
      handle: '.SortHandle',
      cancel: '.ui-state-disabled',
      axis: 'y',
      helper: function(e, tr) {
        var $original = tr.children();
        var $helper   = tr.clone();
        $helper.children().each(function(index) {
          $(this).width($original.eq(index).width());
        });
        return $helper;
      },
      stop: function(e, ui) {
        $('td.SortHandle', ui.item.parent()).each(function(i) {
          $(this).parent('tr').find('input:eq(0)').val(i + 1);
        });
      }
    });
  }
  
  $('.DataEntry.Sortable').on('click.sortable mousedown.sortable', 'input', function(ev) {
    ev.target.focus();
  });
})(jQuery);