<?php
# aaa029
/**
 * Public controller
 */

# aaa050 ArticleManager
$ArticleM = new crud($pdo);
# aaa077 UtilManager
$UtilM = new UserManager($pdo);

# var_dump($ArticleM);


# aaa030 create routing login
if(isset($_GET['login'])) {

    # aaa073 form not submitted
    if(empty($_POST)){
        require_once "view/connect.view.php";
    }else{
        # aaa075
        $ident = new User($_POST);

        # aaa083 - verification
        $connect = $UtilM->identUser($ident);

        # aaa084
        if($connect){
            // if true
            header("Location: ./");
        }else{
            // if false
            $error = "Login et/ou mot de passe incorrect";
            require_once "view/connect.view.php";
        }
    }

# aaa062 create routing for single article
}elseif (isset($_GET['detail'])&&ctype_digit($_GET['detail'])){ // integer positive in a string (ctype_digit)

    $idArticle = (int) $_GET['detail'];

    # aaa064 recup one article
    $recup = $ArticleM->getContenuById($idArticle);

    if(!$recup){
        $oneView = "Article supprimé ou non existant";
    }else{
        $oneView = new contenuArticle($recup);
        //var_dump($item);
    }

    # aaa065 - require_once View/detail.view.php
    require_once "view/detail.view.php";


# aaa031 create routing homepage
}else {

    # aaa051 ArticleManager->listArticle()
    $recup = $ArticleM->listContenu();

    // if 1 or more article(s)
    if ($recup) {

        # aaa052 list and create table with object Article
        foreach ($recup as $item) {
            $listView[] = new contenuArticle($item);
        }
    } else { // if false
        $listView = "Il n'y a pas encore d'article.";
    }

    # aaa053 require_once View/index.view.php
    require_once "view/index.view.php";

}