<?php
    function getOriginais(){
        include "database/conexao.inc";
        $query = "SELECT * FROM links LIMIT 10";
        $dados = mysqli_query($conexao, $query);
        
        $originais=[];
        
        while($elemento = mysqli_fetch_row($dados)){
            array_push($originais, $elemento[1]);
        }
        
        mysqli_close($conexao);
        return $originais;
    }

    function getGenericos(){
        include "database/conexao.inc";
        $query = "SELECT * FROM links LIMIT 10";
        $dados = mysqli_query($conexao, $query);
        
        $genericos=[];
        
        while($elemento = mysqli_fetch_row($dados)){
            array_push($genericos, $elemento[2]);
        }
        
        mysqli_close($conexao);
        return $genericos;
    }

?>