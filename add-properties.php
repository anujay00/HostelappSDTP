<?php 
 include "includes/navbar.php";
?>

<?php 


if(isset($_POST['submit'])){
 // $imageCount = count($_FILES['property_images']['name']);
 
 // for($i=0; $i < $imageCount; $i++){
     $landlord_id = $_SESSION['user_id'];
     $property_name = $_POST['property_name'];
     $property_location = $_POST['property_location'];
     $property_cost = $_POST['property_cost'];
     $no_of_rooms = $_POST['no_of_rooms'];
     $price_per_room = $_POST['price_per_room'];
     $property_image = $_FILES['property_images']['name'];
     $property_image_temp = $_FILES['property_images']['tmp_name'];

     if(move_uploaded_file($property_image_temp, "uploads/properties/$property_image")){
      $query = "INSERT INTO properties (landlord_id, property_name, property_images, property_location, property_cost, no_of_rooms, price_per_room, status) VALUES ('{$landlord_id}', '{$property_name}', '$property_image', '{$property_location}', '{$property_cost}', '{$no_of_rooms}', '{$price_per_room}', 'pending')";

      $upload_property_query = mysqli_query($conn, $query);

     }
 // }

 if(!$upload_property_query){
     die("QUERY FAILED" . mysqli_error($conn));
 }else {
     echo "Property Added Successfully!";
 }
}
?>

<section class="page-register page-bg-color">
                <div class="box-form">
                    <form action="#" method="POST" class="form d-flex flex-column" enctype="multipart/form-data">
                        <h4 class="form-title">Add a Property</h4>

                        <input type="text" name="property_name" placeholder="Property Name" class="input-reset form__input" />
                        <label>
                         Property Image
                        </label>
                        <input type="file" name="property_images" placeholder="Property Image" class="input-reset form__input" multiple/>
                        <input type="text" name="property_location" placeholder="Property Location" class="input-reset form__input" />
                        <input type="text" name="property_cost" placeholder="Property Cost" class="input-reset form__input" />
                        <input type="text" name="no_of_rooms" placeholder="Number Of Rooms" class="input-reset form__input" />
                        <input type="text" name="price_per_room" placeholder="Prime Per Room" class="input-reset form__input" />


                        <button class="link__template btn-hover-animate d-flex align-items-center justify-content-center" name="submit">
                            <div class="text">Add Property</div>

                        </button>

                    </form>
                </div>
            </section>

<?php
 include "includes/footer.php";
?>