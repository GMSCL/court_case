$(function() {

    if (window.addEventListener) {
        document.addEventListener('click', function (e) {
            if (e.target.id === 'previewanchor' && $("#case_registration").valid()) {
                $('#insert').modal('show');
            }
        });
    }

    $('input[name="affidavit"]').on('click', function() {
        if ($(this).val() == '1') {
            $('#show_div').show();
        }
        else {
            $('#show_div').hide();
        }
    });

    // toggle fields based on interim_order_issued yes/no 
    $('input[name="interim_order_issued"]').on('click', function() {
        if ($(this).val() == '0') {
            $('#interim_order_issue_date').val('');
            $('#interim_order').empty();
            $('#interim_order_issue_date').parent().parent().addClass("hidden");
            $('#interim_order').parent().parent().addClass("hidden");
        }
        else {
            $('#interim_order_issue_date').parent().parent().removeClass("hidden");
            $('#interim_order').parent().parent().removeClass("hidden");
        }
    });
    if ($('input[name="interim_order_issued"]:checked').val() == '0') {
        $('#interim_order_issue_date').parent().parent().addClass("hidden");
        $('#interim_order').parent().parent().addClass("hidden");
    } else {
        $('#interim_order_issue_date').parent().parent().removeClass("hidden");
        $('#interim_order').parent().parent().removeClass("hidden");
    }

    // validate hearing date to be a future date.
    $('input[name="appeal_date"]').on('change', function(){
        appealDateStr = $(this).val();			
        var dateParts = appealDateStr.split("-");
        var appealDate = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
        let currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0); //  to ignore time part while comparing date.
        if (appealDate < currentDate) {
            // Please select a future date for case hearing.
            alert('સુનવણી માટે કૃપા કરીને ભાવિ તારીખ પસંદ કરો !');
            $('#appeal_date').val('');
            $('#appeal_date').focus();
        }
    });
});

function get_preview() {

    var court = document.getElementsByName('court_id')[0];
    court_id_pp.value = court.options[court.selectedIndex].text;

    var c = document.getElementsByName('case_type_id')[0];
    case_type_id_pp.value = c.options[c.selectedIndex].text;

    case_title_pp.value = document.getElementById("case_title").value;

    case_no_pp.value = document.getElementById("case_no").value;

    applicant_pp.value = document.getElementById("applicant_id").value;

    var ad = document.getElementsByName('advocate_id')[0];
    advocate_pp.value = ad.options[ad.selectedIndex].text;

    case_register_date_pp.value = document.getElementById("register_date").value;

    affidavit_date_pp.value = document.getElementById("affidavit_date").value;

    appeal_date_pp.value = document.getElementById("appeal_date").value;

    expense_pp.value = document.getElementById("expense").value;

    short_note_of_case_pp.value = document.getElementById("short_note_of_case").value;

    interim_order_pp.value = document.getElementById("interim_order").value;
    interim_order_issue_date_pp.value = document.getElementById("interim_order_issue_date").value;

}

$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration" form[name='case_registration']
    $("#case_registration").validate({
      // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            case_no: "required",
            case_title: "required",
            court_id: "required",
            case_type_id: "required",
            applicant_id: "required",
            advocate_id: "required",
            affidavit_date: {
                required: {
                    depends: function(element){
                        return $('input[name=affidavit]:checked').val() == '1';
                    }
                }
            },
            interim_order_issue_date: {
                required: {
                    depends: function(){
                        return $('input[name="interim_order_issued"]:checked').val() == '1';
                    }
                }
            },
            interim_order: {
                required: {
                    depends: function(){
                        return $('input[name="interim_order_issued"]:checked').val() == '1';
                    }
                }
            }
        },
        // Specify validation error messages
        messages: {
            case_no: "કૃપા કરીને કેસ નંબર દાખલ કરો.", // Please enter Case Number.
            case_title: "કૃપા કરીને કેસ ટાઇટલ દાખલ કરો.", // Please enter Case Title.
            court_id: "કૃપા કરીને કોર્ટ પસંદ કરો.", // Please select Court.
            case_type_id: "કૃપા કરીને કેસ પ્રકાર પસંદ કરો.", // Please select Case Type.
            applicant_id: "કૃપા કરીને અરજદારનું નામ દાખલ કરો.", // Please enter Applicant Name.
            advocate_id: "કૃપા કરીને એડવોકેટ પસંદ કરો.", // Please select Advocate.
            affidavit_date: "કૃપા કરીને એફિડેવિટ તારીખ પસંદ કરો.",
            interim_order_issue_date: "કૃપા કરીને વચગાળાનો હુકમ જારી થયાની તારીખ પસંદ કરો.",
            interim_order: "કૃપા કરીને વચગાળાના હુકમની વિગત દાખલ કરો."
        },      

        highlight : function(element) {
            $(element).closest('.form-group, .has-feedback').removeClass('has-success').addClass('has-error');
        },
        unhighlight : function(element) {
            $(element).closest('.form-group, .has-feedback').removeClass('has-error').addClass('has-success');
        },
        errorPlacement: function(error, element) {
            var errDiv = '#' +element.attr("name") + "_error";
            error.appendTo(errDiv);
        }
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        //   submitHandler: function(form) {
        //     form.submit();
        //   }
    });

    $("#case_updation").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            case_no: "required",
            case_title: "required",
            court_id: "required",
            case_type_id: "required",
            applicant_id: "required",
            advocate_id: "required",
            court_judgement: {
                required: {
                    depends: function(element){
                        return $('input[name="case_status"]:checked').val() == '1';
                    }
                }
            },
            implementation_status: {
                required: {
                    depends: function(){
                        return $('input[name="court_judgement"]:checked').val() == '0';
                    }
                }
            },
            order_implementation_date: {
                required: {
                    depends: function(){
                        return $('input[name="implementation_status"]:checked').val() == '1';
                    }
                }
            },
            last_date_to_appeal: {
                required: {
                    depends: function(){
                        return $('input[name="appealed"]:checked').val() == '1';
                    }
                }
            },
            interim_order_issue_date: {
                required: {
                    depends: function(){
                        return $('input[name="interim_order_issued"]:checked').val() == '1';
                    }
                }
            },
            interim_order: {
                required: {
                    depends: function(){
                        return $('input[name="interim_order_issued"]:checked').val() == '1';
                    }
                }
            }

        },
        // Specify validation error messages
        messages: {
            case_no: "કૃપા કરીને કેસ નંબર દાખલ કરો.", // Please enter Case Number.
            case_title: "કૃપા કરીને કેસ ટાઇટલ દાખલ કરો.", // Please enter Case Title.
            court_id: "કૃપા કરીને કોર્ટ પસંદ કરો.", // Please select Court.
            case_type_id: "કૃપા કરીને કેસ પ્રકાર પસંદ કરો.", // Please select Case Type.
            applicant_id: "કૃપા કરીને અરજદારનું નામ દાખલ કરો.", // Please enter Applicant Name.
            advocate_id: "કૃપા કરીને એડવોકેટ પસંદ કરો.", // Please select Advocate.
            court_judgement:"કૃપા કરીને કોર્ટનો ચુકાદો પસંદ કરો.", // Please choose court Decision.
            implementation_status: "કૃપા કરીને વિગત પસંદ કરો.",
            order_implementation_date: "કૃપા કરીને અમલવારી કર્યા તારીખ પસંદ કરો.",
            last_date_to_appeal: "કૃપા કરીને અપીલ કરવાની છેલ્લી તારીખ પસંદ કરો.",
            interim_order_issue_date: "કૃપા કરીને વચગાળાનો હુકમ જારી થયાની તારીખ પસંદ કરો.",
            interim_order: "કૃપા કરીને વચગાળાના હુકમની વિગત દાખલ કરો."
        },      

        highlight : function(element) {
            $(element).closest('.form-group, .has-feedback').removeClass('has-success').addClass('has-error');
        },
        unhighlight : function(element) {
            $(element).closest('.form-group, .has-feedback').removeClass('has-error').addClass('has-success');
        },
        errorPlacement: function(error, element) {
            var errDiv = '#' +element.attr("name") + "_error";
            error.appendTo(errDiv);
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});