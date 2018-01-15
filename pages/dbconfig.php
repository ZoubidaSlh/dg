<?php
$db_host = "127.0.0.1";
$db_name = "mundia_demande";
$db_user = "zo";
$db_pass = "zz";

try{
    $bdd = new PDO("mysql:host={$db_host};charset=utf8;dbname={$db_name}",$db_user,$db_pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
