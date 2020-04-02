<?php


$pdo = new PDO('mysql:host=localhost;dbname=covid', "kozaw", "yJo0e3~0");
$pdo->exec("SET NAMES UTF-8;");
$pdo->exec("SET character_set_results=UTF-8;");
$pdo->exec("SET character_set_client=UTF-8;");
$pdo->exec("SET character_set_connection=UTF-8;");
$pdo->exec("SET collation_connection=UTF-8;");
