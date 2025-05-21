<?php
    session_start();
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



        .delete-button {
  position: relative;
  padding: 0.5em;
  border: none;
  background: transparent;
  cursor: pointer;
  font-size: 1em;
  transition: transform 0.2s ease;
}

.trash-svg {
  width: 4em;
  height: 4em;
  transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
  filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
  overflow: visible;
}

#lid-group {
  transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.delete-button:hover #lid-group {
  transform: rotate(-28deg) translateY(2px);
}

.delete-button:active #lid-group {
  transform: rotate(-12deg) scale(0.98);
}

.delete-button:hover .trash-svg {
  transform: scale(1.08) rotate(3deg);
}

.delete-button:active .trash-svg {
  transform: scale(0.96) rotate(-1deg);
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
        <center>PESQUISA</center>
        <br/><br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 text-center">
            <div class="cols">
                <div class="card mb-2 rounded shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="blue" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>&nbsp;<b>LISTAGEM DE USUÁRIOS</b></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>E-MAIL</th>
                                <th>GENERO</th>
                                <th>AÇÕES</th>
                            </tr>
                            <?php
                                $reg = count($_SESSION['nomes']);
                                for ($i=0; $i <= $reg-1 ; $i++) { 
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>".$_SESSION['nomes'][$i]."</td>";
                                        echo "<td>".$_SESSION['emails'][$i]."</td>";
                                        echo "<td>".$_SESSION['generos'][$i]."</td>";
                                        echo "<td><svg data-bs-toggle='modal' data-bs-target='#exampleModal' xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='blue' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                            onclick = 'atualizardados()'</svg> |
                                             <a href='excluir.php?pos=$i'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='red' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                            </svg></a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR USUARIO</h5>
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
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
      </div>
    </div>
  </div> 
</div>
    </body>
</html>

<script language='javascript' type='text/javascript'>
    function atualizardados(gemail, gsenha, gnome, ggenero) {
        let email = document.getElementByID("email")
        let senha = document.getElementByID("senha")
        let nome = document.getElementByID("nome")
        let genero = document.getElementByID("genero")
        let buttongm = document.getElementByID("buttonhj")
        email.value = gemail
        senha.value = gsenha
        nome.value = gnome
        genero.value = ggenero

    }
</scnome
