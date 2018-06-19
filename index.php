<?php
require_once "dbconfig.php";

session_start();


try{
    $pdo = new PDO(DB_TYPE. ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PWD);

    if (DB_MODE=="dev"){
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    if (DB_PERSIST){
        $pdo->setAttribute(PDO::ATTR_PERSISTENT);
    }

}catch (PDOException $error){

    echo "Erreur: " . $error->getMessage();
    echo "<br>";
    echo "N° " . $error->getCode();// code erreur
    die();// arrêt du script
}


// auto load model

spl_autoload_register(function ($nom_class){
    require_once "model/$nom_class.php";
});

if (isset($_SESSION['monid']) && $_SESSION['monid'] == session_id()) {

    require_once "Controller/adminControler.php";


} else {

    require_once "Controller/publicControler.php";
}