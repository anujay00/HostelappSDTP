<?php 
 include "includes/navbar.php";
?>

<?php 

if(isset($_POST['submit'])){
 $email = $_POST['email'];
 $password = $_POST['pw'];

 $email = mysqli_real_escape_string($conn, $email);
 $password = mysqli_real_escape_string($conn, $password);

 $query = "SELECT * FROM users WHERE user_email = '$email'";
 $select_user_query = mysqli_query($conn, $query);

 if(!$select_user_query){
     die("QUERY FAILED" . mysqli_error($conn));
 }

 while($row = mysqli_fetch_array($select_user_query)){
     $db_user_id = $row['user_id'];
     $db_user_email = $row['user_email'];
     $db_user_password = $row['user_password'];
     $db_user_name = $row['user_name'];
     $db_user_type = $row['user_type'];
 }

if($email === $db_user_email && password_verify($password, $db_user_password)){
     $_SESSION['user_id'] = $db_user_id;
     $_SESSION['user_email'] = $db_user_email;
     $_SESSION['user_name'] = $db_user_name;
     $_SESSION['user_type'] = $db_user_type;

     header("Location: index.php");
 }else {
     $message = "Email or Password is incorrect!";
 }
}
?>
           <section class="page-register page-bg-color">
                <div class="box-form">
                    <form action="#" method="POST" class="form d-flex flex-column">
                        <h4 class="form-title">Login to account</h4>

                        <input type="text" name="email" placeholder="Email" class="input-reset form__input" />
                        <input type="password" name="pw" placeholder="Password" class="input-reset form__input" />

                        <button class="link__template btn-hover-animate d-flex align-items-center justify-content-center" name="submit">
                            <div class="text">Login</div>

                        </button>

                    </form>
                </div>
            </section>
<?php
 include "includes/footer.php";
?>