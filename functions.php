<?php

// print_r(BASEURL);die;
require_once('config.php');
require_once(DBAPI);

$users = null;


$user = null;


function index() {
	global $users;     
	$users = find_all('user');
}


function new_user() {
  if (!empty($_POST['user'])) {

    $user = $_POST['user'];
    save_new('user', $user);
    $msg = 'User created';
    header('location: index.php');
  }
}


function edit_user() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['user'])) {
            $user = $_POST['user'];
            save_edit('user', $id, $user);
            header('location: index.php');
        } else {
            global $user;
            $user = find('user', $id);
        } 
    } else {
        header('location: index.php');
    }
}

function delete($id = null) {
    global $user;
    $user = remove('user', $id);
    header('location: index.php');
}
