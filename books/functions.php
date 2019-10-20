<?php

require_once('../config.php');
require_once(DBAPI);

$books = null;

# a book to be edit
$book = null;

# List of books
function index() {
	global $books;
        
    # array of books to list
	$books = find_all('book');
}

# Create user
function new_book() {
    
  if (!empty($_POST['book'])) {
      $book = $_POST['book'];
    
      save_new('book', $book);
    header('location: index.php');
  }
}

# Search data to update
function edit_book() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        if (isset($_POST['book'])) {
            $book = $_POST['book'];
            save_edit('book', $id, $book);
            header('location: index.php');
        } else {
            global $book;
            $book = find('book', $id);
        } 
    } else {
        header('location: index.php');
    }
}

function delete($id = null) {
    global $book;
    $book = remove('book', $id);
    header('location: index.php');
}
