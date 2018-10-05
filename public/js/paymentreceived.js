var gross_amount = 0.00;
$( document ).ready(function() {
    companytype('#company_type');
    isgst('#is_gst');
    // dynamicallygrossamountchange('#order_details_table');    
});

$('#company_type').change(function(){ 
    companytype(this);
});

$('#is_gst').change(function(){ 
    isgst(this);
});

$('#gst_type').change(function(){ 
    gsttyperesult(this);
});

$('#m_company_id').change(function(){ 
    orderdetails(this, 'mother');
});

$('#s_company_id').change(function(){ 
    orderdetails(this, 'sub');
});

$( '#tax_percentage' ).change(function() {
    tax_percent_change_calculation(this);
});

function isgst(obj)
{
    var value = $(obj).val();
    switch(value)
    {
        case "0":
            $('#gst_type').parents('.form-group').hide();
            $("#gst_type").find( 'option[value=""]' ).prop( "selected", true );
            gsttyperesult('#gst_type');
        break;
        case "1":
            $('#gst_type').parents('.form-group').show();
            $("#gst_type").find( 'option[value="state"]' ).prop( "selected", true );
            gsttyperesult('#gst_type');
        break;
        default:
            $('#gst_type').parents('.form-group').show();
            $("#gst_type").find( 'option[value="state"]' ).prop( "selected", true );
            gsttyperesult('#gst_type');
    }
}

function gsttyperesult(obj)
{
    var value = $(obj).val();
    var tax_percentage_in_str = $('#tax_percentage').val();
    var gross_amount = $('#gross_amount').html();

    var tax_percentage = 0;
    if(tax_percentage_in_str.trim() == "")
    {
        tax_percentage = 0;
    }
    else
    {
        tax_percentage = parseFloat(tax_percentage_in_str);
    }
    console.log(tax_percentage);
    console.log(gross_amount);

    switch(value)
    {
        case "state":
            $("#gst_type_result").html("CGST<br>SGST");

            var divided_tax_amount = (gross_amount * (tax_percentage/200)).toFixed(2);
            var tax_amount = parseFloat(divided_tax_amount) + parseFloat(divided_tax_amount);
            document.getElementById('tax_amount').value = tax_amount.toFixed(2);

            $("#gst_type_result_amount").html("<div id = 'cgst_amount'>" + divided_tax_amount + "</div><div id = 'sgst_amount'>" + divided_tax_amount + "</div>");
        break;
        case "interstate":
            $("#gst_type_result").html("IGST");

            var tax_amount = (gross_amount * (tax_percentage/100)).toFixed(2);
            document.getElementById('tax_amount').value = tax_amount;

            $("#gst_type_result_amount").html("<div id = 'igst_amount'>" + tax_amount + "</div>");
        break;
        case "":
            $("#gst_type_result").html("");
            $("#gst_type_result_amount").html("");
        break;
        default:
            $("#gst_type_result").html("CGST<br>SGST");
            $("#gst_type_result_amount").html("<div id = 'cgst_amount'>0.00</div><div id = 'sgst_amount'>0.00</div>");
    }
}

function orderdetails(obj, companytype)
{
    var value = $(obj).val();
    if(value == "")
    {

    }
    else
    {
        $.ajax({url: "http://localhost:8000/paymentreceive/orderdetails/" + value + "/" + companytype, success: function(result){
            // $('#amount').val(result[0].amount);
            // $("#handover_to_mother_company_id option[value='" + result[0].companyId + "']").attr("selected","selected");
            // console.log(result[0].amount + '  ' + result[0].companyId);
            // console.log(result);
            var orders = "";
            $.each(result, function(key,value) {
                orders = orders + "<tr id = 'order_details_" + value.order_id + "'>";
                orders = orders +     "<td id = 'order_check_box_" + value.order_id + "'>";
                orders = orders +         "<input id = 'order_check_" + value.order_id + "' type=\"checkbox\" onclick=\"gross_salary_calc(this.id);\" value=\"\">";
                orders = orders +     "</td>";
                orders = orders +     "<td id = 'application_no_of_order_" + value.order_id + "'>" + value.application_no + "</td>";
                orders = orders +     "<td id = 'applicient_name_of_order_" + value.order_id + "'>" + value.applicient_name + "</td>";
                orders = orders +     "<td id = 'applicient_id_of_order_" + value.order_id + "'>" + value.applicient_id + "</td>";
                orders = orders +     "<td id = 'policy_name_of_order_" + value.order_id + "'>" + value.policy_name + "</td>";
                orders = orders +     "<td id = 'amount_of_order_" + value.order_id + "'>" + value.amount + "</td>"
                orders = orders +     "<td id = 'id_of_order_" + value.order_id + "' style=\"display:none;\">" + value.order_id + "</td>"
                orders = orders +     "<td id = 'policy_id_of_order_" + value.order_id + "' style=\"display:none;\">" + value.policy_id + "</td>"
                orders = orders + "</tr>";
                // console.log("Order ID : " + value.order_id + "\n");
                // console.log("Policy ID : " + value.policy_id + "\n");
                // console.log("Amount : " + value.amount + "\n");
                // console.log("Application No : " + value.application_no + "\n");
                // console.log("Applicient Name : " + value.applicient_name + "\n");
                // console.log("Applicient Id : " + value.applicient_id + "\n");
            }); 
            $("#order_details_data").html(orders);
        }});
    }
}

// function dynamicallygrossamountchange(obj)
// {
//     var table = $(obj).DataTable();
//     $('#order_details_data tr td').on('change', '.checkbox', function () {
//         console.log(table.row(this).data());
//     });
// }

// $('#order_details_data tr td').on('change', '.checkbox', function () {
//     var table = $('#order_details_table').DataTable();
//     console.log(table.row(this).data());
// });

function tax_percent_change_calculation(obj)
{
    var tax_percentage_in_str = $(obj).val();
    var gst_type = $('#gst_type').val();
    var gross_amount = $('#gross_amount').html();

    var tax_percentage = 0;
    if(tax_percentage_in_str.trim() == "")
    {
        tax_percentage = 0;
    }
    else
    {
        tax_percentage = parseFloat(tax_percentage_in_str);
    }

    switch(gst_type)
    {
        case "state" :
            var divided_tax_amount = (gross_amount * (tax_percentage/200)).toFixed(2);
            var tax_amount = parseFloat(divided_tax_amount) + parseFloat(divided_tax_amount);
            document.getElementById('tax_amount').value = tax_amount.toFixed(2);
            document.getElementById('cgst_amount').innerHTML = divided_tax_amount;
            document.getElementById('sgst_amount').innerHTML = divided_tax_amount;
        break;
        case "interstate" :
            var tax_amount = (gross_amount * (tax_percentage/100)).toFixed(2);
            document.getElementById('tax_amount').value = tax_amount;
            document.getElementById('igst_amount').innerHTML = tax_amount;
        break;
    }
}

function gross_salary_calc(checkbox_id)
{
    var order_id = checkbox_id.substring(12);
    var current_order_amount = parseFloat(document.getElementById('amount_of_order_' + order_id).innerHTML);
    var gst_type = $('#gst_type').val();
    var tax_percentage_in_str = document.getElementById('tax_percentage').value;
    var tax_percentage = 0;
    if(tax_percentage_in_str.trim() == "")
    {
        tax_percentage = 0;
    }
    else
    {
        tax_percentage = parseFloat(tax_percentage_in_str);
    }
    
    if (document.getElementById(checkbox_id).checked) 
    {
        gross_amount = gross_amount + current_order_amount;
        document.getElementById('gross_amount').innerHTML = gross_amount.toFixed(2);
        switch(gst_type)
        {
            case "state" :
                var divided_tax_amount = (gross_amount * (tax_percentage/200)).toFixed(2);
                var tax_amount = parseFloat(divided_tax_amount) + parseFloat(divided_tax_amount);
                document.getElementById('tax_amount').value = tax_amount.toFixed(2);
                document.getElementById('cgst_amount').innerHTML = divided_tax_amount;
                document.getElementById('sgst_amount').innerHTML = divided_tax_amount;
            break;
            case "interstate" :
                var tax_amount = (gross_amount * (tax_percentage/100)).toFixed(2);
                document.getElementById('tax_amount').value = tax_amount;
                document.getElementById('igst_amount').innerHTML = tax_amount;
            break;
        }
        
    } 
    else 
    {
        gross_amount = gross_amount - current_order_amount;
        document.getElementById('gross_amount').innerHTML = gross_amount.toFixed(2);
        switch(gst_type)
        {
            case "state" :
                var divided_tax_amount = (gross_amount * (tax_percentage/200)).toFixed(2);
                var tax_amount = parseFloat(divided_tax_amount) + parseFloat(divided_tax_amount);
                document.getElementById('tax_amount').value = tax_amount.toFixed(2);
                document.getElementById('cgst_amount').innerHTML = divided_tax_amount;
                document.getElementById('sgst_amount').innerHTML = divided_tax_amount;
            break;
            case "interstate" :
                var tax_amount = (gross_amount * (tax_percentage/100)).toFixed(2);
                document.getElementById('tax_amount').value = tax_amount;
                document.getElementById('igst_amount').innerHTML = tax_amount;
            break;
        }
    }
}

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