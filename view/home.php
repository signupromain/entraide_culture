<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<h1>Connexion</h1>
<?php
include "menu.php";
?>
<form action="" name="connect" method="post">
    <?php
    if(isset($affiche)) echo "<h3 style='color: #ff0000;'>$affiche</h3>";
    ?>
    <input type="text" name="lelogin" placeholder="votre login" required>
    <input type="password" name="lepwd" placeholder="votre mdp" required>
    <input type="submit" value="connexion">
</form>
<h2>admin</h2>
<h3>Login : admin</h3>
<h3>PWD : admin</h3>
<h2>modo</h2>
<h3>Login : modo</h3>
<h3>PWD : modo3</h3>
<h2>util1</h2>
<h3>Login : Pierre</h3>
<h3>PWD : Pierre</h3>
<h2>util2</h2>
<h3>Login : Joseph</h3>
<h3>PWD : lulu</h3>
<?php
?>
</body>
</html>