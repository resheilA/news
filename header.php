<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Champion.in - Go Ahead  !</title>
      <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style-starter.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
h1{text-align:center;}
	a{color:black;}
	a:hover{text-decoration:none;}
</style>
  </head>
  <body>


<!-- Top Menu 1 -->

<!-- //Top Menu 1 -->
<section class="w3l-bootstrap-header">
  <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2 sticky-top"  style="background-color:#ccffcc">
    <div class="container">
    <a class="navbar-brand" href="index.html"><span class="fa fa-trophy" style="color:#D4AF37;"></span> Champion News</a>
      <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
		  <li class="nav-item">
		  <div class='dropdown'>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php?page=infra_index">Articles</a>
			<div class='dropdown-menu'>
               <a class='dropdown-item' href='content.php?id=33'>View articles</a>
                <a class='dropdown-item' href='listarticles.php?page=1'>List articles</a>
              </div>
			  </div>
          </li>
		  
          
        </ul>
       
      </div>
    </div>
  </nav>
</section>
<br>
<?php 
if(isset($result['titlebar']))
if($result['titlebar'] == "yes"){
	echo '
<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4">
    <div class="container py-lg-3">
      
      <h2><i class="fa fa-fire"></i>'.$result["title"].'</h2>
      <p>'.$result["sub_title"].'</p>
   
    </div>
  </div>
</section>
';
}
else
{
	echo '<hr>';
}
?>