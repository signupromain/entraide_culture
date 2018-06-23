<?php
# aaa097 - create Article view form
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ajouter un article</title>

</head>
<body>
<h1>Admin - Ajouter un article</h1>
<?php
include "view/menu.view.php";
?>
<h2>Bienvenue <?=$_SESSION['name']?></h2>
<?php
# aaa102 if create error
if(isset($error)) echo "<h3>$error</h3>";
?>
<form action="" name="oneName" method="post">
    <input type="text" name="Title" placeholder="Le titre" required><br>
    <textarea name="Content" placeholder="Votre texte" required></textarea><br>
    <input type="hidden" name="utilIdutil" value="<?=$_SESSION['iduser']?>">
    <!-- # aaa098 before choosing a datetime picker -->
    <input type="text" name="Publication" value="<?=date("Y-m-d H:i:s")?>"><br>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>
