var approvedUsers = [];
function addApprovedUser(id,userId,userState) {
            if ( userState == 'pending' && !approvedUsers.includes(userId)) {
                id.innerHTML = "Approved";
                approvedUsers.push(userId);
            }
        }
//select products add them to this array below 
var selectedProducts = [];
function selected(element) {
            if ( element.checked  && !selectedProducts.includes(element.value)) {
                selectedProducts.push(element.value);
            } else if (selectedProducts.includes(element.value)){
                var index = selectedProducts.indexOf(element.value);
                if (index > -1) {
                    selectedProducts.splice(index, 1);
                    }
            }
        }
// takes to edit page 
function edit(element){
        window.location.href= "products/"+element.value+"/edit";
}
function goadd(){
        window.location.href= "products/add";
}
// delete one product
function deleteOneProduct(element){
        
        selectedProducts.push(element.value);
        var data = new FormData();
        data.append("ids",selectedProducts);
        $.ajax({
            type : "POST",
            url : "/admin/products",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                for (var i = selectedProducts.length - 1; i >= 0; i--) {
                    var productRow = document.getElementById(selectedProducts[i]);
                    productRow.remove();
                }
                console.log(data); }});
}
function resendcode(element){
     window.location.href= "/confirmation";
}
$(document).ready(function (){
    var table = $("#DataTable").DataTable();
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//useless one 
    // this approve the users 
    $('#sub').click(function(){
        var dataString = "ids="+approvedUsers;
        $.ajax({
            type : "POST",
            url : "/admin/users",
            data : dataString,
            success : function(data){
                console.log(data); }
        });
    });

    // this about products its execute a command in the lits like delete so its delete the selected items
    $("#execute").click( function(){
            var data = new FormData();
            data.append("ids",selectedProducts);
            var list = document.getElementById("selectList");
            if (list.options[list.selectedIndex].text=="delete") {
                 $.ajax({
                    type : "POST",
                    url : "/admin/products",
                    data : data,
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    contentType: false,
                    success : function(data){
                        document.getElementsByClassName("custom-checkbox").checked = false;
                        for (var i = selectedProducts.length - 1; i >= 0; i--) {
                            var productRow = document.getElementById(selectedProducts[i]);
                            productRow.remove();
                        }
                        document.getElementById("checkboxAll").checked = false;
                        window.location.href= "products/";
                        console.log(data);

                        }});
            }            
    });
    $("#checkboxAll").click(function(){
        
           var page = table.page();
           var lenpage = table.page.len();
           var tabledata = table.data();
           var info = table.page.info();
           var index = ((info['page']+1)*info["length"])-info["length"];
           var data = new FormData();
           for (var i = index; i < index+info["length"]; i++) {
                var id = tabledata[i]['DT_RowId'];
                if (this.checked==true) {
                selectedProducts.push(id);
                document.getElementById(id).childNodes[1].childNodes[1].checked = true;
                }else{
                selectedProducts.splice(index,1);
                document.getElementById(id).childNodes[1].childNodes[1].checked = false;
                } 
            }        
    });
    $("#confirm").click(function(){
        code = document.getElementById("code").value;
        data = new FormData();
        data.append('code',code);
        console.log(data,code);
        $.ajax({
                    type : "POST",
                    url : "/confirmation",
                    data : data,
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    contentType: false,
                    success : function(data){
                        if (data=="confirmed") {
                            console.log("fuck")
                            modal = document.getElementById('cmodale');
                            modal.style.display = 'block' ;
                            document.body.style.backgroundColor = "#666";
                            setTimeout(function(){ window.location.href= "/home"; }, 3000);
                            
                        } else if (data=="notconfirmed") {
                            document.getElementById("wrongcode").hidden = false;
                        }
                }});
    });
});