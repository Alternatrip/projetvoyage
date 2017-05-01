<!DOCTYPE html>

<?php 

include("class/modulectrl.php");

  include("class/listetitresblog.php");

  $articlesManager = new ArticleCtrl("articles");

  $conseilsManager = new ArticleCtrl("conseil");


  $b= new ArticleCtrl("articles");


?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog de voyage composé des Articles du site Alternatrip, un blog de voyage autour du monde.">
    <meta name="author" content="Yann Gerri">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bugIE.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <title>Blog d'Alternatrip</title>

</head>

<body style="padding-top: 7rem;">

    <!-- Navigation -->
    <header>
        <?php 
            include("util/menu.php");
        ?>
    </header>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog  -->
                <!-- PHP -->
                <?php 
                if (isset($_GET['id'])) {
                   $article = $articlesManager->get($_GET['id']);?>


                <h1><?php echo $article['titre'];?></h1>
                <!--  un autheur -->
                <p class="lead">
                    Ecrit par <a href="#">Yann.G </a>
                </p>
                <hr>
                <!-- date publication et MAJ -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $article['date_time_publication_fr'];?></p>
                <hr>

                <!-- image de l'article -->
                <img class="img-responsive" src="<?php echo $article['image'];?>" style="border-radius: 1rem;">

                <hr>

                <!-- article -->
                <p class="lead"><?php echo $article['contenu'];?>
                </p>

<?php
 include('util/test_cap.php'); ?>

                  <!-- formulaire post -->
                <div class="well">
                    <form role="form" action="blogarticle.php?id=<?php echo $_GET['id']; ?>" method="post">
                        <h4>Votre prénom</h4>
                        <input class="form-control" type="text" placeholder="Prénom" name="auteur" id="auteur">
                        <h4>Commenter</h4>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="votre message" name="contenu" id="contenu"></textarea>
                        </div>
                        <input name="billet" type="hidden" value="<?php echo $_GET['id']?>" /><br />
                        <?php include ('util/captcha.php'); ?>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>

                <?php
                $articlesManager->sendComments($_GET['id'], $_POST);
                $articlesManager->getComments($_GET['id']);


            } else if (isset($_GET['id_conseil'])) {

               $article =  $conseilsManager->get($_GET['id_conseil']);

?>
                <h1><?php echo $article['titre'];?></h1>
                <!--  un autheur -->
                <p class="lead">
                    Ecrit par <a href="#">Yann.G </a>
                </p>
                <hr>
                <!-- date publication et MAJ -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $article['date_time_publication_fr'];?></p>
                <hr>

                <!-- image de l'article -->
                <img class="img-responsive" src="<?php echo $article['image'];?>" style="border-radius: 1rem;">

                <hr>

                <!-- article -->
                <p class="lead"><?php echo $article['contenu'];?>
                </p>

<?php
 include('util/test_cap.php'); ?>

                  <!-- formulaire post -->
                <div class="well">
                    <form role="form" action="blogarticle.php?id_conseil=<?php echo $_GET['id_conseil']; ?>" method="post">
                        <h4>Votre prénom</h4>
                        <input class="form-control" type="text" placeholder="Prénom" name="auteur" id="auteur">
                        <h4>Commenter</h4>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="votre message" name="contenu" id="contenu"></textarea>
                        </div>
                        <input name="billet" type="hidden" value="<?php echo $_GET['id_conseil']?>" /><br />
                        <?php include ('util/captcha.php'); ?>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
<?php
 
                                $conseilsManager->sendComments($_GET['id_conseil'], $_POST);
                                $conseilsManager->getComments($_GET['id_conseil']);
            } else {?>
                <script> document.location.href= "index.php";</script>
           <?php }

                
                ?>

                <hr>
                <hr>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- recherche -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- catégories imaginable -->
                <div class="well">
                    <h4>affichage par pays</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">thailande</a>
                                </li>
                                <li><a href="#">laos</a>
                                </li>
                                <li><a href="#">cambodge</a>
                                </li>
                                <li><a href="#">vietnam</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#"> et d'autres pays</a>
                                </li>
                                <li><a href="#">l'inde</a>
                                </li>
                                <li><a href="#">le népal</a>
                                </li>
                                <li><a href="#">ma...</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <div class="well">
                    <!-- SnapWidget -->
                    <script src="https://snapwidget.com/js/snapwidget.js"></script>
                    <iframe src="https://snapwidget.com/embed/369774" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>

                <!-- flux fb -->
                <div class="well">
                    <div class="fb-page" data-href="https://www.facebook.com/alternatriptravel/" data-tabs="timeline" data-width="400" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/alternatriptravel/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/alternatriptravel/">Alternatrip</a></blockquote></div>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>
</div><!-- /.container -->

    <!-- Footer -->
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery_1.12.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
    </script>

      <?php
        include('util/footer.php');
        ?>




</body>

</html>