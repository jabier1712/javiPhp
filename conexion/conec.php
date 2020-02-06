<?php
    $servidor="localhost";
    $usuario="root";
    $clave="root";
    $base="bd_banca";

    $con=mysqli_connect($servidor,$usuario,$clave);
    mysqli_select_db($con, $base);
?>