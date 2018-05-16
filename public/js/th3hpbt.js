var approvedUsers = [];
var deletedUsers = [];
function addApprovedUser(id,userId,userState) {
            if ( userState == 'pending' && !approvedUsers.includes(userId)) {
                id.innerHTML = "Approved";
                approvedUsers.push(userId);
            }
        }
function deleteUser(userId){
    deletedUsers.push(userId);
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
    var item = document.getElementById(element.id);
    if (element.value!="all") {
        var input = document.getElementById("category");
        input.value = element.id
    }
}
var bg = document.getElementsByClassName('modal-bg')[0];
var modal = document.getElementsByClassName('confir-modal')[0];
function showConfModal(id) {
    bg.style.display = 'block';
    modal.style.display = 'block';
    document.getElementById('productid').value = id;

}
function closeConfModal(){
    bg.style.display = 'none';
    modal.style.display = 'none';
}
// delete one product
function deleteOneProduct(){
        element = document.getElementById('productid');
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
                closeConfModal();
                console.log(data); }});
}
function validate(id,state){
    if (state==0) {
        var data = new FormData();
        data.append("id",id);
        jQuery.ajax({
            type : "POST",
            url : "/admin/orders/"+id+"/validate",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                if (data=='refuse') {
                    document.getElementById('refuse'+id).classList.remove("disabled");
                    document.getElementById('validate'+id).classList.add("disabled");
                    document.getElementById('outofstock'+id).innerHTML = "Out of Stock";
                }else if (data == 'validate'){
                    window.location.href = "/admin/orders";
                }
                
                }});
    }
}
function refuse(id,state){
    if (state==0) {
        var data = new FormData();
        data.append("id",id);
        jQuery.ajax({
            type : "POST",
            url : "/admin/orders/"+id+"/refuse",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                    window.location.href = "/admin/orders";
                }});
    }
}
function confirm(id){
    if (id>=0) {
        var data = new FormData();
        data.append("id",id);
        jQuery.ajax({
            type : "POST",
            url : "/admin/preparation/"+id+"/confirm",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                if (data=='confirmed') {
                    window.location.href = "/admin/preparation";
                }
                    
                }});
    }
}
function details(code){
    if (code!=null) {
        window.location.href = "/facture/"+code;
    }
    
}
function check(){
    var code = document.getElementById('codeinput').value;
    var data = new FormData();
    data.append("code",code);
    jQuery.ajax({
        type : "POST",
        url : "/admin/check/"+code,
        data : data,
        cache: false,             // To unable request pages to be cached
        processData: false,
        contentType: false,
        success : function(data){
            console.log(data);
            if (data=='Valid') {
                document.getElementById("validMsg").classList.remove("hidden");
                var pdf = document.getElementById("pdfSource");
                pdf.src = "/facture/"+code;
                pdf.classList.remove("hidden");
            } else if (data == 'notValid') {
                document.getElementById("notValidMsg").classList.remove("hidden");
            } else if (data = 'ard') {
                document.getElementById("notValidMsg").classList.remove("hidden");

            }
                
            }
        });

    
}
function ask(id){
    if (id>=0) {
        var data = new FormData();
        data.append("id",id);
        jQuery.ajax({
            type : "POST",
            url : "/admin/orders/"+id+"/ask",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                console.log(data);
                }});
    }
}
function getmissingproduct(code){
    if (code!=null) {
        var data = new FormData();
        data.append("code",code);
        document.getElementById('code').value = code;
        jQuery.ajax({
            type : "POST",
            url : "/orders/"+code+"/get",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                if ((data == 'noCode') || (data == 'noOrder')) {
                    console.log('fail');
                } else {

                    ms = document.getElementById('missingproducts');
                    av = document.getElementById('availableproducts');
                    for (var i = 1; i < data[0].length; i++) {
                        ms.innerHTML = ms.innerHTML +" "+ data[0][i].name+" ,";
                    }
                    for (var i = 1; i < data[1].length; i++) {
                        av.innerHTML = av.innerHTML +" "+ data[1][i].name+" ,"
                    }
                    // show up the model
                    modal = document.getElementById('cmodale');
                    modal.style.display = 'block' ;
                    document.body.style.backgroundColor = "#666";


                }
                        
                }});
    }
}
function hidemodel(){
    modal = document.getElementById('cmodale');
    modal.style.display = 'none';
    document.body.style.backgroundColor = "#f5f8fa";
}
function confirmissingproduct(){
    code = document.getElementById('code').value;
    if (code!=null) {
        var data = new FormData();
        data.append("code",code);
        jQuery.ajax({
            type : "POST",
            url : "/orders/"+code+"/confirm",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                console.log(data);
                hidemodel();
                }});
    }
}
function backToCart(){
    code = document.getElementById('code').value;
    if (code!=null) {
        var data = new FormData();
        data.append("code",code);
        jQuery.ajax({
            type : "POST",
            url : "/orders/"+code+"/backtocart",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                console.log(data);
                hidemodel();
                }});
    }
}
function deleteorder(){
    var code = document.getElementById('code').value;
    if (code!=null) {
        var data = new FormData();
        data.append("code",code);
        jQuery.ajax({
            type : "POST",
            url : "/orders/"+code+"/msdelete",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                hidemodel();
                }});
    }
}
function wantdel(id,who){
    document.getElementById('orderid').value = id;
    if (!(who=='user')) {
        bg.style.display = 'block';
        modal.style.display = 'block';
    }
    
}
function deleteOrders(who){
    var id = document.getElementById('orderid').value;
    if (id>=0) {
        var comment = document.getElementById('commentOrder').value;
        if (comment!="") {
            var data = new FormData();
            data.append("id",id);
            data.append("comment",comment);
            data.append("who",who);
            if (who == 'admin') {
                var sr = document.getElementById('sellerRadio');
                var br = document.getElementById('buyerRadio');
                if (sr.checked) {
                    data.append("faultofwho","seller")
                } else if (br.checked) {
                    data.append("faultofwho","buyer");
                }
            }
            jQuery.ajax({
                type : "POST",
                url : "/orders/"+id+"/delete",
                data : data,
                cache: false,             // To unable request pages to be cached
                processData: false,
                contentType: false,
                success : function(data){
                    if (data=="admin") {
                        closeConfModal();
                    }else{
                        document.getElementById('row'+id).remove();
                    }
                    
                    }});
        }else {
            console.log('no comment');
        }
    }
}
function Retrieved(id){
    if (id) {
        var data = new FormData();
        data.append("id",id);
        jQuery.ajax({
                type : "POST",
                url : "/admin/orders/"+id+"/retrieve",
                data : data,
                cache: false,             // To unable request pages to be cached
                processData: false,
                contentType: false,
                success : function(data){
                    if (data=="retrieved") {
                        document.getElementById('retrieved'+id).remove();
                    }
                    }});
    }
}
jQuery(document).ready(function (){
    jQuery.noConflict();
    var table = jQuery("#productsDataTable").DataTable();
// jQuery.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
//     }
// });
//useless one 
    // this save operations that did to the users 
    jQuery('#sub').click(function(){
        var data = new FormData();
        data.append("approveIds",approvedUsers);
        data.append("deleteIds",deletedUsers);
        console.log(deletedUsers);
        jQuery.ajax({
            type : "POST",
            url : "/admin/users",
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
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