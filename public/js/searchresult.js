var ratingvalue = 0;
function rating(number){
    ratingvalue = number;
    for (var i = 1; i <= number; i++) {
        var star = document.getElementById('star'+i);
        star.innerHTML = `<i class="fa fa-star" style="color: gold"></i>`;
        star.style.color = "#ffbf00";
    }
    for (var i = number+1; i <= 5; i++) {
        var star = document.getElementById('star'+i);
        star.innerHTML = `<i class="fa fa-star" style="color: black"></i>`;

    }
}
function saveRate(id) {
if (id) {
        var data = new FormData();
        data.append("id",id);
        data.append("rating",ratingvalue);
        jQuery.ajax({
                type : "POST",
                url : "/home/"+id+"/rate",
                data : data,
                cache: false,             // To unable request pages to be cached
                processData: false,
                contentType: false,
                success : function(data){
                    if (data=="rated") {
                        document.getElementById('ratingTab').remove();
                        document.getElementById('afterRating').classList.remove('hidden');
                    }
                    }});
    }
}
function addToCart(id) {
    var Quantity = 1;
    var data = new FormData();
        data.append("id",id);
        data.append("Quantity",Quantity);
        jQuery.ajax({
            type : "POST",
            url : "/home/"+id,
            data : data,
            cache: false,             // To unable request pages to be cached
            processData: false,
            contentType: false,
            success : function(data){
                window.location.href = "/cart";
                }});
}
function getfun(data) {
    data = Object.assign(data,extracturl());
    jQuery.ajax({
            type : "GET",
            url : "/search",
            data : data,
            success : function(data){
                    window.location=this.url;
            }
    });
}
function extracturl(){
    data = {};
    keyvalue = '';
    current = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
    for (var i = current.length - 1; i >= 0; i--) {
        if (current[i]=='=') {
            key='';
            for (var j = i - 1; j >= 0; j--) {
                if (current[j]=='&' || current[j]=='?') {
                    switch(key.valueOf()){
                        case "term":data = Object.assign(data,{term:keyvalue});
                            break;
                        case "category":data = Object.assign(data,{category:keyvalue});
                            break;
                        case "brand":data = Object.assign(data,{brand:keyvalue});
                            break;
                        case "rating":data = Object.assign(data,{rating:keyvalue});
                            break;
                        case "minprice":data = Object.assign(data,{minprice:keyvalue});
                            break;
                        case "maxprice":data = Object.assign(data,{maxprice:keyvalue});
                            break;
                    }
                    
                    key = '';
                    keyvalue = '';
                    i=j;
                    break;
                } else{
                    key = current[j] + key;
                }
            }
        } else {
            keyvalue = current[i]+keyvalue;
        }
        if (current[i]=='?') {
            break;
        }
    }
    return data;
}
function leftcategorylist(element) {
    data = {};
    data = extracturl();
    data.category = element.id;
    jQuery.ajax({

                type : "GET",
                url : "/search",
                data : data,
                success : function(data){
                        window.location=this.url;
                }
        });
}
function toggleTriangle(object,n) {
    object.classList.add("active");
    object.parentNode.getElementsByClassName('triangle')[n].classList.remove("active");
    object.parentNode.parentNode.getElementsByClassName('sort-text')[0].style.color = "#ff6348";
    data= {};

    switch(object.id){
        case "nametoggleup":
                        data = Object.assign(data,{sortBy:"name"});
                        data = Object.assign(data,{sort:"asc"});
                        
                        getfun(data);
                       break;
        case "nametoggledown":
                        data = Object.assign(data,{sortBy:"name"});
                        data = Object.assign(data,{sort:"desc"});
                        getfun(data);
                        break;
        case "pricetoggleup":
                        data = Object.assign(data,{sortBy:"price"});
                        data = Object.assign(data,{sort:"asc"});
                        getfun(data);
                        break;
        case "pricetoggledown":
                        data = Object.assign(data,{sortBy:"price"});
                        data = Object.assign(data,{sort:"desc"});
                        getfun(data);
                        break;
        case "ratetoggleup":
                        data = Object.assign(data,{sortBy:"rate"});
                        data = Object.assign(data,{sort:"asc"});
                        getfun(data);
                        break;
        case "ratetoggledown":
                        data = Object.assign(data,{sortBy:"rate"});
                        data = Object.assign(data,{sort:"desc"});
                        getfun(data);
                        break;
        default:

    }
}
jQuery(document).ready(function (){
    jQuery.noConflict();
// jQue😁ry.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')

    //show the value of termand category
    var iiddd = document.getElementById("productId").value;
    var d = document.getElementById('ratingTab');
    var data = new FormData();
    data.append("id",iiddd);
    jQuery.ajax({
                type : "POST",
                url : "/home/"+iiddd+"/checkrate",
                data : data,
                cache: false,             // To unable request pages to be cached
                processData: false,
                contentType: false,
                success : function(data){
                    if (data=="rated") {
                        d.remove();
                    }
                    }});    
    var terminput  = document.getElementById('term');
    var category = document.getElementById('category');
    var brand = document.getElementById('brand');
    var minprice = document.getElementById('minprice');
    var maxprice = document.getElementById('maxprice');
    keyvalue = '';
    current = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
    for (var i = current.length - 1; i >= 0; i--) {
        if (current[i]=='=') {
            key='';
            for (var j = i - 1; j >= 0; j--) {
                if (current[j]=='&' || current[j]=='?') {
                    switch(key.valueOf()){
                        case "term":terminput.value = keyvalue;
                            break;
                        case "category":category.value = keyvalue;
                            break;
                        case "brand":for (var i = 0; i < brand.options.length  ; i++) {
                            if (brand.options[i].text==keyvalue) {
                                brand.selectedIndex = i;};}
                            break;
                        case "rating":rating(keyvalue);
                            break;
                        case "minprice":minprice.value = keyvalue;
                            break;
                        case "maxprice":maxprice.value = keyvalue;
                            break;
                    } 
                    key = '';
                    keyvalue = '';
                    i=j;
                    break;
                } else{
                    key = current[j] + key;
                }
            }
        } else {
            keyvalue = current[i]+keyvalue;
        }
        if (current[i]=='?') {
            break;
        }
    }
    // jQuery("#nametoggleup").click( function(){
    //         data={};
    //         data = Object.assign(data,{sortBy:"term"});
    //         data = Object.assign(data,{sort:"asc"});
    //         jQuery.ajax({

    //         type : "GET",
    //         url : "/home/search",
    //         data : data,
    //         success : function(data){
    //                 window.location=this.url;
    //         }
    // });
    // });
    jQuery("#filter").click( function(){
        //get selected brand
        var brandlist = document.getElementById("brand");
        var brandindex = brandlist.selectedIndex;
        var brand  = brandlist.options[brandlist.selectedIndex].text;
        console.log(category.value);
        // get price 
        var minprice = document.getElementById('minprice').value;
        var maxprice = document.getElementById('maxprice').value;
        data = {};
        if (category.value != null) {
            data = {category:category.value};
        }
        if (term.value != null) {
            data = Object.assign(data,{term:term.value});
            }
        if (brand != 'All') {
            data = Object.assign(data,{brand:brand});
        }
        if (ratingvalue != 0) {
            data = Object.assign(data,{rating:ratingvalue});
            }
        if (minprice != 0) {
            data = Object.assign(data,{minprice:minprice});
        }
        if (maxprice != 0) {
            data = Object.assign(data,{maxprice:maxprice});
        }
        console.log(data);
            jQuery.ajax({

                type : "GET",
                url : "/search",
                data : data,
                success : function(data){
                        window.location=this.url;

            }
        });       
    });
});