<?php

session_start();

$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com', 'senha' => '123', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'boss@teste.com', 'senha' => '123', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'jose@teste.com', 'senha' => '123', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'maria@teste.com', 'senha' => '123', 'perfil_id' => 2)
);

$user_atenticado = false;
$user_id = null;
$user_perfil = null;


$perfis = array(1 => 'adm', 2 => 'user');

//com foreach é mais fácil kkkk
for ($id=0; $id < count($usuarios_app); $id++) {
    
    if ($usuarios_app[$id]['email'] == $_POST['email'] && 
    ($usuarios_app[$id]['senha'] == $_POST['senha'])) {

        $user_atenticado = true;
        $user_id = $usuarios_app[$id]['id'];
        $user_perfil = $usuarios_app[$id]['perfil_id'];

        break;
    }

}

if ($user_atenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $user_id;
    $_SESSION['perfil_id'] = $user_perfil;
    header('Location: ../pages/home.php');
    }
else{
    $_SESSION['autenticado'] = 'NAO';
    header('Location: ../index.php?login=erro');
}
    

//MÉTODO GET
/*
    echo '<pre>';

    print_r($_GET);
    echo '<br>';

    echo $_GET['email'];
    echo '<br>';
    echo $_GET['senha'];
    
    echo '</pre>';
*/


//MÉTODO POST
/*
echo '<pre>';

print_r($_POST);
echo '<br>';

echo $_POST['email'];
echo '<br>';
echo $_POST['senha'];

echo '</pre>';
*/
?>