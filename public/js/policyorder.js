$( document ).ready(function() {
    paymentmode('#payment_mode')
    casetakertype('#case_taker_type');
    handovertocompanytype('#handover_to_company_type');
});

$('#case_taker_type').change(function(){ 
    casetakertype(this);
});

function casetakertype(obj)
{
    var value = $(obj).val();
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
}

$('#handover_to_company_type').change(function(){ 
    handovertocompanytype(this);
});

function handovertocompanytype(obj)
{
    var value = $(obj).val();
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
}

$('#payment_mode').change(function(){ 
    paymentmode(this);
});

function paymentmode(obj)
{
    var value = $(obj).val();
    switch(value)
    {
        case "cheque":
            $('#instrument_no').parents('.form-group').show();
        break;
        case "dd":
            $('#instrument_no').parents('.form-group').show();
        break;
        case "cash":
            $('#instrument_no').parents('.form-group').hide();
        break;
        default:
            $('#instrument_no').parents('.form-group').hide();
    }
}

$('#policy_id').change(function(){ 
    var policyId = $(this).val();
    if(policyId == "")
    {

    }
    else
    {
        // $.post({url: "http://localhost:8000/policyorder/policydetails/" + policyId, success: function(result){
        //     console.log(result);
        // }});
        $.post("http://localhost:8000/policyorder/policydetails",
        {
            PolicyID: policyId
        },
        function(data, status){
            console.log(data);
        });
    }
});