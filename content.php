<?php
session_start();



include 'config.php';

?>

<?php include 'header.php'; ?>

<div class='container-fluid'> 
  
<?php 

$sql = "SELECT * FROM articles INNER JOIN category ON article_category = cat_id WHERE article_id = $_GET[id]";
$result = $db->query($sql);





if($result->num_rows == 0)
{  
    echo"<h6><a href='index.php' style='text-decoration:underline'>Home</a> > <a href='articles.php?id=$row[article_category]' style='text-decoration:underline'>Articles</a></h6>";
	echo "<h2>No articles</h2>";
}
while($row = $result->fetch_assoc())
{
	if($row['article_block'] == 1)
	{
		header("Location:index.php");
	}
	else
	{
	echo"	
	<div class='row p-2'>
	<div class='col-md-9 p-5'>
	
	<img src='Profilepics/Articles/$row[article_unique_key]/$row[article_image]' alt ='image' style='max-width:100%;' class='m-2 pb-2'>
<h2 class='p'>$row[article_name]</h2>
<h5 class='p'>$row[article_summary]</h5>
  <p class='p-2'>$row[article_content]<p>
   
   <br>
   
  <h6 class='pb-4'><a href='index.php' style='text-decoration:underline'>Home</a> > <a href='articles.php?id=$row[article_category]' style='text-decoration:underline'>Articles</a> > $row[article_name] </h6>
   
   <h4>Comments:</h4>";
   $sql4 = "SELECT * FROM comments WHERE comment_article = $_GET[id] ORDER BY comment_create DESC";
  $result4=$db->query($sql4);


  echo " <form name='com' method='post' id='comments'>
                      
                      <textarea class='form-control' name='com_desc' rows='4' cols='155' id='cdesc' placeholder='Comment'></textarea>
					  <br>
					  <p class='err' id='error'></p>
					  <button type='submit' id='cbtn' class='btn btn-dark btn-lg float-right' name='newcom' >Submit</button>
					  </form>
					  <br>";
					  
  if($result4->num_rows == 0)
  {
	  echo "No comments";
  }
  else
  {
	  while($row4 = $result4->fetch_assoc())
	  {
		  echo "<h6>Posted on: $row4[comment_create]</h6>";
		   
		       if(empty($row4['comment_by']))
			   {
				   echo "<h6>By: Anonymous user</h6>";
			   }
			   else
			   {
		        echo "<h6>By: $row4[comment_by]</h6>";
		       }
			   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
           {
	        echo"";
           }
            else
           {
	        echo"<a href='Commentaddons/editcomment.php?id=$row4[comment_id]' class='float-right'>Edit</a>
			     <br><br>
			     <a href='Commentaddons/deletecomment.php?id=$row4[comment_id]' class='float-right'>Delete</a>";
           }
			   echo "<p>$row4[comment_summary]</p><hr>";
		  
	  }
	 
  }
  
 echo"  
  </div>
  <div class='col-md-3' style='border:1px solid black;'>
  <hr>
  <h5 class='text-center'>More articles</h5>
  <hr>
  <br>";
  $sql2="SELECT * FROM articles";
  $res=$db->query($sql2);
  while($row3=$res->fetch_assoc())
  {
	  if($row3['article_block'] == 0)
    {	
      echo"
      <a href='content.php?id=$row3[article_id]'>";
    }
	else
	{
		echo"<a href='content.php?id=$_GET[id]' onclick='Blockalert()'>";
	}
  echo"
  <div class='row'>
  <div class='col-xl-6'>
  <img src='Profilepics/Articles/$row3[article_unique_key]/$row3[article_image]' alt = 'image'  class='img-thumbnail'style='max-height:7em'>
  </div>
   <div class='col-xl-6'>
   <b>$row3[article_name]</b>
   
   <p>$row3[article_summary]</p>
   
   <p>$row3[article_create]</p>
   </div>
   </div>
   </a>
   <hr>
   <br>
  ";
  }
 echo"</div>
   </div>  
  
    ";
  
  
 }
  
}


 
?>  
  <br>
  
 
  </div>
<?php include 'footer.php'; ?>
<script>
$(document).ready(function(){
  $('#comments').submit(function(event){
		event.preventDefault();
		var cdesc = $('#cdesc').val();
		var cbtn = $('#cbtn').val();
      
		$.ajax({
			url:'Commentaddons/commenthandle.php?id=<?php echo $_GET['id']; ?>',
			method:'POST',
			data:{cdesc:cdesc,
				  cbtn:cbtn},
				  
				  beforeSend:function(){
			
			$('input').prop('disabled',true);
			$('button').prop('disabled',true);
			
			$('#error').html("<span class='spinner-border text-info'></span>");
			$('#cbtn').html("<span id='forpasspn' class='spinner-grow spinner-grow-sm'></span> Processing");
		},

        complete:function(){
			$('input').prop('disabled',false);
			$('button').prop('disabled',false);
			
			$('#cbtn').html("Submit");
			
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

function Blockalert(){
	alert('This article has been blocked by an admin');
}
</script>


</html>