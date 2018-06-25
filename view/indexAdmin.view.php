<?php
# aaa090 create homepage view
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Accueil</title>
    <!-- # aaa127 import JS -->
    <script src="Asset/js/myJs.min.js"></script>
</head>
<body>
<h1>Admin - Accueil</h1>
<?php
# aaa092 include menu
include "View/menu.view.php";
?>
<h2>Bienvenue <?=$_SESSION['thename']?></h2>
<?php
# aaa108
if(!is_array($affiche)){
    echo "<h3>$affiche</h3>";
}else{
    foreach ($affiche AS $item) {
        ?>
<h3><?= $item->getThetitle(); ?></h3>
<p><a href="?update=<?=$item->getIdarticle()?>"><img src="Asset/img/update.png" title="update" alt="update"></a>
    <!-- # aaa127 function js Delete() -->
    <img src="Asset/img/delete.png" title="delete" alt="delete" onclick="Delete(<?=$item->getIdarticle()?>);">
</p>
<p><?= substr($item->getThetext(),0,150); ?> ...</p>
        <p><?= $item->getThedate(); ?></p><hr>
        <?php
    }
}
?>
</body>
</html>
