<?php


require_once("seguranca.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $usuario = (isset($_POST['user_login'])) ? $_POST['user_login'] : '';
    $senha = (isset($_POST['password'])) ? $_POST['password'] : '';

    if (verifyUser($usuario, $senha) == true) {
        session_destroy();
        session_start();

        $login = $_POST['user_login'];
        $senha = $_POST['password'];
        
        $mysqli = new mysqli('localhost', 'root', '', 'hogarth');

        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        } else {
            $sql = ("SELECT * FROM user  WHERE user_login = '$login' AND password = '".base64_encode($senha)."'");
            $result = $mysqli->query($sql);
            $dados = $result->fetch_array();
        }
        if($result->num_rows > 0 ) {
            $_SESSION['user_login'] = $login;
            $_SESSION['password'] = $senha;
            $_SESSION['name'] = $dados['name'];
            $_SESSION['id_user'] = $dados['id'];
            header('location:logged_in.php');
        } else {
            unset ($_SESSION['user_login']);
            unset ($_SESSION['password']);
            expelVisitor();
            
        }
    } else {

        expelVisitor();
    }
}
