<?php
# aaa068 menu

?>
<ul>
    <li><a href="./">Accueil</a></li>
    <?php
    # aaa090 admin mode
    if (isset($_SESSION['monid']) && $_SESSION['monid'] == session_id()) {
        # aaa093 Create article
        ?>
        <li><a href="?post">Ajouter un article</a></li>
        <li><a href="?deconnect">Déconnexion</a></li>
        <?php
    }else{
        #aaa072 public mode
        ?>
    <li><a href="?login">Connexion</a></li>
    <?php
    }
    ?>
</ul>