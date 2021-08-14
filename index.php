<?php
    if(isset($_GET["l"])){
        $link = $_GET['l'];
        
        include "database/conexao.inc";
        $query = "SELECT * FROM links WHERE linkGenerico = '$link'";
        $dados = mysqli_query($conexao, $query);
        
        while($elemento = mysqli_fetch_row($dados)){
            $original = $elemento[1];
        }

        header("Location: $original");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <title>Encurtador</title>
</head>
<body>
    
    <div class="logo">
        <h2>Leonardo Vasconcelos Paulino</h2>
        <h3>Encurtador de Links</h3>
    </div>
    
    <div class="principal">
        <h2>Insira o link que deseja encurtar</h2>
        <form action="controllers/insert.php" method="POST">
            <input type="text" name="link" class="link" placeholder="Ex: www.instagram.com/leovasc5" autocomplete="off"/>
            <input type="submit" value="Encurtar"/>
        </form>
        <?php
            session_start();
            if(isset($_SESSION['novo'])){
                ?>
                    <p>Seu último link criado: <a href="index.php?l=<?php echo $_SESSION['novo'];?>" target="_blank">index.php?l=<?php echo $_SESSION['novo'];?></a></p>
                <?php
            }
        ?>
    </div>

    <div class="table">
        <h3>Últimos links encurtados</h3>
        <table class="customers">
            <tr>
                <th>Link Original</th>
                <th>Link Encurtado</th>
            </tr>
            <?php
                include "models/select.php";
                $originais = getOriginais();
                $genericos = getGenericos();
                
                for($i=0; $i<sizeof($originais); $i++){
                    ?>
                    <tr>
                        <td onClick="window.open('<?php echo $originais[$i];?>');"><?php echo $originais[$i];?></td>
                        <td onClick="window.open('index.php?l=<?php echo $genericos[$i];?>');">index.php?l=<?php echo $genericos[$i];?></td>
                    </tr>
                    <?php
                    
                }
            ?>
        </table>
    </div>
</body>
</html>