<?php 
  require_once('functions.php'); 
  edit_book();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Edit Book</h2>

<form action="edit_book.php?id=<?php echo $book['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Name </label>
            <input type="text" class="form-control" name="book['name']" value="<?php echo $book['name']; ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="author">Author </label>
            <input type="text" class="form-control" name="book['author']" value="<?php echo $book['author']; ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="quantity">Quantity </label>
            <input type="text" class="form-control" name="book['quantity']" value="<?php echo $book['quantity']; ?>">
        </div>

    <div id="actions" class="row">
        <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="Save">
            <a href="index.php" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE);