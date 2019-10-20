<?php
    require_once('functions.php');
    index();

include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
            <div class="col-sm-6">
                <h2>Users</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-primary" href="new_user.php"><i class="fa fa-plus"></i> New User</a>
                <a class="btn btn-default" href="../logged_in.php"><i class="fa fa-reply"></i> Back</a>
            </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])){ ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php } ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
            <th>ID</th>
            <th width="30%">Name</th>
            <th width="30%">User Name</th>
            <th width="10%">Password</th>
            <th width="30%">Actions</th>
	</tr>
</thead>
<tbody>
<?php if ($users) { 
        foreach ($users as $user) { ?>
	<tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['user_login']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td class="actions text-left">
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-funcionario="<?php echo $user['id']; ?>">
                                    <i class="fa fa-trash"></i> Delete
                            </a>
                    </td>
            </tr>
<?php   }
    }else{?>
	<tr>
		<td colspan="6">Nothing to show.</td>
	</tr>
<?php   } ?>
</tbody>
</table>
<?php 

include('modal.php');
include(FOOTER_TEMPLATE);