<?php

    include_once('Mysqldump.php');


    $sql = mysqli_connect('localhost', 'root', '', '');
    if(!$sql){
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
    }
    $sqlSource = file_get_contents('todo.sql');

    mysqli_multi_query($sql,$sqlSource);

    ?>