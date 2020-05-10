<?php
  include'../inc/header.php';
  include './database.php';
  $db = new database();

  if(isset($_POST['submit'])){
    $db->update();
  }
  $studentList = [];
  $studentList = $db->getStudentById($_GET['id']);

?>
  <div class="panel-heading">
    <h2>Update Student <a class="pull-right" href="../index.php">Back</a> </h2>
  </div>
  <div class="panel-body">
    <form  action="" method="POST">
      <div class="form-group">
        <label for="name">Student Name</label>
        <input class="form-control" type="text" name="name" id="name" value="<?php echo $studentList[0]['name']?>" required>
      </div>

      <div class="form-group">
        <label for="email">Student Email</label>
        <input class="form-control" type="text" name="email" id="email" value="<?php echo $studentList[0]['email']?>" required>
      </div>

      <div class="form-group">
        <label for="phone">Student Phone</label>
        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $studentList[0]['phone']?>" required>
      </div>

      <div class="form-group">
        <input type="hidden" name="sid" value="<?php echo $studentList[0]['id']?>" >
        <input class="btn btn-primary" type="submit" name="submit" value="Update">
      </div>
    </form>
  </div>
<?php include'../inc/footer.php' ?>
