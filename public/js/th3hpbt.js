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
function selectedCategory(element) {
    var item = document.getElementById("element.id");
    if (element.value!="all") {
        var input = document.getElementById("category");
        input.value = element.id
    }
}
// delete one product
function deleteOneProduct(element){
        
        selectedProducts.push(element.value);
        var data = new FormData();
        data.append("ids",selectedProducts);
        jQuery.ajax({
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
jQuery(document).ready(function (){
    jQuery.noConflict();
    var table = jQuery("#productsDataTable").DataTable();
    var searchinput = document.getElementById("term");
// jQuery.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
//     }
// });
//useless one 
    // this approve the users 
    jQuery('#sub').click(function(){
        var dataString = "ids="+approvedUsers;
        jQuery.ajax({
            type : "POST",
            url : "/admin/users",
            data : dataString,
            success : function(data){
                console.log(data); }
        });
    });

    // this about products its execute a command in the lits like delete so its delete the selected items
    jQuery("#execute").click( function(){
            var data = new FormData();
            data.append("ids",selectedProducts);
            var list = document.getElementById("selectList");
            if (list.options[list.selectedIndex].text=="delete") {
                 jQuery.ajax({
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
    jQuery("#checkboxAll").click(function(){
        
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
});