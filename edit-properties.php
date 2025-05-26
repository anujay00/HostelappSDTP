<?php 
 include "includes/navbar.php";
?>

<?php 

 if(isset($_GET['p_id'])){
  $property_id = $_GET['p_id'];
 }

 if(isset($_POST['update'])){
     $property_name = $_POST['property_name'];
     $property_location = $_POST['property_location'];
     $property_cost = $_POST['property_cost'];
     $property_image = $_FILES['property_images']['name'];
     $property_image_temp = $_FILES['property_images']['tmp_name'];

     if(move_uploaded_file($property_image_temp, "uploads/properties/$property_image")){
      $query = "UPDATE properties SET property_name = '{$property_name}', property_images = '{$property_image}', property_location = '{$property_location}', property_cost = '{$property_cost}' WHERE property_id = $property_id";

      $update_property_query = mysqli_query($conn, $query);
 }
 if(!$update_property_query){
     die("QUERY FAILED" . mysqli_error($conn));
 }else {
     echo "Property Updated Successfully!";
 }
}

?>

<section class="page-register page-bg-color">
                <div class="box-form">
                    <form action="#" method="POST" class="form d-flex flex-column" enctype="multipart/form-data">
                        <h4 class="form-title">Edit Property</h4>

                        <?php 
                        
                        $query = "SELECT * FROM properties WHERE property_id = $property_id";
                        $select_properties = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($select_properties)){
                            $property_name = $row['property_name'];
                            $property_images = $row['property_images'];
                            $property_location = $row['property_location'];
                            $property_cost = $row['property_cost'];
                        
                        ?>
                        <input type="text" name="property_name" placeholder="Property Name" class="input-reset form__input" value="<?php echo  $property_name; ?>"/>
                        <label>
                         Property Image
                        </label>
                        <img src="uploads/properties/<?php echo $property_images; ?>" alt="">
                        <input type="file" name="property_images" placeholder="Property Image" class="input-reset form__input" value="<?php echo  $property_images; ?>" multiple/>

                        <input type="text" name="property_location" placeholder="Property Location" class="input-reset form__input" value="<?php echo  $property_location; ?>"/>
                        <input type="text" name="property_cost" placeholder="Property Cost" class="input-reset form__input" value="<?php echo  $property_cost; ?>"/>
                        <?php 
                        }
                        ?>
                        <button class="link__template btn-hover-animate d-flex align-items-center justify-content-center" name="update">
                            <div class="text">Edit Property</div>
                        </button>
                    </form>
                </div>
            </section>

<?php
 include "includes/footer.php";
?>