<?php 

    session_start();

    //separação do texto recebido e remoção dos #
    $title = str_replace('#', '-', $_POST['title']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    
    $arquivo = fopen('../dados/arquivo.hd', 'a');

    $text = $_SESSION['id'] . '#' . $title . '#' . $categoria . '#' . $descricao . PHP_EOL;
    //PHP_EOL identifica o SO usado e define final de linha de acordo com o SO

    fwrite($arquivo, $text);

    fclose($arquivo);

    header('Location: ../pages/abrir_chamado.php');

?>