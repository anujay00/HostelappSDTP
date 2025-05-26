<?php 

 include "includes/navbar.php";
?>

<?php 

if(isset($_POST['approve'])){
    $reservation_id = $_POST['reservation_id'];
    $query = "UPDATE reservations SET reservation_status = 'approved' WHERE reservation_id = $reservation_id";
    $update_reservation = mysqli_query($conn, $query);
    if($update_reservation){
        echo "<script>alert('Reservation Approved Successfully')</script>";
    }else{
        echo "<script>alert('Failed to Approve Reservation')</script>";
    }
}

if(isset($_POST['reject'])){
    $reservation_id = $_POST['reservation_id'];
    $query = "UPDATE reservations SET reservation_status = 'rejected' WHERE reservation_id = $reservation_id";
    $update_reservation = mysqli_query($conn, $query);
    if($update_reservation){
        echo "<script>alert('Reservation Rejected Successfully')</script>";
    }else{
        echo "<script>alert('Failed to Reject Reservation')</script>";
    }
}


?>

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card card-white mb-5">
            <div class="card-heading clearfix border-bottom mb-4">
                <h4 class="card-title">Reservation Requests</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                 <?php
                 $user_id = $_SESSION['user_id'];
                 $query = "SELECT * FROM reservations 
                 JOIN properties ON reservations.property_id = properties.property_id 
                 WHERE properties.landlord_id = $user_id";
                 $result = mysqli_query($conn, $query);

                  if (!$result) {
                   die('Invalid query: ' . mysqli_error($conn));
                  }


                 if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    $reservation_id = $row['reservation_id'];
                     $property_name = $row['property_name'];
                     $property_id = $row['property_id'];
                     $student_id = $row['student_id'];
                     $reservation_status = $row['reservation_status'];
                     
                 ?>
                    <li class="position-relative booking">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mb-4"><?php echo $property_name; ?> <span class="badge badge-primary mx-3"></span></h5>
                                <!-- <div class="mb-3">
                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Date:</span>
                                    <span class="bg-light-blue">02.03.2020 - 04.03.2020</span>
                                </div>
                                <div class="mb-3">
                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Details:</span>
                                    <span class="bg-light-blue">2 Adults</span>
                                </div>
                                <div class="mb-3">
                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Price:</span>
                                    <span class="bg-light-blue">$147</span>
                                </div> -->
                                <div class="mb-5">
                                    <?php 
                                    $query = "SELECT * FROM users WHERE user_id = $student_id";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $student_name = $row['user_name'];
                                        $student_email = $row['user_email'];
                                    
                                    ?>
                                 <div class="mb-3">
                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Student Name:</span>
                                    <span class="bg-light-blue"><?php echo $student_name; ?></span>
                                </div>
                                <div class="mb-3">
                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Student Email:</span>
                                    <span class="bg-light-blue"><?php echo $student_email; ?></span>
                                </div>
                                    <?php 
                                    }
                                    ?>
                                </div>
                                <?php 
                                if($reservation_status == 'pending'){
                                ?>
                                <div>
                                 <form method="post" class="status-action">
                                  <input type="hidden" value="<?php echo $reservation_id;?>" name="reservation_id">
                                  <button type="submit" name="approve" class="approve">Approve</button>
                                  <button type="submit" name="reject" class="reject">Reject</button>
                                </form>
                                </div>
                                <?php
                                }else {
                                ?>
                                <div>
                                    <span class="bg-light-blue text-capitalize"><?php echo $reservation_status; ?></span>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </li>
                 <?php
                 }
                }else {
                    echo "<h2>No Reservation Requests</h2>";
                } 
                 ?>
                </ul>

            </div>
        </div>

    </div>
</div>
</div>

<?php 
 include "includes/footer.php";

?>