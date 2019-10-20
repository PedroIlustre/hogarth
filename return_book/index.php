<?php
    require_once('functions.php');
    index();
    
    function convert_date_from_db($date){
        $arr_date = explode('-',$date);
        return $arr_date[2].'/'.$arr_date[1].'/'.$arr_date[0];
    }
    
include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
            <div class="col-sm-6">
                <h2>Books borrowed</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-primary" href="new_book.php?id_user=<?= $_SESSION['id_user']?>"><i class="fa fa-plus"></i> Borrow a book</a>
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
            <th width="40%">Book</th>
            <th width="20%">Date Borrowed</th>
            <th width="20%">Date Return</th>
            <th width="30%">Action</th>
	</tr>
</thead>
<tbody>
<?php 
if ($books_borrowed) {

    foreach ($books_borrowed as $bb) { ?>
	<tr>
        <td><?php echo $bb['id']; ?></td>
        <td><?php echo $bb['book']; ?></td>
        <td><?php echo convert_date_from_db($bb['data_pick_up']); ?></td>
        <td><?php echo $bb['date_return'] == '0000-00-00'?'':convert_date_from_db($bb['date_return']); ?></td>
        <td class="actions text-left">
        <?php if($bb['date_return'] == '0000-00-00') {?>
                <a href="return_book.php?id=<?php echo $bb['id']; ?>" class="btn btn-sm btn-success"><i class=""></i> Return</a>
                <?php }?>
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