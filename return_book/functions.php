<?php

require_once('../config.php');
require_once(DBAPI);

$books_borrowed = null;


$borrowed = null;


function index() {
	global $books_borrowed;
        
	$books_borrowed = find_all('action');
	if($books_borrowed){ 
    	foreach($books_borrowed as $k => $bb){
    	    $books_borrowed[$k]['book'] = find_by_id('book',$bb['id_book'])['name'];
    	} 
	}
}

function index_books_avaliable() {
    global $books_avaliable;
    global $msg;
    
    $books_on_library = find_all('book');
    $books_borrowed = find_all('action');
    
    $array_id_books_borrowed = array();
    if($books_borrowed){
        foreach($books_borrowed as $k => $bb){
            if($bb['date_return'] != '0000-00-00'){
                $array_id_books_borrowed[] = $bb['id_book'];                
            }
        }
    } 
    $array_id_books_borrowed = array_count_values($array_id_books_borrowed);
    
    foreach($books_on_library as $k => $book){        
        if(in_array($book['id'],array_keys($array_id_books_borrowed))){
            if($array_id_books_borrowed[$book['id']] != $book['id']){
                $books_avaliable[] = $book;
            }else{
                if($books_on_library[$k]['quantity'] > $array_id_books_borrowed[$book['id']]){
                    $books_avaliable[] = $book;
                } else {
                    $msg[] = 'The Book '.$books_on_library[$k]['name'].' is Borrowed yet';
                }
            }
        }
    }
}

# Create user
function new_book() {
    
  if (!empty($_POST['book'])) {
      $borrowed = $_POST['book'];
    
      save_new('book', $borrowed);
    header('location: index.php');
  }
}

# Search data to update
function return_book($id_borrowed) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        if (isset($id_borrowed)) {
            $borrowed['date_return'] = date('Y-m-d');
            save_edit('action', $id_borrowed, $borrowed);
            header('location: index.php');
        } else {
            global $book;
            $borrowed = find('book', $id);
        } 
    } else {
        header('location: index.php');
    }
}

function borrow_book($id_book, $id_user) { 
    if (!empty($id_book)) {
        $borrowed['id_book'] = $id_book;
        $borrowed['data_pick_up'] = date('Y-m-d');
        $borrowed['id_user'] = $id_user;
        
        save_new('action', $borrowed);
        header('location: index.php');
    }
}

function delete($id = null) {
    global $borrowed;
    $borrowed = remove('book', $id);
    header('location: index.php');
}
