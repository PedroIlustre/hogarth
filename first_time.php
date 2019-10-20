<?php

// namespace users;
require_once('functions.php');
require_once ('config.php');
new_user();
?>

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
      </div>
    </nav>

<main class="container">

<h2>New User</h2>

<form id="adiciona_user" action="first_time.php" method="post" data-toggle="validator">
  <!-- area de campos do form -->
  <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Name</label>
            <input type="text" class="form-control" maxlength="100" name="user['name']" required>
        </div>
        <div class="form-group col-md-7">
            <label for="name">Login</label>
            <input type="text" class="form-control" size='10' name="user['user_login']" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Password</label>
            <input type="password" class="form-control" id="psw" name="user['password']" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Confirm Password</label>
            <input type="password" class="form-control" id="psw2" name="user['password']" required>
        </div>
    </div>
    <div id="actions" class="row">
        <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="Save">
            <a href="index.php" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); 