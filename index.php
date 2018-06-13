<?php
require_once "dbconfig.php";

// auto load model

spl_autoload_register(function ($nom_class){
    require_once "model/$nom_class.php";
});

require_once "controller/publicControler.php";