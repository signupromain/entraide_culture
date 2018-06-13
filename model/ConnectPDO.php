<?php
/**
 * Created by PhpStorm.
 * User: kevin.kinanga
 * Date: 13/06/2018
 * Time: 11:48
 */

class ConnectPDO
{
 private $connect;

    /**
     * ConnectPDO constructor.
     */
    public function __construct($type,$host,$name,$port,$login,$pwd,$charset="utf8",$mode='dev',$persist=false)
    {
        try{
            $this->connect = new PDO($type. ":host=" . $host . ";dbname=" . $name . ";port=" . $port . ";charset=" . $charset, $login, $pwd);

            if ($mode=="dev"){
                $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            if ($persist){
                $this->connect->setAttribute(PDO::ATTR_PERSISTENT);
            }
            return $this->getConnect();
        }catch (PDOException $error){

            echo "Erreur: " . $error->getMessage();
            echo "<br>";
            echo "N° " . $error->getCode();// code erreur
            die();// arrêt du script
        }
    }
    public function getConnect(){
        return $this->connect;
    }

}