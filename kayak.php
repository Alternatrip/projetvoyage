<?php
if(isset($_POST['pseudo']) && isset($_POST['motdepasse'])){

include('admin/class/usersCtrl.php');

$u = new usersCtrl();

var_dump($u->checkPass($_POST));
//IF checkpass($_POST) ==> Creation de la session, Variable de session à créer, redirection vers le panneau d'admin
//Else, redirection vers accueil ? Erreur ? 


}else{

?>
<!DOCTYPE html>
<html lang="fr">
<head>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/bugIE.css">
      <link rel="stylesheet" href="css/identificationUsers.css">


	<title>connexion</title>
</head>
<body>

<section class="container">
    <div class="row">

    <br/><br/><br/><br/>

    <p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Connection</a></p>

    </div>
</section>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/jquery_1.12.4.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/correctifs/bugIE.js"></script>
  <script>
    $(function () {
      $('[data-toggle="popover"]').popover();
    })
  </script>

  <?php 
  include('modal/indentificationusers.php');
  ?>


</body>
</html>

<?php
}
?>