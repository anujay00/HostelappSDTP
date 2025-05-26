<?php 
 include "includes/navbar.php";
?>

<?php 

if(isset($_GET['p_id'])){
    $property_id = $_GET['p_id'];
}

if(isset($_POST['submit'])){
    $property = $_POST['property'];
    $user = $_POST['user'];
    $query = "INSERT INTO reservations (property_id, student_id, reservation_status) VALUES ($property, $user, 'pending')";
    $reserve_property = mysqli_query($conn, $query);
    if(!$reserve_property){
        die("Query Failed" . mysqli_error($conn));
    }else {
        echo "<script>alert('Property Reserved Successfully')</script>";
    }
}

?>

<div class="container">
    <div class="row">
        <?php
        $query = "SELECT * FROM properties WHERE property_id = $property_id";
        $select_properties = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_assoc($select_properties)){
            $property_id = $row['property_id'];
            $property_name = $row['property_name'];
            $property_images = $row['property_images'];
            $property_location = $row['property_location'];
            $property_cost = $row['property_cost'];
            $no_of_rooms = $row['no_of_rooms'];
            $price_per_room = $row['price_per_room'];
        ?>
            <div class="col-md-5">
            <div class="">
                <img src="uploads/properties/<?php echo $property_images; ?>" alt="property" style="width: 100%;height: 100%;" />
            </div>
            <div class="project-info-box mt-0">
                <h5 class="text-capitalize"><?php echo $property_name; ?></h5>
                <div class="mt-5">
                    <p><b>Location:</b> <?php echo $property_location; ?></p>
                    <p><b>Cost:</b> <?php echo $property_cost; ?></p>
                    <p><b>No of Rooms:</b> <?php echo $no_of_rooms; ?></p>
                    <p><b>Price per Room:</b> Rs.<?php echo $price_per_room;  ?></p>
                </div>
            </div>
        <?php 
        }
        ?>

            <?php 
            if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'student')){
            ?>
            <div class="mb-5">
                <form action="" method="POST">
                    <input type="hidden" value="<?php echo $property_id ?>" name="property">
                    <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="user">
                    <button class="reservation" name="submit">
                        <div class="text">Reserve</div>
                    </button>
                </form>
            </div>
            <?php 
            }
            ?>
        </div>

        <div class="col-md-7">
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.188606148021!2d79.92757197504332!3d6.867989393130648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251f95e068197%3A0x80d22de2f89d042e!2sMonarch%20Imperial!5e0!3m2!1sen!2slk!4v1710320846048!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?php
 include "includes/footer.php";
?>