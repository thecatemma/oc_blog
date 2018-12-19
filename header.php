<?php ?>
<!DOCTYPE html>
<html>
	<head>
<!------- Charset------->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Billet simple pour l\'Alaska">
		
<!-------- CSS ------->		
	<link rel="stylesheet" type="text/css" href="./blog.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/awesome-4.7.0/css/font-awesome.min.css">
		
<!-------- Titre ------->		
	<title>"Billet simple pour l'Alaska"</title>

<!------- JS ------->
	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script> -->
	<!-- <link rel="stylesheet" type="text/css" href="style/jquery.bxslider.css" /> -->
	<!-- <script src="js/jquery.bxslider.min.js"></script><!-- Appel JS du carousel --> 
		<script src="./carroussel.js" defer></script>
	</head>
	
	<body>
		<header>
		
				<div id="titre">
				 <h1>Billet simple pour l'Alaska</h1>
				  <p>le livre en ligne, par Jean Forteroche</p>
				   
				</div>	
			

<!-----SLIDER----->
			<div id="carrousel">
				<ul>
					<li><img src="images/img1.jpg"/></li>
					<li><img src="images/img2.jpg" /></li>
					<li><img src="images/img3.jpg" /></li>
				</ul>
			</div>
<!-----FIN SLIDER----->
			
			<nav class="nav">
				<ul class="navbar">
				  <li><a href="./index.php">Home page</a>
				  <li><a href="./article.php?id=1">Livre</a>
				  <li><a href="ville.html">Biographie</a>
				  <li><a href="liens.html">Liens</a>
				  <li><a href="./admin">ADMINISTRATION</a>
				 </ul>
			
			</nav>

<!-- <?php echo $_SERVER['REQUEST_URI'] ; ?>-->
			
		</header>';