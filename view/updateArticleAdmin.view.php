<?php
# aaa112 - update Article view form
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Modifier un article</title>

</head>
<body>
<h1>Admin - Modifier un article</h1>
<?php
include "View/menu.view.php";
?>
<h2>Bienvenue <?=$_SESSION['thename']?></h2>
<?php
# aaa113 article doesn't exist
if(!$recup){
    echo "<h3>Cet article n'existe plus</h3>";
}else {
    ?>
    <form action="" name="oneName2" method="post">
        <input type="text" name="thetitle" placeholder="Le titre" required value="<?=$recup2->getThetitle()?>"><br>
        <textarea name="thetext" placeholder="Votre texte" required><?=$recup2->getThetext()?></textarea><br>
        <!-- # aaa117 idarticle -->
        <input type="hidden" name="idarticle" value="<?=$recup2->getIdarticle()?>">
        <input type="hidden" name="utilIdutil" value="<?=$recup2->getUtilIdutil()?>">
        <!-- # aaa114 before choosing a datetime picker -->
        <input type="text" name="thedate" value="<?= $recup2->getThedate() ?>"><br>
        <input type="submit" value="Envoyer">
    </form>
    <?php
}
?>
</body>
</html>
