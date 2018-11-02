var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}

function pendingResultSearch() {
    var input, filter, table, tr, td, i, j, data, dataFound;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("pendingPayment");
    tr = table.getElementsByTagName("tr");
    console.log(tr);
    for (i = 1; i < tr.length; i++) {
        dataFound = false;
        td = tr[i].getElementsByTagName("td");
        console.log(td);
        for(j = 0; j < td.length; j++)
        {
            data = td[j];
            console.log(data);
            if (data!="") {
                if (data.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    dataFound = true;
                    break;
                }
            } 
        }
        if(dataFound)
        {
            tr[i].style.display = "";
        }
        else
        {
            tr[i].style.display = "none";
        }    
    }
}