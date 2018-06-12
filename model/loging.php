<?php
session_start();


if(isset($_POST['lelogin'],$_POST['lepwd'])){

    $lelogin = trim($_POST['lelogin']);
    $lepwd = trim($_POST['lepwd']);

    if(in_array($lelogin,$login)){
        $key = array_search($lelogin,$login);
        if ($lepwd == $pwd[$key]){
            $_SESSION['clef'] = session_id();
            $_SESSION['nom'] = $lelogin;
            $_SESSION['permission'] = $perm[$key];
            header("Location: ./");
        }else{
            $affiche = "Mot de passe incorrecte";
        }
    }else{
        $affiche = "Login inconnu!";
    }
}
?>