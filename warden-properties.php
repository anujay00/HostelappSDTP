<?php 
 include "includes/navbar.php";
?>

<?php 

if(isset($_POST['approve'])){
    $property_id = $_POST['property_id'];
    $query = "UPDATE properties SET status = 'approved' WHERE property_id = $property_id";
    $update_property = mysqli_query($conn, $query);
    if($update_property){
        echo "<script>alert('Property Approved Successfully')</script>";
    }else{
        echo "<script>alert('Failed to Approve Property')</script>";
    }
}

if(isset($_POST['reject'])){
    $property_id = $_POST['property_id'];
    $query = "UPDATE properties SET status = 'rejected' WHERE property_id = $property_id";
    $update_property = mysqli_query($conn, $query);
    if($update_property){
        echo "<script>alert('Property Rejected Successfully')</script>";
    }else{
        echo "<script>alert('Failed to Reject Property')</script>";
    }
}

?>


<div class="container">
 <div class="landlord-properties">
  <div class="wrapper">

    <?php 
    
    $query = "SELECT * FROM properties";
    $select_properties = mysqli_query($conn, $query);

    if(mysqli_num_rows($select_properties) > 0) {
        while($row = mysqli_fetch_assoc($select_properties)){
            $landlord_id = $row['landlord_id'];
            $property_id = $row['property_id'];
            $property_name = $row['property_name'];
            $property_images = $row['property_images'];
            $property_location = $row['property_location'];
            $property_cost = $row['property_cost'];
            $no_of_rooms = $row['no_of_rooms'];
            $price_per_room = $row['price_per_room'];
            $status = $row['status'];
    
    ?>
    <a href="single-property.php?p_id=<?php echo $property_id; ?>">
     <div class="property-item">
        <div class="property-image">
        <img src="uploads/properties/<?php echo $property_images; ?>" alt="property" />
        </div>
        <div class="property-details">
        <h3>Property Name: <?php echo $property_name; ?></h3>
        <?php 
            $query = "SELECT * FROM users WHERE user_id = $landlord_id";
            $select_landlord = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($select_landlord)){
                $landlord_name = $row['user_name'];
            
        ?>
        <p>Landlord Name: <?php echo $landlord_name; ?></p>
        <?php 
            }
        ?>
        <p>Location: <?php echo $property_location; ?></p>
        <p>Cost: <?php echo $property_cost; ?></p>
        <p>No of Rooms: <?php echo $no_of_rooms; ?></p>
        <p>Price per Room: <?php echo $price_per_room; ?></p>
        <p>Status: <?php echo $status; ?></p>
        
        <?php 
        if($status === 'pending'){
        ?>
        <form method="post" class="status-action">
        <input type="hidden" value="<?php echo $property_id;?>" name="property_id">
        <button type="submit" name="approve" class="approve">Approve</button>
        <button type="submit" name="reject" class="reject">Reject</button>
        </form>
        <?php
        }
        ?>
        </div>
     </div>
    </a>
    <?php 
    }
    }else {
    echo "<h2>No properties available</h2>";
    }
    ?>

  </div>
 </div>
</div>


<?php
 include "includes/footer.php";
?>