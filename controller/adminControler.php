<?php
$ArticleM = new crud($pdo);
$UtilM = new UserManager($pdo);

# aaa087 deconnect
if(isset($_GET['deconnect'])) {
    $UtilM->deconnect();

# aaa095 create article
}elseif(isset($_GET['post'])) {

    # aaa096 form not submitted
    if (empty($_POST)) {
        # aaa097 - view form
        require "view/createArticleAdmin.view.php";
    } else {
        $newArticle = new contenuArticle($_POST);
        # aaa101 - insert into DB
        $succes = $ArticleM->create($newArticle);
        if ($succes) {
            header("Location: ./");
        } else {
            # aaa102 - view form with error
            $error = "Article non inséré, veuillez recommencer";
            require "view/createArticleAdmin.view.php";
        }
    }
# aaa109 update an article
}elseif(isset($_GET['update'])&&ctype_digit($_GET['update'])){

    $idarticle = (int) $_GET['update'];

    # aaa114 END

    # aaa110 get one article by idarticle
    $recup = $ArticleM->getContenuById($idarticle);
    if($recup) {
        $recup2 = new contenuArticle($recup);
    }

    # aaa111 view
    require_once "view/updateArticleAdmin.view.php";

# aaa089 homepage admin
}else{
    # aaa107
    $idutil = (int) $_SESSION['idutil'];
    $recup = $ArticleM->listArticleUser($idutil);
    if(!$recup){
        $affiche = "Vous n'avez pas encore écris d'articles";
    }else{
        foreach($recup AS $item){
            $affiche[]= new contenuArticle($item);
        }
    }
    # aaa091
    require_once "view/indexAdmin.view.php";
}