<?php 
 include "includes/navbar.php";
?>


<div class="container">
 <div class="landlord-properties">
  <div class="wrapper">

    <?php 
    
    $query = "SELECT * FROM properties WHERE status = 'approved'";
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
    
    ?>
    <a href="single-property.php?p_id=<?php echo $property_id; ?>">
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

      </div>
    </div>
    </a>
    <?php 
      }
    }else {
      echo "<h2>No properties available</h2>";}
    ?>

  </div>
 </div>
</div>


<?php
 include "includes/footer.php";
?>