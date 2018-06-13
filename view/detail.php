<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail d'un article</title>
</head>
<body>
<h1>Titre: <?php if(is_object($contenu)) echo $contenu->getTitle()?></h1>
<ul>
    <li><a href="./">Accueil - listContenu()</a></li>
    <li><a href="?insert">Insérer</a></li>
</ul>
<h2>ContenuManager->getContenuById($id) : Read</h2>
<?php

if (is_object($contenu)){
    echo "<h3>{$contenu->getTitle()}</h3>";
    echo "<p>{$contenu->getContent()}</p>";
    echo "<p>{$contenu->getPublication()}</p>";
    echo "<hr>";
}else {
    echo "<h2>$contenu</h2>";
}
?>
</body>
</html>
