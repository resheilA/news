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
	    
		
		
		if(empty($vpcode))
		{
			echo "<span class='err'>Please fill in the vpcode</span>";
		}
		elseif($vpcode != 'deletethisthing')
		{
			echo "<span class='err'>Wrong vpcode </span>";
		}
		else
		{
			$sql = "DELETE FROM articles WHERE article_id = $_GET[id]";
			$db->query($sql);
			echo "<script type='text/javascript'>
			   setTimeout(function(){window.location.assign('../index.php');});	</script>";
			
		}
		
		
	}
	
}

?>