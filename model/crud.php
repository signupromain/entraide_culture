<?php
/**
 * Created by PhpStorm.
 * User: kevin.kinanga
 * Date: 13/06/2018
 * Time: 12:20
 */

class crud
{
    private $connexion;

    // constructeur qui récupère la connexion à la DB
    public function __construct(PDO $db)
    {
        $this->connexion = $db;
    }

    /*
     * CRUD - Read
     */

    public function listContenu(){
        $recupList = $this->connexion->query("SELECT a.*,u.iduser,u.login,u.name FROM article a INNER JOIN user u ON a.user_iduser = u.iduser ORDER BY publication DESC;");

        // si on a un resultat

        if ($recupList->rowCount()){
            return $recupList->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return false;
        }
    }

    public function getContenuById(int $id){
        $recup = $this->connexion->prepare("SELECT a.*,u.iduser,u.login,u.name FROM article a INNER JOIN user u ON a.user_iduser = u.iduser WHERE a.idarticle=?");

        $recup->bindValue(1,$id,PDO::PARAM_INT);

        $recup->execute();

        if ($recup->rowCount()){
            return $recup->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public function listArticleUser(int $iduser){

        $get = $this->connexion->query("SELECT a.*,
          u.iduser,u.login,u.name 
          FROM article a INNER JOIN user u 
            ON a.user_Iduser = u.iduser
          WHERE u.iduser = $iduser
          ORDER BY a.publication DESC;");

        # aaa104 => one or more result
        if($get->rowCount()){

            # aaa105 - return array assoc's in array index
            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{
            # aaa106 => no result => return false
            return false;
        }
    }

    /*
     * CREATE
     */
    public function  create(contenuArticle $datas)
    {
        if ($datas->getUserIduser() == $_SESSION['iduser']) {
            $create = $this->connexion->prepare("INSERT INTO article (title,content,publication,user_iduser) VALUES (?,?,?,?)");


            $create->bindValue(1, $datas->getTitle(), PDO::PARAM_STR);
            $create->bindValue(2, $datas->getContent(), PDO::PARAM_STR);
            $create->bindValue(3, $datas->getPublication(),PDO::PARAM_STR);
            $create->bindValue(4, $datas->getUserIduser(), PDO::PARAM_INT);

            $create->execute();

            if ($create->rowCount()) {
                return true;
            } else {
                return false;
            }
        }
    }

        /*
         * Update
         */
        public function update (contenuArticle $datas){
         $create = $this->connexion->prepare("UPDATE article SET title = :title, content = :txt, publication = :temps WHERE idarticle = :id");

         $create ->bindValue(":id",$datas->getIdarticle(),PDO::PARAM_INT);
         $create ->bindValue(":title",$datas->getTitle(),PDO::PARAM_STR);
         $create ->bindValue(":txt",$datas->getContent(),PDO::PARAM_STR);
         $create ->bindValue(":temps",$datas->getPublication(),PDO::PARAM_STR);

         $create->execute();

         if ($create->rowCount()){
             return true;
         }else{
             return false;
         }
        }
        /*
         * Delete
         */
        public  function deleteContenu(int $id){
            $delete = $this->connexion->prepare("DELETE FROM article WHERE idarticle=?");

            $delete->bindValue(1,$id,PDO::PARAM_INT);
            $delete->execute();

            return ($delete->rowCount())? true:false;
        }
    }
