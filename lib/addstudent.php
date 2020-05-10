<?php
include'../inc/header.php' ;
include'../lib/database.php' ;

if(isset($_POST['submit'])) {
  $db = new database();
  $db->insert();
}

?>

  <div class="panel-heading">
    <h2>Add Student <a class="pull-right" href="../index.php">Back</a> </h2>
  </div>
  <div class="panel-body">
    <form class="" action="" method="post">
      <div class="form-group">
        <label for="name">Student Name</label>
        <input class="form-control" type="text" name="name" id="name" required>
      </div>

      <div class="form-group">
        <label for="email">Student Email</label>
        <input class="form-control" type="text" name="email" id="email" required>
      </div>

      <div class="form-group">
        <label for="phone">Student Phone</label>
        <input class="form-control" type="text" name="phone" id="phone" required>
      </div>

      <div class="form-group">
        <input type="hidden" name="action" value="add" >
        <input class="btn btn-primary" type="submit" name="submit" value="Add Student">
      </div>
    </form>
  </div>
<?php include'../inc/footer.php' ?>
