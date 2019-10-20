<?php 
  require_once('functions.php'); 
  new_user();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>New User</h2>

<form id="adiciona_user" action="new_user.php" method="post" data-toggle="validator">
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