$(document).ready(function () {
    /*$(".tell_index").click(function(){
        var order_id = $(this).attr("data-orderid");
        var data_empid = $(this).find(".td_emp_id").attr("data-empid");
        console.log(order_id);
        console.log(data_empid);

        var url = "http://localhost:8000/orderstatement/hierarchy/"+order_id+"/"+data_empid;
        console.log(url);
        
        $.ajax({url: url, success: function(result){
            console.log(result);
        }});
    });*/
	
	$(".tell_index").click(function(){
		var order_id = $(this).attr("data-orderid");
        console.log(order_id);
        var myUrl = "http://localhost:8000/orderstatement/hierarchy/"+order_id;
        console.log(myUrl);

        $.ajax({url: myUrl, success: function(result){
			var dataArray = result;
			
			console.log(result);

            var myHtml = "";

            dataArray.forEach(function (data) {
                var isActiveClass = data.isCurrent == 1 ? "class=\"active\"" : "class=\"\"" ;
                inH1 = "<li " + isActiveClass + "><a href='#' class='btn1'><i class=\"fa fa-user-circle-o\"></i>" + data.empname + "</a></li>";
                myHtml = myHtml + inH1;
            });
            $(".showRelationship").find(".eh_breadcrumbs").html(myHtml);
            $(".showRelationship").fadeIn();
            // console.log(myHtml);

            $(document).on('keyup',function(evt) {
                if (evt.keyCode == 27) {
                    $(".showRelationship").fadeOut();
                }
            });
        }});
    });
    $(".showRelationship").click(function(){
        $(".showRelationship").fadeOut();
    });
});