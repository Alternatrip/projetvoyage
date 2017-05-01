<?php
    // Ma clé privée
    $secret = "6Lfrxh4UAAAAAOUKY0wZEbyhEOlz-zYwO9BHKkpX";
    // Paramètre renvoyé par le recaptcha
    $response = $_POST['g-recaptcha-response'];
    // On récupère l'IP de l'utilisateur
    $remoteip = $_SERVER['REMOTE_ADDR'];
    
    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip ;

    $decode = json_decode(file_get_contents($api_url), true);

    if ($decode['success'] == true) {

        echo "ok";

    } 

    else {

        echo "vous êtes un robot on dirai :O !";

    }

        

?>