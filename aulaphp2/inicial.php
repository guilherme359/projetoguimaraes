<?php
    session_start();
    if (!isset($_SESSION['nomes'])) {
    
    $emails = json_decode(file_get_contents("email.json"), true);
    $senhas = json_decode(file_get_contents("senha.json"), true);
    $nomes = json_decode(file_get_contents("nome.json"), true);
    $generos = json_decode(file_get_contents("genero.json"), true);
    $id = array_search($_SESSION['usuario'], $emails);
    $_SESSION['nomes'] = $nomes;
    $_SESSION['emails'] = $emails;
    $_SESSION['generos'] = $generos;
    $_SESSION['senhas'] = $senhas;
}else {
     $nomes = $_SESSION['nomes'];
    $emails = $_SESSION['emails'];
    $id = array_search($_SESSION['usuario'], $emails);
}

    
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--ajuda o navegador a entender que a linguagem do site é pt-br-->
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
    .card-header {
            color:rgb(0, 72, 105);
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

    .cssbuttons-io-button {
  display: flex;
  align-items: center;
  font-family: inherit;
  cursor: pointer;
  font-weight: 500;
  font-size: 16px;
  padding: 0.7em 1.4em 0.7em 1.1em;
  color: white;
  background: #ad5389;
  background: linear-gradient(
    0deg,
    rgb(0, 44, 240) 0%,
    rgb(207, 0, 226) 100%
  );
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  letter-spacing: 0.05em;
  border-radius: 20em;
}

.cssbuttons-io-button svg {
  margin-right: 6px;
}

.cssbuttons-io-button:hover {
  box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
}

.cssbuttons-io-button:active {
  box-shadow: 0 0.3em 1em -0.5em #14a73e98;
}



</style>
<body>
    <center><h2><b>PHP/ARRAY</b></h2></center>
    <hr/>
    <nav>
        &nbsp;&nbsp;
        <a href="inicial.php" style="color:aliceblue; text-decoration: none"> HOME  | </a>
        <a href="listagem.php" style="color:aliceblue; text-decoration: none"> LISTAGEM  | </a>
        <a href="gravar.php" style="color:aliceblue; text-decoration: none"> SALVAR DADOS</a>
        <div class="user">  
            <?php echo $nomes[$id]?>  | <a href="sair.php"  style="color:aliceblue; text-decoration: none">SAIR</a>&nbsp;&nbsp;&nbsp;
        </div>
    </nav>
    <br></br>
   
 
    <center><button class="cssbuttons-io-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <svg
    height="24"
    width="24"
    viewBox="0 0 24 24"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path d="M0 0h24v24H0z" fill="none"></path>
    <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="currentColor"></path>
  </svg>
  <span>CADASTRAR NOVO USUARIO</span>
</button></center>
    <br><br/>
    <div class="row justify-content-center row-cols-2 row-cols-md-3 text-center">
        <div class="cols">
            <div class="card mb-4 rounded shadow-sw">
                <div class="card-header py-3">
                    <strong><h3><svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 1 16 16">
                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11"/>
                    </svg>&nbsp;USUARIOS</h3></strong>
                </div>
                <div class="card-body">
                    <?php
                        include "usuarios.php";                    
                    ?>

                    </form>
                </div>
            </div>
        </div>
        
        <div class="cols">
            <div class="card mb-4 rounded shadow-sw">
                <div class="card-header py-3">
                    <strong><h3><svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" fill="#FF1493" class="bi bi-gender-female" viewBox="0 1 16 16">
  <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8M3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5"/>
</svg>&nbsp; GENEROS &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" fill="blue" class="bi bi-gender-male" viewBox="0 1 16 16">
  <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8"/>
</svg></h3></strong>
                </div>
                <div class="card-body">
                    <?php
                     include"generos.php";
                    ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CADASTRAR USUARIO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form action="cadastro.php" method="post">
            <label class="form-label">E-MAIL</label>
            <input class="form-control" type="email" name="email" required placeholder="digite o seu e-mail"/>
            <br>
            <label class="form-label">NOME</label>
            <input class="form-control" type="text" name="nome" required placeholder="digite o seu nome"/>
            <br>
             <label class="form-label">GENERO</label>
            <select class="form-select" aria-label="Selecione seu genero" name="genero" required>
            <option selected>Selecione seu genero</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outros">Outros</option>
            </select>
            <br>
             <label class="form-label">SENHA</label>
            <input class="form-control" type="password" name="senha" required placeholder="digite o sua senha"/>
            <br>
            <input type="submit" class="btn btn-purple" value="CADASTRAR">
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
      </div>
    </div>
  </div> 
</div>

</body>
</html>