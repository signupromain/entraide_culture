
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <script src="public/js/monJS.js"></script>
</head>
<body>
<h1>Accueil</h1>
<ul>
    <li><a href="./">Accueil - listContenu()</a></li>
    <li><a href="?insert">Insérer</a></li>
</ul>
<h2>ContenuManager->listContenu() : Read</h2>
<?php
// si le contenu est un tableau
if(is_array($contenu)){
    foreach ($contenu as $valeur){
        echo "<h3><a href='?idarticle={$valeur->getIdarticle()}'>{$valeur->getTitle()}</a> | <a href='?update={$valeur->getIdarticle()}'>modifier</a> | <a href='#' onclick='Delete({$valeur->getIdarticle()}); return false;'>supprimer</a></h3>";
        echo "<p>{$valeur->getContent()}</p>";
        echo "<p>{$valeur->getPublication()}</p>";
        echo "<hr>";
    }
}else{ // pas de messages
    echo "<h2>$contenu</h2>";
}
?>
</body>
</html>