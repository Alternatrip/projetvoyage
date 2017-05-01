<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Page de contact du Blog de voyage Alternatrip. Partagez vos voyages au bout du monde et échangeons nos connaissances." />
  <meta name="author" content="Yann Gerri" />
  <meta name="copyright" content="©YannGerri" />
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styleContact.css">
  <link rel="stylesheet" href="css/bugIE.css">
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <title>Contact</title>

</head>
<body>

<?php include('util/test_cap.php'); ?>

<section class="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
              <h2>Me contacter</h2>
              <p>Soit libre de me dire ce que bon te semble j'essaierai d'y répondre au plus vite. N'hésite pas à aller sur mes réseau sociaux!</p>
              <div class="row">
                <div class="col-md-8 col-md-offset-2">

    <?php
    /*
      ********************************************************************************************
      CONFIGURATION
      ********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
    $destinataire = 'yanngerri@protonmail.com';
     
    // copie ? (envoie une copie au visiteur)
    $copie = 'oui';
     
    // Action du formulaire (si votre page a des paramètres dans l'URL)
    // si cette page est index.php?page=contact alors mettez index.php?page=contact
    // sinon, laissez vide
    $form_action = '';
     
    // Messages de confirmation du mail
    $message_envoye = "Votre message nous est bien parvenu !";
    $message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
     
    // Message d'erreur du formulaire
    $message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
     
    /*
      ********************************************************************************************
      FIN DE LA CONFIGURATION
      ********************************************************************************************
    */
     
    /*
     * cette fonction sert à nettoyer et enregistrer un texte
     */
    function Rec($text)
    {
      $text = htmlspecialchars(trim($text), ENT_QUOTES);
      if (1 === get_magic_quotes_gpc())
      {
        $text = stripslashes($text);
      }
     
      $text = nl2br($text);
      return $text;
    };
     
    /*
     * Cette fonction sert à vérifier la syntaxe d'un email
     */
    function IsEmail($email)
    {
      $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
      return (($value === 0) || ($value === false)) ? false : true;
    }
     
    // formulaire envoyé, on récupère tous les champs.
    $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
    $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
    $objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
    $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
     
    // On va vérifier les variables et l'email ...
    $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
    $err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
     
    if (isset($_POST['envoi']))
    {
      if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
      {
        // les 4 variables sont remplies, on génère puis envoie le mail
        $headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
        //$headers .= 'Reply-To: '.$email. "\r\n" ;
        //$headers .= 'X-Mailer:PHP/'.phpversion();
     
        // envoyer une copie au visiteur ?
        if ($copie == 'oui')
        {
          $cible = $destinataire.';'.$email;
        }
        else
        {
          $cible = $destinataire;
        };
     
        // Remplacement de certains caractères spéciaux
        $message = str_replace("&#039;","'",$message);
        $message = str_replace("&#8217;","'",$message);
        $message = str_replace("&quot;",'"',$message);
        $message = str_replace('&lt;br&gt;','',$message);
        $message = str_replace('&lt;br /&gt;','',$message);
        $message = str_replace("&lt;","&lt;",$message);
        $message = str_replace("&gt;","&gt;",$message);
        $message = str_replace("&amp;","&",$message);
     
        // Envoi du mail
        $num_emails = 0;
        $tmp = explode(';', $cible);
        foreach($tmp as $email_destinataire)
        {
          if (mail($email_destinataire, $objet, $message, $headers))
            $num_emails++;
        }
     
        if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
        {
          echo '<p>'.$message_envoye.'</p>';
        }
        else
        {
          echo '<p>'.$message_non_envoye.'</p>';
        };
      }
      else
      {
        // une des 3 variables (ou plus) est vide ...
        echo '<p>'.$message_formulaire_invalide.'</p>';
        $err_formulaire = true;
      };
    }; // fin du if (!isset($_POST['envoi']))
     
    if (($err_formulaire) || (!isset($_POST['envoi'])))
    {
      // afficher le formulaire
      echo '
      <form id="contact" class="form-horizontal" method="post" action="'.$form_action.'">
                    <div class="form-group">
                      <label for="nom">nom</label>
                      <input type="text" class="form-control" id="nom" placeholder="Ton nom" name="nom" value="'.stripslashes($nom).'" tabindex="1" >
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="quelque.chose@example.com" name="email" value="'.stripslashes($email).'" tabindex="2"><br/>
                    </div>
                    <div class="form-group ">
                      <label for="objet">Objet</label>
                      <input type="text" class="form-control" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="3" placeholder="Motif">
                      <label for="message">Votre message</label>
                     <textarea  class="form-control" placeholder="Une petite histoire ou autre..." id="message" name="message" tabindex="4">'.stripslashes($message).'</textarea> 
                    </div>';

                    include ("util/captcha.php");
                    
                    echo '<button type="submit" class="btn btn-primary" name="envoi">Envoyer</button>
                  </form>';
    };
    ?>
                  <hr>
                    <h3>Réseaux sociaux</h3>
                  <ul class="list-inline banner-social-buttons">
                    <li><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url="https://www.linkedin.com/in/yanngerri/?locale=en_US" data-counter="top"></script></li>
                    <li><div class="fb-like" data-href="https://www.facebook.com/alternatriptravel/" data-layout="button_count" data-action="recommend" data-size="large" data-show-faces="true" data-share="true"></div></li>
                    <li><div class="g-ytsubscribe" data-channelid="UCS9a1Iua4ukRcXn1lsz9Glg" data-layout="default" data-count="default"></div></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </section>

      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js"></script>

</body>
</html>