<?php 
 include "includes/navbar.php";
?>

<?php 

if(isset($_POST['submit'])){
 $username = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['pw'];
 $cpassword = $_POST['cpw'];
 $type = $_POST['type'];

 if(!empty($username) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($type)){
     if($password == $cpassword){
         $username = mysqli_real_escape_string($conn, $username);
         $email = mysqli_real_escape_string($conn, $email);
         $password = mysqli_real_escape_string($conn, $password);
         $cpassword = mysqli_real_escape_string($conn, $cpassword);

         $hash_pw = password_hash($password, PASSWORD_BCRYPT);
         
         $query = "INSERT INTO users (user_name, user_email, user_password, user_type) VALUES ('$username', '$email', '$hash_pw', '$type')";

         $register_users = mysqli_query($conn, $query);

         if(!$register_users){
             die("QUERY FAILED" . mysqli_error($conn));
         }else {
            header("Location: login.php");
         }
     }else{
         $message = "Fields cannot be empty!";
     }
 }else{
     $message = "Password Not Matched";
 }
}

?>



           <section class="page-register page-bg-color">
                <div class="box-form">
                    <form action="#" method="POST" class="form d-flex flex-column">
                        <h4 class="form-title">Register an account</h4>

                        <input type="text" name="name" placeholder="Name" class="input-reset form__input" />
                        <input type="text" name="email" placeholder="Email" class="input-reset form__input" />
                        <input type="password" name="pw" placeholder="Password" class="input-reset form__input" />
                        <input type="password" name="cpw" placeholder="Re-Enter Password" class="input-reset form__input" />
                        <div class="d-flex align-items-center">
                            <input type="radio" name="type" value="landlord" class="input-reset form__input" />
                            <label class="form__label">Landlord </label>
                            <input type="radio" name="type" value="student" class="input-reset form__input" />
                            <label class="form__label">Student</label>
                        </div>

                        <button class="link__template btn-hover-animate d-flex align-items-center justify-content-center" name="submit">
                            <div class="text">register an account</div>

                        </button>

                    </form>
                </div>
            </section>
<?php
 include "includes/footer.php";
?>