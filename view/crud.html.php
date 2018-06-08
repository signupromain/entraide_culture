<?php 
  session_start();
if (isset($_SESSION['login']))
{
    echo '';
}else{
    header('location:login.php');
}
?> 
<!DOCTYPE html>
<html>
<head>
    <title>admin /// home</title>
    <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
    <p>
        <a href="logout.php" class="btn btn-danger">Deconnexion</a>
    </p>
    <?php
    include "v/menu.php";
    ?>
    <form method="post">
        <table>
            <tr>
                <td><input type="text" name="uname" placeholder="Titre" value="<?php if(isset($_GET['edit_id'])){ print($editRow['titre']); } ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="umail" placeholder="Contenu" value="<?php if(isset($_GET['edit_id'])){ print($editRow['contenu']); } ?>" /></td>
            </tr>
            <tr>
                <td>
                    <?php
                    if(isset($_GET['edit_id']))
                    {
                        ?>
                        <button type="submit" name="update">Update</button>
                        <?php
                    }
                    else
                    {
                        ?>
                        <button type="submit" name="save">Add Record</button>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
    <br />
    <table>
        <tr>
            <th>titre</th>
            <th>contenu</th>
            <th colspan="2">Edit options</th>
        </tr>
        <?php
        if($stmt->rowCount() > 0)
        {
            while($row=$stmt->FETCH(PDO::FETCH_ASSOC))
            {
                ?>
                <tr>
                    <td><?php print($row['titre']); ?></td>
                    <td><?php print($row['contenu']); ?></td>
                    <td><a href="index.php?edit_id=<?php print($row['id']); ?>">EDIT</a></td>
                    <td><a href="index.php?delete_id=<?php print($row['id']); ?>">DELETE</a></td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="3"><?php print("nothing here...");  ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>