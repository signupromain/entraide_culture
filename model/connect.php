<?php
try
{
    $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass,
        array (PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERROR : ".$e->getMessage();
}