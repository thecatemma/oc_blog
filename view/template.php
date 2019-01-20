<!DOCTYPE html>
<!--Template inclu dans chaque vue qui regroupe les éléments html commun à toutes les pages
On inclut ici le css et les script WYSIWYG tinymce -->
<html>

  <head>
<!------- Charset------->

    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title?></title>
    <meta name="description" content="Billet simple pour l\'Alaska">
	  
<!------- JS ------->
	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script> -->
	<!-- <link rel="stylesheet" type="text/css" href="style/jquery.bxslider.css" /> -->
	<!-- <script src="js/jquery.bxslider.min.js"></script><!-- Appel JS du carousel --> 
	<script src="./View/js/carroussel.js" defer></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=evmxjxgwrombaci5zg013nbupc683dugdv2rvwk9tsg2lcj2"></script>
	  
    <script>tinymce.init({
      selector:'#textareatiny',
      branding: false,
      menubar: false
       });
	 </script>
	  
	  
<!-------- CSS ------->		
	<link rel="stylesheet" type="text/css" href="./view/style/blog.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pattaya" rel="stylesheet">
	<!--<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/awesome-4.7.0/css/font-awesome.min.css">-->
		
<!-- Bootstrap  -->
	<!--<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/bootstrap-theme.min.css" />-->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./view/style/style.css" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	
  <body id="page-top">
    <header class="navbar navbar-inverse navbar-fixed-top">
		
			<div id="titre">
			 <h1>Billet simple pour l'Alaska</h1>
			  <h2 id="subtitle">Le livre en ligne, par Jean Forteroche</h2>
			</div>	
			

<!-----SLIDER----->
			<div id="carrousel">
				<ul>
					<li><img src="./View/images/img1.jpg"/></li>
					<li><img src="./View/images/img2.jpg" /></li>
					<li><img src="./View/images/img3.jpg" /></li>
				</ul>
			</div>
<!-----FIN SLIDER----->
			
				<ul id="nav">
				  <li><a href="index.php">Home</a></li>
				  <li><a href="article.php?id=1">Livre</a></li>
				  <li><a href="biography.php">Biographie</a></li>
				  <li><a href="index.php?action=connexion">Admin</a></li>
<!-- <li><a class="lien-header" href="<?="./index.php?action=contact" ?>">Contact</a></li>-->
                <?php if (isset($_SESSION['nom']) AND isset($_SESSION['is_admin']))
                { ?>
                <li><a class="lien-header" href="<?="./index.php?action=deconnexion" ?>">Déconnexion</a></li>
                <?php  } ?>
				 </ul>
			
		
<!-- <?php echo $_SERVER['REQUEST_URI'] ; ?>-->
			
</header>	

  <div class="container" id="bloc-principal">
        <?= $contenu ?>
    </div>
  </body>
</html>
