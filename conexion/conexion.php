<?php
$dns='mysql:dbname=tienda;host=localhost';
$user='tienda';
$password='12345';
try{
    $pdo = new PDO($dns,
                   $user,
                   $password);
} catch(PDOException $e){
    echo 'Error al conectarnos: ' .$e->getMessage();
}
?>