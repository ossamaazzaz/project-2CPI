<!DOCTYPE html>
<html>
<head>
	<title>page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
	body{
		font-size: 17px;
		padding: 0px;
		background-color: #f2f2f2;
		margin: 0;
		overflow-x: hidden
	}
	#images{
		min-width: 400px;
		min-height: 400px;
	}
	.rmImgBtn{
		background-color: red;
		color: white;
		font-size: 15px;
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
	  padding: 12px;
	  border: 1px solid #ccc;
	  border-radius: 5px;
	}
	#tab1{
		display: none;
	}
		.div{
			height: 402px;
			max-width: 302px;
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

</head>



<body>
	
	<h1>Add product</h1>
	
	<div class="container" id="tab1">
		<div class="row">
	<div class="col-md-4">
	<div class="div">
	<img id="output" height="395" width="295" />
	</div>
	<label class="custom-file-upload btn btn-primary">
    <input type="file" accept="image/*" onchange="loadFile(event)">
    Upload a pic
</label>
</div>


<div class="col-md-8">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<label>Name :</label>
				<input type="text" name="" value="{{ $product->name }}" class="form-control">
			</div>
			<div class="col-md-4">
				<label>Brand :</label>
				<input type="text" name="" value="{{ $product->brand }}" class="form-control">
			</div>
			</div>

			<div>
			<label>Categories :</label>
			 <div class="dropdown">
			  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
			  <span class="caret"></span></button>
			  <ul class="dropdown-menu">
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			  </ul>
			</div> 
			</div>
			
			<div >
				<label>Price :</label>
				<input type="text" value="{{ $product->price }}" class="form-control inline" style="width: 200px">
				<span class="inline">DZD</span>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<label>Quantity :</label>
						<input type="text" name="" value="{{ $product->quantity }}" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Quantity for sale :</label>
						<input type="text" name="" value="{{ $product->quantitySale }}" class="form-control">
					</div>
					
				</div>
				
			</div>
	</div>
	<div>
		<label>Description :</label>
		<input type="text" name="" value="{{ $product->descritpion }}" class="form-control">
	</div>
</div>
</div>
<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="nextBtn" onclick="showTab(2)" >Next</button>
  </div>
</div>


</div>
<div id="tab2">
	<center><h3>Adding pictures</h3>
		<label class="custom-file-upload btn btn-primary" >
    <input type="file" accept="image/*" id="addPic" onchange="addPic(event)" >
    + Uplaod new image <br>
</label>
<div class="container">

	<div class="row" id="images">
	
	</div>
	
	
<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="showTab(1)">Previous</button>
    <button type="submit" id="nextBtn" >submit</button>
  </div>
</div>
	
</div>
</center>
</div>

<div style="text-align:center;margin-top:40px;">
  <span class="step" onclick="showTab(1)"></span>
  <span class="step" onclick="showTab(2)"></span>
</div>


	
		
	
	

<script>
	var images = [];
	var imgNbr = 0;

	function showTab(tab){
		if(tab == 1){
			document.getElementById("tab1").style.display = "block";
			document.getElementById("tab2").style.display = "none";
			document.getElementsByClassName("step")[0].style.backgroundColor = "#2ecc71";
			document.getElementsByClassName("step")[1].style.backgroundColor = "#bbbbbb";
		}else{
			document.getElementById("tab1").style.display = "none";
			document.getElementById("tab2").style.display = "block";
			document.getElementsByClassName("step")[1].style.backgroundColor = "#2ecc71";
			document.getElementsByClassName("step")[0].style.backgroundColor = "#bbbbbb";
		}
	
	}
	showTab(1);
var srcArray = [];
var idArray = [];
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    console.log("output "+event);
  };
  function addPic(event){
   src = URL.createObjectURL(event.target.files[0]);
   srcArray.push(src);
   console.log("src " + src);
   document.getElementById("images").innerHTML += '<div class="col-md-4"><div class="btn rmImgBtn" id="'+imgNbr+'" onclick="rm(this)">X</div><br><img height="395" width="295" src="'+src+'"/></div>';
   images[imgNbr] = event.target.files[0];
   imgNbr++;
   console.log("imgNbr "+imgNbr);
   if (imgNbr > 5) {
   	input = document.getElementById("addPic");
   	input.setAttribute('disabled', true);
   	input.parentNode.setAttribute('disabled', true); 	
   }
  }

  function rm(object){
  	if (imgNbr > 5) {
  		input = document.getElementById("addPic");
  		input.removeAttribute('disabled');
  		input.parentNode.removeAttribute('disabled');
  	}
  	index = object.getAttribute('id');
  	for (var i = index+1; i <imgNbr ; i++) {
  		nIndex = document.getElementsByClassName("rmImgBtn")[i-1].getAttribute('id');
  		document.getElementsByClassName("rmImgBtn")[i-1].setAttribute("id",nIndex--);
  		}
  	images.splice(index, 1);
  	object.parentNode.remove();
  	imgNbr--;
  	
  }
 
</script>

</body>
</html>