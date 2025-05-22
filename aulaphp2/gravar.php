<?php
    session_start();
      if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
  }
    $emails = $_SESSION['emails'];
    $id = array_search($_SESSION['usuario'], $emails);
    $nomes = $_SESSION['nomes'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1">
        <meta http-equiv="content-language" content="pt-br">
        <title>PHP / Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
         body {
        background-color:rgb(162, 33, 253);
        color:rgb(0, 0, 0);
        }
        .user {
            float: right;
        }

        .btn-purple {
        background-color:rgb(255, 127, 227);
        color:#000000;
    }
    .btn-purple:hover {
        background-color:rgb(51, 255, 0);
        color:#000000;
    }

    </style>
    <body>
        <center><h1><b>PHP/ARRAY</b></h1></center>
        <hr/>
        <nav>
           &nbsp;&nbsp;<a href="inicial.php" style="color: white; text-decoration: none">HOME |</a><a href="listagem.php" style="color: white; text-decoration: none"> LISTAGEM |</a><a href="gravar.php" style="color: white; text-decoration: none"> SALVAR DADOS</a>
           <div class="user">
                <b style="color: white"><?php echo $nomes[$id]; ?> |</b> <a href="sair.php" style="color: white; text-decoration: none">SAIR</a>&nbsp;&nbsp;
           </div>
        </nav>
        <br/><br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 text-center">
            <div class="cols">
                <div class="card mb-2 rounded shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-hdd-fill" viewBox="0 0 16 16">
                        <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
                        </svg>&nbsp;&nbsp;<b>SALVAMENTO DE DADOS</b></h3>
                    </div>
                    <div class="card-body">
                        <?php
                         $porc = 0;
                         $dados = $_SESSION['nomes'];
                         $conteudo =json_encode($dados, JSON_PRETTY_PRINT);
                         file_put_contents("nome.json", $conteudo);

                         $porc = 25;
                         $dados = $_SESSION['emails'];
                         $conteudo =json_encode($dados, JSON_PRETTY_PRINT);
                         file_put_contents("email.json", $conteudo);
                         $porc = 50;
                         $dados = $_SESSION['generos'];
                         $conteudo =json_encode($dados, JSON_PRETTY_PRINT);
                         file_put_contents("genero.json", $conteudo);
                         $porc = 75;
                         $dados = $_SESSION['senhas'];
                         $conteudo =json_encode($dados, JSON_PRETTY_PRINT);
                         file_put_contents("senha.json", $conteudo);
                         $porc = 100;
                         echo "<div class='progress'>";
                         echo "<div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: $porc%'>$porc%</div>";
                         echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
