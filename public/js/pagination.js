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

function page(n){
    data = {};
    data = extracturl();
    data = Object.assign(data,{page:n});
    jQuery.ajax({

                type : "GET",
                url : document.location.pathname,
                data : data,
                success : function(data){
                        window.location=this.url;
                }
        });
}
function nexPage(currentPage){
	var lastPage = document.getElementById('lastPage');
	data = {};
    data = extracturl();
    if (currentPage<lastPage) {
    	    data = Object.assign(data,{page:currentPage+1});
		    jQuery.ajax({

		                type : "GET",
		                url : document.location.pathname,
		                data : data,
		                success : function(data){
		                        window.location=this.url;
		                }
		        });
    }

}
function prePage(currentPage) {
	data = {};
    data = extracturl();
    if (currentPage>0) {
    	data = Object.assign(data,{page:currentPage-1});
	    jQuery.ajax({

	                type : "GET",
	                url : document.location.pathname,
	                data : data,
	                success : function(data){
	                        window.location=this.url;
	                }
	        });
    }
    
}
jQuery(document).ready(function (){
    jQuery.noConflict();
    var currentPage = document.getElementById('currentPage');
    if (currentPage.value>0) {
    	var page = document.getElementById('page'+currentPage.value);
    	page.setAttribute("class", "active");
    }
    console.log();

});