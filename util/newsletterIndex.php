<?php

    if(isset($_GET['email'])) // On vérifie que la variable $_GET['email'] existe.
    {
        if( !empty($_POST['email']) AND $_GET['email']==1 AND isset($_POST['new'])) /* On vérifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est égale à 1 et que la variable $_POST['new'] existe. */
        {

        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
            if($_POST['new']==0){ // Si la variable $_POST['new'] est égale à 0, cela signifie que l'on veut s'inscrire.

            // On définit les paramètres de l'e-mail.

            $email = $_POST['email'];

            $message = 'Pour valider votre inscription à la newsletter de alternatrip.world, <a href="../index.php/inscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';

            $destinataire = $email;

            $objet = "Inscription à la newsletter de alternatrip.world" ;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: alternatrip@outlook.fr' . "\r\n";

                if ( mail($destinataire, $objet, $message, $headers) ){ // On envoie l'e-mail.
                    echo "Pour valider votre inscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer. Vérifier aussi vos spam.";
                } else {
                    echo "Il y a eu une erreur lors de l'envoi du mail pour votre inscription. Veuiller essayer a nouveau.";
                }
            } elseif($_POST['new']==1){ // Si la variable $_POST['new'] est égale à 1, cela signifie que l'on veut se désinscrire.

            // On définit les paramètres de l'e-mail.

            $email = $_POST['email'];

            $message = 'Pour valider votre désinscription de la newsletter de alternatrip.world, <a href="../index.php/desinscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';

            $destinataire = $email;

            $objet = "Désinscription de la newsletter de alternatrip.world" ;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: alternatrip@outlook.fr' . "\r\n";

                if ( mail($destinataire, $objet, $message, $headers) ) {
                    echo "Pour valider votre désinscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
                } else{
                    echo "Il y a eu une erreur lors de l'envoi du mail pour votre désinscription. Veuillez essayer à nouveau.";
                }

            } else {
                    echo "Il y a eu une erreur !";
            }

        } else {
            echo "Vous n\'avez pas entré une adresse e-mail valide ! Veuillez recommencer !";
        }

        } else{
            echo "Il y a eu une erreur.";
        }

    } else { // Si les champs n'ont pas été remplis.
?>

<div class="modal fade bs-example" id="newsletterModal" tabindex.php="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
            <button type="button" class="close newsClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div id="newsletter-container">
                <div class="container contModalArticle">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 clearfix">
                            <h3>Recevoir les dernières nouvelles !</h3>
                            <form id="register-newsletter" method="post" action="index.php?email=1">
                            <input type="email" name="email" required="" placeholder="e-mail">
                            <input type="radio" name="new" value="0" />S''inscrire
                            <input type="radio" name="new" value="1" />Se désinscrire<br />
                            <input type="submit" name="submit" class="btn btn-custom-3" value="Envoyer.">
                            <input type="reset" name="reset" value="Effacer" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>