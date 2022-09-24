<?php

session_start();
//print_r($_SESSION);
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location:  /project/ ");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Company</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if (!empty($_SESSION['emailAdmin']) || !empty($_SESSION['emailLawyer']) ) { ?>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/project">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(empty($_SESSION['emailLawyer'])){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Lawyer
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/project/screens/lawyer/add.php">Add</a>
          <a class="dropdown-item" href="/project/screens/lawyer/list.php">List</a>
        </div>
      </li>
<?php } ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Articales
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/project/screens/articales/add.php">Add</a>
          <a class="dropdown-item" href="/project/screens/articales/list.php">List</a>
        </div>
      </li>
      <?php if(empty($_SESSION['emailLawyer'])){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/project/screens/profile/my_profile.php">My Profile</a>
          <a class="dropdown-item" href="/project/screens/profile/add_admin.php">Add New Admin</a>
          <a class="dropdown-item" href="/project/screens/profile/list_admin.php">List</a>
        </div>
      </li>
<?php } ?>
    </ul>
    <?php
} ?>
<ul class="navbar-nav mr-auto"> </ul>
    <?php if (!empty($_SESSION['emailAdmin']) || !empty($_SESSION['emailLawyer'])) { ?>
    <form class="form-inline my-2 my-lg-0">
      <button name="logout" class="btn btn-dark"> Logout </button>
    </form>
    <?php
}
else { ?>
    <a href="/project/screens/auth/login.php" class="btn btn-dark " type="submit">Login</a>
    <?php
} ?>
  </div>
</nav>