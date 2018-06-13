<?php
require_once "connect.php";

function listeArtiAccueil(PDO $PDO){

    $recup = $PDO->query("SELECT idarticle,title, substr(content,1,150) AS texte, publication FROM article ORDER BY publication DESC ;");
    // on prends le nombre de résultat(s)
    $nb = $recup->fetchAll(PDO::FETCH_ASSOC);
    // si on a au moins 1 résultat ($nb == true)
    if($nb){
        return $recup->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}