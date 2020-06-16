<?php
session_start();



include 'config.php';

?>

<?php include 'header.php'; ?>

<div class="container-fluid">
  <div class='row'>
  
<?php 

$sql = "SELECT * FROM category";
$result = $db->query($sql);

while($row = $result->fetch_assoc())
{

echo"
  <div class='col-md-4 mb-4'>
  <a href='articles.php?id=$row[cat_id]&page=1'>
  <div class='card ml-4' style='width:400px'>
    <img class='card-img-top' src='Profilepics/Category/$row[cat_unique_key]/$row[cat_img]' alt='Card image' style='width:100%;height:230px;'>
    <div class='card-body'>
      <h4 class='card-title'>$row[cat_name]</h4>
      <p class='card-text'>$row[cat_desc]</p>
	  ";
	  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	  {
        echo "";
      }
	  else
	  {
		  echo"<br>
		      <a href='Categoryaddons/editcategory.php?id=$row[cat_id]' class='btn btn-warning'>Edit</a>
		      <a href='Categoryaddons/deletecategory.php?id=$row[cat_id]' class='btn btn-danger float-right'>Delete</a>";
	  }
	echo"
	</div>
  </div>
  </a>
  </div>
  ";
  
}
 
?>  
  <br>
  
 
  </div>
</div>

<?php include 'footer.php'; ?>

