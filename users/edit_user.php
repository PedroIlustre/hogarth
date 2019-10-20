<?php 
  require_once('functions.php'); 
  edit_user();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Update User</h2>

<form action="edit_user.php?id=<?php echo $user['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="user['name']" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="name">Login</label>
            <input type="text" class="form-control" name="user['user_login']" value="<?php echo $user['user_login']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Password</label>
            <input type="text" class="form-control" name="user['password']" value="<?php echo base64_decode($user['password']); ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Confirm Password</label>
            <input type="text" class="form-control" name="user['password']" value="<?php echo base64_decode($user['password']); ?>">
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