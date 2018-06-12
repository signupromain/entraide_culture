
        <?php
        foreach ($menu as $m) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="?categ=<?=$m['idcateg']?>"><?=$m['name']?></a>
            </li>
            <?php
        }
        ?>


