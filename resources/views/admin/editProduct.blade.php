@extends('layouts.dashboard')
@section('page_heading','Modifier le produit')
@section('section')
<style type="text/css">

#images{
	min-width: 400px;
	min-height: 400px;
}
.rmImgBtn{
	position: absolute;
	color: #e55039;
	font-size: 35px;
	top: 15px;
	right: 15px;
	cursor: pointer;
}
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0,5;
}
input[type=text] {
  width: 100%;
  max-width: 500px;
  margin-bottom: 20px;
  padding: 2px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
#tab1{
	display: none;
}
.div{
		height: 402px;
		max-width: 402px;
		border-style: dotted;

	}
	
input[type="file"] {
    	display: none;
	}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
h1{
	text-align: center;
	margin : 20px;
	}
	label {
	  margin-bottom: 10px;
	  display: block;
	}
	.inline{
		display:inline-block;
	}

</style>




<div class="card">
<form method="POST" id="updateform" enctype="multipart/form-data" accept-charset="utf-8" action="javascript:;">
@csrf	


<div class="container" id="tab1">
	<div class="row">
<div class="col-md-4">

<div class="div">
<img id="output" height="395" width="277" src="{{ $product->image }}" />
</div>

<label class="custom-file-upload btn btn-primary blue-btn">
<input type="file" id="pimg" accept="image/*" name="pimage" onchange="loadFile(event)">
Upload a pic
</label>
</div>

<div class="col-md-8">
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<label>Name :</label>
			<input type="text" id="name" value="{{ $product->name }}" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Brand :</label>
			<input type="text" id="brand" value="{{ $product->brand }}" class="form-control">
		</div>
	</div>

	<div>
		 <div class="dropdown">
		  <button class="btn btn-primary dropdown-toggle blue-btn" type="button" data-toggle="dropdown">Categories
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		  </ul>
		</div> 
	</div><br>
		
		<div >
			<label>Price :</label>
			<input type="text" value="{{ $product->price }}" id="price" class="form-control inline" style="width: 200px">
			<span class="inline">DZD</span>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<label>Quantity :</label>
					<input type="text" name="" id="quantity" value="{{ $product->quantity }}" class="form-control">
				</div>
				<div class="col-md-4">
					<label>Quantity for sale :</label>
					<input type="text" name="" id="quantitySale" value="{{ $product->quantitySale }}" class="form-control">
				</div>
				
			</div>
			
		</div>
		<div>
	<label>Description :</label>
	<textarea id="desc" value="{{ $product->productDetails->desc }}" class="form-control" rows="4"></textarea>
</div>
</div>
</div>



</div>
<div style="overflow:auto;">
<div style="float:right;">
<button type="button" id="nextBtn" onclick="showTab(2)" class="btn btn-info">
	Next&nbsp;<i class="fa fa-arrow-right"></i>
</button>
</div>
</div>
</div>
</form>


<div id="tab2">
	
	<center><h3>Adding pictures</h3>
		<div class="container">
			<label class="custom-file-upload btn btn-primary blue-btn" >
			<input type="file" accept="image/*" id="addPic" name="images[]" onchange="addPicFun(event)" >
			+ Uplaod new image <br>
			</label>
			<div class="container">

			<div class="row" id="images">

			</div>

			</div>

			<div style="overflow:auto;">
				  <div style="float:right;">
				    <button type="button" id="prevBtn" onclick="showTab(1)" class="btn btn-info">
				    	<i class="fa fa-arrow-left"></i>&nbsp;Previous
				    </button>
				    <button type="submit" id="update" class="btn btn-success">
				    	submit
				    </button>
				  </div>
			</div>
		</div>

	</center>	
</div>


<div style="text-align:center;margin-top:40px;">
<span class="step" onclick="showTab(1)"></span>
<span class="step" onclick="showTab(2)"></span>
</div>
<input type="hidden" id="imgs" name="imgs" value="{{ $imgs }}">
<input type="hidden" id="productId" name="productid" value="{{ $product->id }}">
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
	var images = [];
	var imgNbr = 0;
	var NewImgsSrc = [];
	var deletedOldImgs = [];
	var pImg;
	var imgs = [];
	function addPicFun(event){
		src = URL.createObjectURL(event.target.files[0]);
		imgs[src] = $('#addPic').prop('files')[0];3
		NewImgsSrc.push(src);
		console.log(imgs);
		document.getElementById("images").innerHTML += '<div class="col-md-4"><div class="rmImgBtn" id="'+imgNbr+'" onclick="rm(this)"><b>&times;</b></div><br><img id="img'+imgNbr+'" height="395" width="295" src="'+src+'"/></div>';
		images[imgNbr] = event.target.files[0];
		imgNbr++;
		if (imgNbr > 5) {
			input = document.getElementById("addPic");
			input.setAttribute('disabled', true);
			input.parentNode.setAttribute('disabled', true); 	
		}
	}
	function showTab(tab){
		if(tab == 1){
			document.getElementById("tab1").style.display = "block";
			document.getElementById("tab2").style.display = "none";
			document.getElementsByClassName("step")[0].style.backgroundColor = "#26dad2";
			document.getElementsByClassName("step")[1].style.backgroundColor = "#bbbbbb";
		}else{
			document.getElementById("tab1").style.display = "none";
			document.getElementById("tab2").style.display = "block";
			document.getElementsByClassName("step")[1].style.backgroundColor = "#26dad2";
			document.getElementsByClassName("step")[0].style.backgroundColor = "#bbbbbb";
		}

	}
	function rm(object){
		if (imgNbr > 5) {
			input = document.getElementById("addPic");
			input.removeAttribute('disabled');
			input.parentNode.removeAttribute('disabled');
		}
		index = object.getAttribute('id');
		deletedOldImgs.push(document.getElementById("img"+object.id).src);
		for (var i = index+1; i <imgNbr ; i++) {
			nIndex = document.getElementsByClassName("rmImgBtn")[i-1].getAttribute('id');
			document.getElementsByClassName("rmImgBtn")[i-1].setAttribute("id",nIndex--);
			}
		images.splice(index, 1);
		object.parentNode.remove();
		imgNbr--;
		
	}
	function loadFile(event) {
	var output = document.getElementById('output');
	deletedOldImgs.push(document.getElementById('output').src);
	pImg = $('#pimg').prop('files')[0];

	console.log(deletedOldImgs);
	output.src = URL.createObjectURL(event.target.files[0]);
	};
$(document).ready(function(){

	var oldImgsPath = document.getElementById("imgs").value.split(' ');
	imgNbr = oldImgsPath.length;
	// o in for hide the principale pic in the tab2
	for (var i = oldImgsPath.length - 1; i > 0; i--) {
		document.getElementById("images").innerHTML += '<div class="col-md-4"><div class="btn rmImgBtn" id="'+i+'" onclick="rm(this)">X</div><br><img id="img'+i+'"height="395" width="295" src="'+oldImgsPath[i]+'"/></div>';
	}

	showTab(1);

	// $.ajaxSetup({
	//     headers: {
	//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 //    }});
    $("#update").click( function(){
				var id = document.getElementById("productId").value;
			    var name = document.getElementById("name").value;
		        var brand  = document.getElementById("brand").value;
		        var price = document.getElementById("price").value;
		        var quantity = document.getElementById("quantity").value;
		        var description = document.getElementById("desc").value;
		        var quantitySale = document.getElementById("quantitySale").value;
		        var categoryId = 1;

		        var data = new FormData();
		        data.append("id",id);
		        data.append("name",name);
		        data.append("brand",brand);
		        data.append("price",price);
		        data.append("quantity",quantity);
		        data.append("quantitySale",quantitySale);
		        data.append("desc",description);
		        data.append("categoryId",categoryId);
		        data.append("imgNum",imgNbr);
		        data.append("deletedImgs",deletedOldImgs);
		        data.append("pimg",pImg);
		        var index = [];
		        for (var i =  0; i < NewImgsSrc.length; i++) {

		        	if(!deletedOldImgs.includes(NewImgsSrc[i])){
		        		index.push(name+i);
		        		data.append(name+i,imgs[NewImgsSrc[i]]);
		        		console.log("added : "+NewImgsSrc[i]+" "+imgs[NewImgsSrc[i]]);
		        	}
		        	
		        }
		        data.append("newImgIndex",index);
                $.ajax({
                type : "POST",
                url : "/admin/products/update",
                data : data,
            	cache: false,             // To unable request pages to be cached
                processData: false,
    			contentType: false,
                success : function(data){
                	window.location.pathname = '/admin/products';
                	window.location.href='/admin/products';
                    console.log(data); }});
        
	});
});

</script>

@stop