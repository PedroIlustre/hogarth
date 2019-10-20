<?php

require_once 'config.php'; 
require_once DBAPI;
include(HEADER_TEMPLATE_INDEX);  


if(isset($_GET['msg']) && $_GET['msg'] == 0){
    echo '<br> <b style="color:red">Invalid User / Wrong password</b>';
}
?>

<br> <br>
<?= !empty($msg)?$msg:'';?>
<form method="post" action="validate.php">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="campo2">User</label>
            <input type="text" name="user_login" maxlength="50" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Password</label>
            <input type="password" name="password" maxlength="50" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <input type="submit" value="Enter" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <a href="first_time.php">Sign-in</a>
        </div>
    </div>
</form>
<?php global $msg; ?>