$( document ).ready(function() {
    companytype('#company_type');
});

$('#company_type').change(function(){ 
    companytype(this);
});

function companytype(obj)
{
    var value = $(obj).val();
    switch(value)
    {
        case "mother":
            $('#m_company_id').parents('.form-group').show();
            $('#s_company_id').parents('.form-group').hide();
            $("#s_company_id").find( 'option[value=""]' ).prop( "selected", true );
        break;
        case "sub":
            $('#s_company_id').parents('.form-group').show();
            $('#m_company_id').parents('.form-group').hide(); 
            $("#m_company_id").find( 'option[value=""]' ).prop( "selected", true );
        break;
        default:
            $('#s_company_id').parents('.form-group').hide();
            $("#s_company_id").find( 'option[value=""]' ).prop( "selected", true );
    }
}