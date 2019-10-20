<?php 
  require_once('functions.php'); 
  if (isset($_GET['id'])){
    delete($_GET['id']);
  } else {
    die("ERROR: ID not defined.");
  }
?>