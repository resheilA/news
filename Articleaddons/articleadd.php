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
  </style>
</head>
<body>
<?php include '../navbar3.php'; ?>
<div class='container' id='category_back'>
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
<input type="text" class="form-control mb-4" name="vpc" id="vpcode" placeholder="Enter the vpcode"/>
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
		var vpcode = $('#vpcode').val();
		var adesc2 = $('#adesc2').val();
		var artsel = $('#artsel').val();
		var abtn = $('#abtn').val();
		$.ajax({
			url:'articleaddphp.php',
			method:'POST',
			data:{aname:aname,
			      adesc:adesc,
				  vpcode:vpcode,
				  adesc2:adesc2,
				  artsel:artsel,
				  abtn:abtn},
				  
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
		
		if(aname !== '' && adesc !== '' && artsel !== '' && vpcode !== '' && vpcode == 'letsgetrightintothenews')
		{
			$('#mainart').css('display','block');
			$('#firstart').css('display','none');
			$('#abtn').css('display','none');
			$('#abtn').css('display','block');
			
		}
		
	});
	
	
	
	
});
</script>
</body>
</html>