<?php 

  require_once "../scripts/validador_acesso.php";

?>

<?php 

  //chamados
  $chamados = array();

  $arquivo = fopen('../dados/arquivo.hd', 'r');

  //enquanto houver registros (linhas) a serem recuperados
  while(!feof($arquivo)) {

    $linha = fgets($arquivo);
    //lê o arquivo até o final da linha
    $chamados[] = $linha;
  }

  //remover o último item em branco
  $count = count($chamados);
  unset($chamados[$count-1]);


  fclose($arquivo);

?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="../scripts/logoff.php" class="nav-link">SAIR</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">

            <div class="card-consultar-chamado">
                <div class="card">
                    <div class="card-header">
                        Consulta de chamado
                    </div>

                    <div class="card-body">

                        <?php 
              
                foreach($chamados as $chamado) { 
                
                  $dados_chamado = explode('#', $chamado);

                  if ($_SESSION['perfil_id'] == 2 && $dados_chamado[0] != $_SESSION['id']) {
                    continue;
                    //verifica se esse chamado é do user logado, se não for, não mostra
                  }
                  
                  if(count($dados_chamado) < 3) {
                    continue;
                    //se a quantia de itens for menor que 3, não executa o script abaixo, apenas prossegue o foreach
                  }
              ?>


                        <div class="card mb-3 bg-light">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $dados_chamado[1]?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $dados_chamado[2]?></h6>
                                <p class="card-text"><?php echo $dados_chamado[3]?></p>

                            </div>
                        </div>

                        <?php }?>

                        <div class="row mt-5">
                            <div class="col-6">
                                <a class="btn btn-lg btn-warning btn-block" href="../pages/home.php">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>