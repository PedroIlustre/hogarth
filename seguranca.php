<?php

$_SG['conectServ'] = true;    
$_SG['abreSessao'] = true;         
$_SG['caseSensitive'] = false;     
$_SG['validaSempre'] = true;      
$_SG['server'] = 'localhost';    
$_SG['usuario'] = 'root';          
$_SG['senha'] = '';                
$_SG['banco'] = 'hogarth';            
$_SG['paginaLogin'] = 'index.php'; 
$_SG['tabela'] = 'user';       



if ($_SG['conectServ'] == true) {
    try{
        $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Cannot conect to server [".$_SG['server']."].");
        mysqli_select_db($_SG['link'],$_SG['banco']) or die("MySQL: Cannot conect to data base [".$_SG['banco']."].");
    } catch (Exception $e){
        print_r($e);
        die;
    }
}

if ($_SG['abreSessao'] == true)
  session_start();

function verifyUser($usuario, $senha) {
  global $_SG;
  $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

  $nusuario = addslashes($usuario);
  $nsenha = addslashes($senha);

  $sql = "SELECT `id`, `name` FROM `".$_SG['tabela']."` WHERE ".$cS." `user_login` = '".$nusuario."' AND ".$cS." `password` = '".base64_encode($nsenha)."' LIMIT 1";
  $query = mysqli_query($_SG['link'], $sql);
 
  $result = mysqli_fetch_assoc($query);
  

  if (empty($result)) {

    return false;
  } else {

      $_SESSION['usuarioID'] = $result['id'];
      $_SESSION['usuarioNome'] = $result['name'];

    if ($_SG['validaSempre'] == true) {

      $_SESSION['usuarioLogin'] = $usuario;
      $_SESSION['usuarioSenha'] = $senha;
    }
    return true;
  }
}


function protecedPage() {
  global $_SG;
  if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {

      expelVisitor();
  } else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {

    if ($_SG['validaSempre'] == true) {

      if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {

          expelVisitor();
      }
    }
  }
}

function expelVisitor() {
  global $_SG;

  unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
  header("Location: ".$_SG['paginaLogin'].'?msg=0');
}