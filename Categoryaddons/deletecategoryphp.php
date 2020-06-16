<?php

session_start();



if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
	header('location:../index.php');
}
else
{
	include '../config.php';
	
	if(isset($_POST['cbtn']))
	{
		
		
		$vpcode = mysqli_real_escape_string($db,$_POST['vpcode']);
		
	    $sql="SELECT * FROM articles LEFT JOIN category ON article_category = cat_id WHERE article_category = $_GET[id]";
		$res = $db->query($sql);
		
		if(empty($vpcode))
		{
			echo "<span class='err'>Please fill in the vpcode</span>";
		}
		elseif($vpcode != 'deletethisthing')
		{
			echo "<span class='err'>Wrong vpcode </span>";
		}
		elseif($res->num_rows > 0)
		{
			echo "<span class='err'>This category cannot be deleted unless and  until you delete all the articles in it </span>";
		}
		else
		{
			$sql = "DELETE FROM category WHERE cat_id = $_GET[id]";
		    $result = $db->query($sql);
		    echo "<script type='text/javascript'>
		          setTimeout(function(){window.location.assign('../index.php');});	</script>";
			
		}
		
		
	}
	
}

?>