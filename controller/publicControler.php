<?php

$db = new ConnectPDO(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_LOGIN,DB_PWD,DB_CHARSET);

$crud = new crud($db);

/*
 * detail
 */

if (isset($_GET['idarticle'])&& is_numeric($_GET['idarticle'])){
    $idarticle = (int)$_GET['idarticle'];
    $recup = $crud->getContenuById($idarticle);
    if (!$recup){
        $contenue = "Cet article n'existe plus ou a été déplacé";
    }else {
        $contenue = new contenuArticle($recup);
    }
    
    //appel de vue detail
    require_once "View/detail.php";
}elseif (isset($_GET['insert'])) {
    if (empty($_POST)) {
        // appel vue insert
        require_once "View/forminsert.php";
    } else {
        // hydration d'un objet avec varaible post
        $newContenu = new contenuArticle($_POST);

        // insertion dans la table contenu
        $result = $crud->create($newContenu);

        if ($result) {
            header("Location: ./");
        } else {
            $error = "Veuillez recommencer";
            //vue insert contenu
            require_once "View/forminsert.php";
        }

    }

    /*
     * on veut modifier 
     */
}elseif (isset($_GET['update'])&& is_numeric($_GET['update'])) {
    $id = (int)$_GET['update'];

    // recup l'article qu'on veut modif

    $rempliForm = $crud->getContenuById($id);

    //on transforme en objet

    $recuperation = new contenuArticle($rempliForm);

    // si formulaire non envoyé

    if (empty($_POST)) {

        // si on essaye de modif un article qui existe pas 
        if (!$rempliForm) die("Vous essayez de modifier un article qui n'existe pas/plus");

        // appel vue update
        require_once "View/formupdate.php";
    } else {
        $recuperation = new contenuArticle($_POST);

        // MAJ article
        $modif = $crud->update($recuperation);

        if ($modif) {
            header("Location: ./?idarticle={$recuperation->getIdarticle()}");
        } else {
            $error = "Veuillez recommencer";
            // appel vue update
            require_once "View/formupdate.php";
        }
    }
}elseif (isset($_GET['delete'])&& ctype_digit($_GET['delete'])){
    $lid = (int) $_GET['delete'];
    
    $delete =$crud->deleteContenu($lid);
    
    if ($delete){
        header("Location: ./");
}   
    
}else{
    // lister tous les contenus
    $recupTous = $crud->listContenu();
    
    if (!$recupTous){
        $contenu = "pas encore d'article";
    }else {
        foreach ($recupTous as $value){
            $contenu[] = new contenuArticle($value);
        }
    }
    // appel vue index
    require_once "View/index.html.php";
}