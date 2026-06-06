<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // ou outro usuário
define('DB_PASSWORD', '');     // sua senha MySQL
define('DB_NAME', 'skulljabb');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Não foi possível conectar. " . mysqli_connect_error());
}
?>
