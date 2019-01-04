<?php

require_once('./functions.php');

if(isset($_POST['title'])) {
	//print_r($_POST);
	createArticle($_POST['title'], $_POST['content']);
	
	echo ('Larticle : '.$_POST['title'].' a été créé');

}
else {
	echo 'Merci de renseigner les données pour article a créer <br/><br/>';
}

?>

<head>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
		  tinymce.init({
			selector: '#mytextarea',
			plugins: "paste",
            //menubar: "edit",
            toolbar: "paste"
		  });
		  </script>	   
		<meta charset="utf-8" />
		<title>Billet simple pour l'alaska Admin</title>
	</head>
	
	<body>
	  <a href="index.php">Retour aux articles</a>
		
	  <div class="container">
		
			
<!-- ajouter action au submit du formulaire pour stocker les infos en bdd,
quand on clique sur valider ça execute l'action -->
		  
  <form method="post" action="formulaireAjout.php"><!-- fait appel à ce même fichier-->
	  	<p>TITRE<input type="text" name="title" value="">
		<p>DATE <time></time></p>
    	<textarea id="mytextarea" name="content"></textarea>	  
	  
	  	<input type="hidden" name="MAX_FILE_SIZE" value="2097152"> 
      	<p>Choisissez une photo avec une taille inférieure à 2 Mo.</p> 
      	<input type="file" name="photo"> 
      	<br /><br /> 
      	<input type="submit" name="ok" value="Envoyer"> 
   </form> 
   
		  <br /> 
   <a href="../index.php" >VISITEZ LE BLOG</a> 
</body> 
</html>

