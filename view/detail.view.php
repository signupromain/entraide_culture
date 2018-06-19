<?php
# aaa066 create detail view

if(is_string($oneView)){

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Article: <?= $oneView ?></title>
</head>
<body>
<h1>Article: <?= $oneView ?></h1>

<?php
    # aaa069 include menu
    include "view/menu.view.php";
}else{

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Article: <?= $oneView->getTitle() ?></title>
</head>
<body>
<h1>Article: <?= $oneView->getTitle() ?></h1>

<?php
# aaa070 include menu
include "view/menu.view.php";

# aaa067 $oneView is an object "Article"
?>
        <h3><?= $oneView->getTitle(); ?></h3>
        <p><?= $oneView->getContent() ?></p>
        <p><?= $oneView->getPublication(); ?>
            Par <?php
            echo "<a href='?user={$oneView->getIduser()}'>{$oneView->getName()}</a>";
            ?></p>
        <hr>
        <?php
        }
?>
</body>
</html>
