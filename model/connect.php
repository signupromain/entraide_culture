<?php
require_once "../dbconfig.php";
try
{
    $PDO = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PWD);

    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERROR : ".$e->getMessage();
    echo "<br>";
    echo "N° " . $e->getCode();// code erreur
    die();// arrêt du script

}