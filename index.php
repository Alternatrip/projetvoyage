<!DOCTYPE html>

<?php 

  include("class/modulectrl.php");

  $m = new ModuleCtrl();
  $n = new ModuleCtrl();

  include("class/listetitresblog.php");

  $b= new ArticleCtrl("articles");

?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Blog de voyage autour du monde, venez découvrir mes découvertes, mes conseils, mon sac a dos, les trajets et modes de transports et toutes mes rencontres." />
    <meta name="author" content="Yann Gerri" />
    <meta name="copyright" content="©YannGerri" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/bugIE.css">
      <link rel="stylesheet" href="css/carousel.css">

        <title>Alternatrip</title>

  </head>
  <body>

    <!-- Menu et Carousel
    ================================================== -->

    <header>
      <?php
        include('util/menu.php');
        include('animations/carousel.php');
      ?>
    </header>


    <!-- Module blog, map, articles, photos, video et autres...
    ================================================== -->

    <section class="container marketing">
      <div class="row">
        <?php 
          $m->getHtmlString();
        ?>
      </div><!-- /.row -->
    </section>

    <div class="separateur">
      <div class="bg-2">
      </div>
    </div>

  <?php
  $n->getNews();
  ?>

  <!-- Module conseil, avant, pendant, après.
    ================================================== -->

    <section class="container conseils" id="ancrePartir">
     <?php
        include('util/menuconseil.php');
      ?>
    </section>

    <!-- Module projet.
    ================================================== -->

    <section class="container">
    <div class="row">


    </div>
    </section>

    <!-- Module pied de page.
    ================================================== -->

    





  <!--bibliothéque jQuery et javascript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/jquery_1.12.4.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/correctifs/bugIE.js"></script>
  <script>
    $(function () {
      $('[data-toggle="popover"]').popover();
    })
  </script>
  <script>
    $('#tabConseil a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
  </script>


<?php 
  include('modal/map.php');
  include('util/footer.php');
?>

  </body>

</html>