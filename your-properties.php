<?php 
 include "includes/navbar.php";
?>

<?php 

if(isset($_POST['delete'])){
    $property_id = $_POST['property_id'];
    $query = "DELETE FROM properties WHERE property_id = $property_id";
    $delete_property_query = mysqli_query($conn, $query);
    if(!$delete_property_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }else {
        echo "Property Deleted Successfully!";
    }
}

?>

<div class="container">
 <div class="landlord-properties">
  <div class="wrapper">

    <?php 
    
    $query = "SELECT * FROM properties WHERE landlord_id = '{$_SESSION['user_id']}'";
    $select_properties = mysqli_query($conn, $query);

    if(mysqli_num_rows($select_properties) > 0) {
        while($row = mysqli_fetch_assoc($select_properties)){
            $property_id = $row['property_id'];
            $property_name = $row['property_name'];
            $property_images = $row['property_images'];
            $property_location = $row['property_location'];
            $property_cost = $row['property_cost'];
            $no_of_rooms = $row['no_of_rooms'];
            $price_per_room = $row['price_per_room'];
            $status = $row['status'];
    
    ?>
   <div class="property-item">
    <div class="property-image">
     <img src="uploads/properties/<?php echo $property_images; ?>" alt="property" />
    </div>
    <div class="property-details">
     <h3>Property Name: <?php echo $property_name; ?></h3>
     <p>Location: <?php echo $property_location; ?></p>
     <p>Cost: <?php echo $property_cost; ?></p>
     <p>No of Rooms: <?php echo $no_of_rooms; ?></p>
     <p>Price per Room: <?php echo $price_per_room; ?></p>
     <p>Status: <?php echo $status; ?></p>
     <form method="post">
      <input type="hidden" value="<?php echo $property_id;?>" name="property_id">
       <button type="submit" name="delete">Delete</button>
     </form>
     <a href="edit-properties.php?p_id=<?php echo $property_id; ?>">Edit</a>
    </div>
   </div>
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