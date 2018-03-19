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
                console.log(selectedProducts);
            } else if (selectedProducts.includes(element.value)){
                var index = selectedProducts.indexOf(element.value);
                if (index > -1) {
                    selectedProducts.splice(index, 1);
                    }
            }
        }
// takes to edit page 
function edit(element){
        $.ajax({
            type : "GET",
            url : "products/"+element.value+"/edit",
            success : function(data){
                console.log("data : "+data);
            }
        });
}
// delete one product
function deleteOneProduct(element){
        selectedProducts.push(element.value);
        var dataString = "ids="+selectedProducts;
        $.ajax({
            type : "POST",
            url : "/admin/products",
            data : dataString,
            success : function(data){
                for (var i = selectedProducts.length - 1; i >= 0; i--) {
                    var productRow = document.getElementById(selectedProducts[i]);
                    productRow.remove();
                }
                console.log(data); }});
}
$(document).ready(function (){
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//useless one 
$('#get').click(function(){
    $.ajax({
        type : "GET",
        url : "get",
        success : function(data){
            console.log("data : "+data);
            $("#req").append(data);
        }
    });
});
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
    var dataString = "ids="+selectedProducts;
        console.log(dataString);
        if ($("#selectList").value=="delete") {
             $.ajax({
                type : "POST",
                url : "/admin/products",
                data : dataString,
                success : function(data){
                    document.getElementsByClassName("custom-checkbox").checked = false;
                    for (var i = selectedProducts.length - 1; i >= 0; i--) {
                        var productRow = document.getElementById(selectedProducts[i]);
                        productRow.remove();
                    }
                    console.log(data); }});
        }            
});
});