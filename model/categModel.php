<?php
function listCateg ($PDO){
    $sql ="SELECT idcateg,name FROM categ ORDER BY idcateg ASC";
    $recup =$PDO->query($PDO,$sql);
    if ($recup->rowcount()){
        return $recup->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}

?>