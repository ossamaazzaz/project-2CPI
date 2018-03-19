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
        window.location.href= "products/"+element.value+"/edit";
}
// delete one product
function deleteOneProduct(element){
        
        selectedProducts.push(element.value);
        var data = new FormData();
        data.append("ids",selectedProducts);
        console.log("deleting :"+element.value+" data "+selectedProducts);
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
$(document).ready(function (){
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
            console.log(data,selectedProducts);
            var list = document.getElementById("selectList");
            console.log(list.options[list.selectedIndex].text);
            if (list.options[list.selectedIndex].text=="delete") {
                 console.log("deleting");
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
                        console.log(data); }});
            }            
    });
    $("#checkboxAll").clikc(function(){
        //delete all the table 
    });
});