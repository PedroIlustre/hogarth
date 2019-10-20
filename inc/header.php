<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>User control</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo BASEURL; ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/jquery.maskedinput.js"></script>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?=BASEURL?>index.php" class="navbar-brand">USER CONTROL AND LIBRARY MANAGEMNT</a>
        </div>
        <div class="navbar">
            <br> <a href="<?= BASEURL?>" onclick="<?php session_destroy();?>" class="fa fa-power-off" style="color: #FFF !important;float:right; font-size:20px" > Log out </a>
        </div>
          <?php 
            session_start(); 

            if((!isset ($_SESSION['user_login']) == true) and (!isset ($_SESSION['password']) == true)) {
               unset($_SESSION['user_login']);
               unset($_SESSION['password']);
               header('location:index.php');
            }

            $logado = $_SESSION['user_login'];?>
        <!--<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    FuncionÃ¡rios <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>funcionarios">Gerenciar FuncionÃ¡rios</a></li>
                    <li><a href="<?php echo BASEURL; ?>funcionarios/novo.php">Novo FuncionÃ¡rio</a></li>
                </ul>
            </li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

<main class="container">
<br> <br>