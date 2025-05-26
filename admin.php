<?php 
  include "includes/header.php";

?>
        


 <div class="navbar">
  <div class="container">
  <nav class="nav-menu">
    <ul class="menu d-flex justify-content-end">
     <li class="nav-item">
      <a href="logout.php" class="menu-link main-menu-link item-title">Logout</a>
     </li>
     <li class="nav-item">
      <a href="add-users.php" class="menu-link main-menu-link item-title">Add Users</a>
     </li>
   </ul>
 </nav>
  </div>
</div>


 <?php 
 include "add-users.php";
 ?>

<?php
 include "includes/footer.php";
?>