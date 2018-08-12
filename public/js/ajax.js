$('#company_type').change(function(){ 
    var value = $(this).val();
    switch(value)
    {
        case "mother":
            $('#s_company_id').parents('.form-group').hide();
        break;
        case "sub":
            $('#s_company_id').parents('.form-group').show();
        break;
        default:
            $('#s_company_id').parents('.form-group').show();
    }
    
});