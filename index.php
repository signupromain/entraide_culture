<?php
require_once "dbconfig.php";

require_once "model/connect.php";


if (empty($_GET)){
   require_once "view/accueil.html.php";
}elseif (isset($_GET['article'])){
    require_once "controller/articleControler.php";
}elseif (isset($_GET['admin'])){
    require_once "controller/adminControler.php";
}else{
    require_once "view/accueil.html.php";
}
