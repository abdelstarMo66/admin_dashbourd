<?php
include '../../shared/header.php';
include "../../shared/nav.php";
include "../../general/env.php";
include "../../general/function.php";
$getData = "SELECT * FROM `lawyers`";
$successGetData = mysqli_query($connection,$getData);

if(isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    $delete = "DELETE FROM `employees` WHERE `id` = $id";
    $doneDelete = mysqli_query($connection, $delete);
    header("location:  /project/screens/lawyer/list.php ");
}
NotAuth();

?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Salary</th>
      <th scope="col">Phone</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>
      <th scope="col">Years Experience</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($successGetData as $get_data) { ?>
    <tr>
      <th scope="row"><?= "$get_data[id]" ?></th>
      <td><img src="<?= "$get_data[image]" ?> " width="40" ></td>
      <td><?= "$get_data[name]" ?></td>
      <td><?= "$get_data[salary]" ?></td>
      <td><?= "$get_data[phone]" ?></td>
      <td><?= "$get_data[age]" ?></td>
      <td><?= "$get_data[address]" ?></td>
      <td><?= "$get_data[years_ex]" ?></td>
      <td><?= "$get_data[email]" ?></td>
      <td><?= "$get_data[password]" ?></td>
      <td><a href="/project/screens/lawyer/update.php?edit_id=<?= "$get_data[id]" ?>" class="btn btn-info">Edit</a> <a href="/project/screens/lawyer/list.php?delete_id=<?= "$get_data[id]" ?>" class="btn btn-danger">Delete</a></td>
    </tr>
        <?php } ?>
  </tbody>
</table>

<?php include "../../shared/footer.php" ?>