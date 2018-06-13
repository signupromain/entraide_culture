<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de l'article</title>
</head>
<body>
<h1>Modification de l'article</h1>
<ul>
    <li><a href="./">Accueil - listContenu()</a></li>
    <li><a href="?insert">Insérer</a></li>
</ul>
<h2> Update</h2>
<?php if (isset($error)) echo "<h3>$error</h3>" ?>
<form method="post" name="nom" action="">
    <!-- les noms des champs correspondent à ceux de la classe Contenu et donc des champs de la DB (table contenu) -->
    <input type="hidden" name="idcontenu" value="<?=$recuperation->getIdarticle()?>"/>
    <input type="text" name="titre" placeholder="Titre" maxlength="100" required value="<?=$recuperation->getTitle()?>">
    <textarea placeholder="Votre texte" name="texte" required><?=$recuperation->getContent()?></textarea>
    <input type="datetime" name="ladate" value="<?=$recuperation->getPublicarion()?>" />
    <input type="submit" value="Modification"/>
</form>
</body>
</html>
