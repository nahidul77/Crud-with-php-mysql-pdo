<?php

	include './inc/header.php';
	include './lib/database.php';

	$db = new database();
	$studentList = [];
	$studentList = $db->select();

	if(isset($_GET['action'])) {
		$db->delete();
	}

?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Student Data <a class="pull right btn btn-info" href="lib/addstudent.php">Add Student</a></h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
						<?php foreach($studentList as $student) { ?>
            <tr>
              <td><?php echo $student['name'] ?></td>
              <td><?php echo $student['email'] ?></td>
              <td><?php echo $student['phone'] ?></td>
              <td>
                <a class="btn btn-default" href="lib/editstudent.php?id=<?php echo $student['id'] ?>">Edit</a>
                <a class="btn btn-danger" href="?action=delete&id=<?php echo $student['id'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
              </td>
            </tr>
					<?php } ?>
          </table>
        </div>
      </div>

<?php include './inc/footer.php' ?>
