<?php 
  require_once('functions.php'); 
  index_books_avaliable();

?>
<script>

function showBtn(elem){
	if(elem.value == ''){
		$('#btnBorrow').hide();
	} else {
		$('#hdnIdBook').val(elem.value);
		$('#btnBorrow').show();
	}
	
}

</script>
<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
            <div class="col-sm-6">
            <br>
                <h2>Books for borrow</h2>
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


	<tr>
                    <td>
                    <select id="selBook" onchange="showBtn(this)">
                    <option value="">Select a Book</option>
<?php 
if ($books_avaliable) { 
    foreach ($books_avaliable as $book) { 
    ?>
                    <option value="<?php echo $book['id']; ?>"><?php echo $book['name']; ?></option>
<?php   } ?>
                    </select>
                    <form action="borrow_book.php" method="post" >
                    <input type="hidden" id="hdnIdBook" name="hdnIdBook">
                    <input type="hidden" id="hdnIdUser" name="hdnIdUser" value="<?=$_REQUEST['id_user']?>">
					<br> <br> <br>
					<input type="submit" style="display: none" id="btnBorrow" class="btn btn-primary" value="borrow">
                            <a style="display: none" id="btnBorrow" href="borrow_book.php" class="btn btn-sm btn-success"><i class=""></i> Borrow</a>
                    </form>

                    </td>
            </tr>
             <?php 
            if($msg){
                foreach($msg as $m){
                    echo '<tr><td>'.$m.'</td></tr>';
                }
            } 
         }else{?>
	<tr>
		<td colspan="6">Nothing to show.</td>
	</tr>
<?php   } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); 