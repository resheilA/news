<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
	header('location:../index.php');
}

include '../config.php';

$sql = "SELECT * from category";
$result = $db->query($sql);

if($result->num_rows == 0)
{
	echo "<script type='text/javascript'>
			   setTimeout(function(){window.location.assign('../index.php');});	</script>";
}
?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="ckeditor.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="jquery.backstretch.min.js"></script>
  <style>
  
  #mainart{display:none;}
  
 
.passcheck {
        float: right;
        margin-right: 6px;
        margin-top: -50px;
        position: relative;
        z-index: 2;
        
    }
	#eye:hover{cursor:pointer;}

  </style>
</head>
<body>
<?php include '../navbar3.php'; ?>
<div class='container' id='category_back' enctype="multipart/form-data">
<form name='art' method='post' id='article'>
<div id='firstart'>
<h3 id='user' class='text-center'>Create an Article</h3>

<input type='text' id = 'aname' name = 'art_name' class='form-control mb-4' placeholder = 'Enter the name of the article'>
<div class='form-group'>
Select a category:<select class='form-control' id='artsel' name='artselect'>
                   
<?php 

if(empty($result))
{
	echo "<script type='text/javascript'>
		        alert('There are no categories');
			   setTimeout(function(){window.location.assign('../index.php');});	</script>";
			   
	echo "<option value='No'>No categories</option>";
}

while($row = mysqli_fetch_assoc($result))
{
echo "
      <option value=$row[cat_id]>$row[cat_name]</option>";
}
?>
</select>
</div>
<textarea class='form-control' name='art_desc' rows='4' cols='155' id='adesc' placeholder='Summary'></textarea>

<br>
<input type='text' id = 'akey' name = 'art_key' class='form-control mb-4' placeholder = 'Enter the keywords(Seperate them by commas)'>
<input type="password" class="form-control mb-4" name="vpc" id="vpcode" placeholder="Enter the vpcode"/>
<span onclick="myFunction2()" id="eye" class="far fa-eye passcheck"></span>
<input type='file' name='file' id='file'/>
</div>
<div id='mainart'>
<h3 id='user' class='text-center'>Articles Content</h3>
<br>
<textarea class='form-control ckeditor' name='art_desc2' rows='4' cols='155' id='adesc2' placeholder='Summary'></textarea>

</div>
<p class='err' id='error'></p>
<button type="submit" id='abtn' class="btn btn-dark btn-block btn-lg" name='newart' >Submit</button>
</form>
<a href="../index.php" id='artcan'><button type="submit" class="btn btn-danger btn-block btn-lg">Cancel</button></a>
<br>

</div>
<script>
$(document).ready(function(){
	$('#article').submit(function(event){
		event.preventDefault();
		var aname = $('#aname').val();
		var adesc = $('#adesc').val();
		var akey = $('#akey').val();
		var vpcode = $('#vpcode').val();
		var adesc2 = $('#adesc2').val();
		var artsel = $('#artsel').val();
		var abtn = $('#abtn').val();
		var property = document.getElementById('file').files[0];
	    var form_data = new FormData();
		form_data.append("art_name",aname);
		form_data.append("art_desc",adesc);
		form_data.append("art_key",akey);
		form_data.append("vpc",vpcode);
		form_data.append("art_desc2",adesc2);
		form_data.append("artselect",artsel);
		form_data.append("newart",abtn);
		form_data.append("file",property);
		$.ajax({
			url:'articleaddphp.php',
			method:'POST',
			data:form_data,
			contentType:false,
			cache:false,
			processData:false,
				  
				  beforeSend:function(){
			
			$('input').prop('disabled',true);
			$('button').prop('disabled',true);
			
			$('#error').html("<span class='spinner-border text-info'></span>");
			$('#abtn').html("<span id='forpasspn' class='spinner-grow spinner-grow-sm'></span> Processing");
		},

        complete:function(){
			$('input').prop('disabled',false);
			$('button').prop('disabled',false);
			
			$('#abtn').html("Submit");
			
		},
		success:function(data){
				$('#error').html(data);
				
		},

        error:function(){
			$('#error').html('Failed to process data');
		}		
			
		})
		
		
		
		
	});
	
	
	
	
});

function myFunction2() {
  var x = document.getElementById("vpcode");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>