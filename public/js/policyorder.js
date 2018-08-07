$( document ).ready(function() {
    $('#d_case_taker_id').parents('.form-group').hide();
    $('#i_case_taker_id').parents('.form-group').hide();

    $('#handover_to_mother_company_id').parents('.form-group').hide();
    $('#handover_to_sub_company_id').parents('.form-group').hide();
});

$('#case_taker_type').change(function(){ 
    var value = $(this).val();
    switch(value)
    {
        case "direct":
            $('#d_case_taker_id').parents('.form-group').show();
            $('#i_case_taker_id').parents('.form-group').hide();
        break;
        case "indirect":
            $('#d_case_taker_id').parents('.form-group').hide();
            $('#i_case_taker_id').parents('.form-group').show();
        break;
        default:
            $('#d_case_taker_id').parents('.form-group').hide();
            $('#i_case_taker_id').parents('.form-group').hide();
    }
    
});

$('#handover_to_company_type').change(function(){ 
    var value = $(this).val();
    switch(value)
    {
        case "mother":
            $('#handover_to_mother_company_id').parents('.form-group').show();
            $('#handover_to_sub_company_id').parents('.form-group').hide();
        break;
        case "sub":
            $('#handover_to_mother_company_id').parents('.form-group').hide();
            $('#handover_to_sub_company_id').parents('.form-group').show();
        break;
        default:
            $('#handover_to_mother_company_id').parents('.form-group').hide();
            $('#handover_to_sub_company_id').parents('.form-group').hide();
    }
    
});