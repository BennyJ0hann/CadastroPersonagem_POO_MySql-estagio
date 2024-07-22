<?php
function connect($sql) {
    $servername = "localhost";
    $username = "root";
    $password = "fV?L_`Uq!722£hp*MQ<~~~cP";
    $dbname = "db_SystemCharacters";

    $conexao = new mysqli($servername, $username, $password, $dbname);

    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }

    $result = $conexao->query($sql);

    $conexao->close();

    return $result;
}
?>
