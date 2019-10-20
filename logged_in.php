<?php 


require_once 'config.php'; 

include(HEADER_TEMPLATE); 
require_once DBAPI;

$db = open_database();

?>
<h2>Welcome <?=$_SESSION['name']?></h2>
<hr />

<?php if ($db) { ?>

<div class="row">

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="users" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Users</p>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="books" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Add a new book</p>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-xs-6 col-sm-3 col-md-2">
    <a href="return_book?id_user=<?= $_SESSION['id_user']?>" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-calendar fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Borrow/Return a Book</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?php }else { ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Cannot conect to database!</p>
    </div>

<?php } ?>

<?php include(FOOTER_TEMPLATE);