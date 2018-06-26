<?php
# aaa028 create homepage view
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" media="screen" href="Asset/css/EC.css">
</head>
<body>
<header>
    <ul >
        <li class="menu_haut"><a href=""><img src="Asset/img/facebook.jpeg"> </a></li>
        <li class="menu_haut"><a href=""> Blog PDV  </a></li>
        <li class="menu_haut"><a href=""> Blog EDD  </a></li>
        <li class="menu_haut"><a href=""> Blog TIC  </a></li>
    </ul>
    <?php
    include "View/menu.View.php";
    ?>
</header>


<?php
# aaa071 include menu


# aaa054 if $listView is not a array
if (!is_array($listView)) {
    echo "<h2>$listView</h2>";
} else {
    # aaa055 $listView is a array
    foreach ($listView as $item) {

        # aaa056 list all articles
        ?>
        <h3><?= $item->getThetitle(); ?></h3>
        <p><?= substr($item->getThetext(),0,150); ?> ... <a href="?detail=<?= $item->getIdarticle(); ?>">Lire la suite</a></p>
        <p><?= $item->getThedate(); ?>
            Par <?php
            # aaa061
            echo "<a href='?user={$item->getIdutil()}'>{$item->getTheName()}</a>";
            ?></p>
        <hr>
        <?php
    }
}
include "View/menu.admin.view.php";
?>
</body>
</html>
