<?php
# aaa073 connect form
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
</head>
<body>
<h1>Se connecter</h1>
<?php
# aaa074 include menu
include "View/menu.view.php";
?>
<form name="form" action="" method="post">
    <input type="text" name="thelogin" maxlength="70" required placeholder="Votre login"><br>
    <input type="password" name="thepwd" placeholder="Votre mot de passe"  required><br>
    <?php
    # aaa085
    if(isset($error)) echo "<h3>$error</h3>";
    ?>
    <input type="submit" value="Se connecter"><br>

</form>
</body>
</html>
