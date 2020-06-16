<?php
session_start();



include 'config.php';

if(!isset($_GET['page']))
{
	header("Location:index.php");
}

?>

<?php include 'header.php'; ?>

<div class="container">
  
  
<?php 

$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$sql = "SELECT * FROM articles LIMIT $start,$limit";
$result = $db->query($sql);



if($result->num_rows == 0)
{
	echo "<h2>No articles</h2>";
}
while($row = $result->fetch_assoc())
{
	 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
  {
	echo"";
  }
  else
  {
	  echo"<a href='Articleaddons/editarticle.php?id=$row[article_id]' class='float-right'>Edit</a>
	       <br><br>";
		  if($row['article_block'] == 0)
		  {
		   echo"<a href='Articleaddons/blockarticle.php?id=$row[article_id]' class='float-right'>Block</a>
		       <br><br>";
		  }
		  else
		  {
			  echo"<a href='Articleaddons/blockarticle.php?id=$row[article_id]' class='float-right'>Unblock</a>
		       <br><br>";
		  }
	  echo"<a href='Articleaddons/deletearticle.php?id=$row[article_id]' class='float-right'>Delete</a>";
  }

 if($row['article_block'] == 0)
 {	 
echo"
   <a href='content.php?id=$row[article_id]'>
   <div class='row'>
   <div class='col-md-6'>
   <img src='Profilepics/Articles/$row[article_unique_key]/$row[article_image]' alt = 'image' style='width:400px;height:200px;'>
   </div>
   <div class='col-md-6'>
   <h2>$row[article_name]</h2>
   </a>
   ";
 }
 else
 {
	 echo"
	 
	   
			   
   <a href='listarticles.php?page=1' onclick='Blockalert()'>
   <div class='row'>
   <div class='col-md-6'>
   <img src='Profilepics/Articles/$row[article_unique_key]/$row[article_image]' alt = 'image' style='width:400px;height:200px;'>
   </div>
   <div class='col-md-6'>
   <h2>$row[article_name]</h2>
   </a>
   ";
 } 
   
echo"
   <h5>$row[article_summary]</h5>
   </div>
   </div>
   <hr>
  
  ";
  
}
 
?>  
  <br>
  
  <?php
  
  $page_query = "SELECT * FROM articles";
                $page_result = $db->query($page_query);
                $total_records = mysqli_num_rows($page_result);
                $total_pages = ceil($total_records/$limit);
                $prev = $page - 1;
                $next = $page + 1;
				$start = 1;
  
 if($_GET['page'] == 1)
 {
	 echo "<ul class='pagination'>";
 }
 else
 {
echo" 
  <ul class='pagination'>
  <li class='page-item'><a class='page-link' href='listarticles.php?page=$prev'>Previous</a></li>";
 }
  for($i=1;$i<=$total_pages;$i++) : 
  echo"
  <li class='page-item'><a class='page-link' href='listarticles.php?page=$i'>$i</a></li>";
 endfor;
 echo" <li class='page-item'><a class='page-link' href='listarticles.php?page=$next'>Next</a></li>
</ul>
  ";
 
 ?>
  
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();  

  
});

function Blockalert(){
	alert('This article has been blocked by an admin');
}
</script>
<?php include 'footer.php'; ?>
</html>