<?php
    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    include "../database/conexao.inc";
    $generico = rand(1, 100000);
    $query = "INSERT INTO links VALUES(NULL, '$link', '$generico')";
    $res = mysqli_query($conexao, $query);

    session_start();
    $_SESSION["novo"] = $generico;
    mysqli_close($conexao);
    header("Location: ../index.php");
?>