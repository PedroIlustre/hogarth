<?php 
  require_once('functions.php'); 
  new_book();
?>

<?php include(HEADER_TEMPLATE); ?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<h2>New Book</h2>

<form action="new_book.php" method="post">
  <!-- area de campos do form -->
  <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="book['name']">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Author</label>
            <input type="text" class="form-control" name="book['author']">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Quantity</label>
            <input type="text" class="form-control" name="book['quantity']">
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