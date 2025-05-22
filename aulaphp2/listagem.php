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
        <center>

        </center>
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
                         <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>E-MAIL</th>
                            <th>GÊNERO</th>
                            <th>AÇÕES</th>
                        </tr>
                        <?php for ($i=0; $i < count($_SESSION['nomes']); $i++) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= htmlspecialchars($_SESSION['nomes'][$i]); ?></td>
                            <td><?= htmlspecialchars($_SESSION['emails'][$i]); ?></td>
                            <td><?= htmlspecialchars($_SESSION['generos'][$i]); ?></td>
                            <td><svg type="button"  onclick="atualizarformulario('<?= $i ?>','<?= htmlspecialchars($_SESSION['emails'][$i]); ?>','<?= htmlspecialchars($_SESSION['nomes'][$i]); ?>','<?= htmlspecialchars($_SESSION['generos'][$i]); ?>','<?= htmlspecialchars($_SESSION['senhas'][$i]); ?>');" data-bs-toggle="modal" data-bs-target="#exampleModal" xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-pen-fill" viewBox="0 1 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                            </svg> 
                            <a href="excluir.php?pos=<?= $i ?>">|<svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 1 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg></a></td><?php } ?>
                        </tr>
                    </table>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal EDITAR-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">EDITAR USUARIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="form" class="modal-body text-start">
                     <form id="form_edit" action="cadastro.php" method="post">
                        <label class="form-label">E-MAIL</label>
                        <input class="form-control" id="email" type="email" name="email" required autofocus placeholder="Digite o seu e-mail">
                        <br>
                        <label class="form-label">NOME</label>
                        <input class="form-control" type="text" id="nome" name="nome" required  placeholder="Digite o seu nome">
                        <br>
                        <label class="form-label">GÊNERO</label>
                        <select class="form-select" id="floatingSelect" aria-label="Selecione um gênero" name="genero" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                        <br>
                        <label class="form-label">SENHA</label>
                        <input class="form-control" id="senha" type="password" name="senha" required  placeholder="**********">
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

<script language="javascript" type="text/javascript">
    const url = "editar.php?id=";
    const email = document.getElementById("email");
    const nome = document.getElementById("nome");
    const genero = document.getElementById("floatingSelect");
    const form = document.getElementById("form_edit");
    const senha = document.getElementById("senha");

    function atualizarformulario(id, vemail, vnome, vgenero, vsenha) {
        email.value = vemail;
        nome.value = vnome;
        genero.value = vgenero;
        form.action = url+id;
        senha.value = vsenha;
    }


</script>
