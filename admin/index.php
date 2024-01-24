<?php
SESSION_START();
include '../config/plugins.php';
include '../config/dbcon.php';
if ($_SESSION['status'] == 1) {
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Settings</a>
        </li>
      </ul>
        <form action="../index.php" method = "POST">
          <button class="btn btn-danger"  type="submit">Logout</button>
        </form>
    </div>
  </div>
</nav>
<!-- this is the start of the code -->
<div class="container mt-3">
  <h2>Dashboard</h2>
 <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $counter = $row['id'];
            ?>
            
        <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['username']?></td>
        <td><?=$row['password']?></td>
      </tr>
            <?php
              }
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
    <tr>
        <form action = "../config/insertUser.php" method = "POST">  
        <td><?=$counter + 1?></td>
        <td><input type="email" placeholder="Username" name="username" class="form-control"></td>
        <td><input type="text" placeholder="Password" name="password" class="form-control"></td>
        <td> <input type ="submit" class="btn btn-success"value = "Add"></td>
        </form>
    </tr>
      
   
    </tbody>
  </table>
</div>

<!-- this is the end of the code -- >

<?php

} else {
    $_SESSION['error'] = "YOU MUST LOGIN FIRST";
    Header('Location: ../index.php');
}
?>