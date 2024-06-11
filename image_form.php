<?php
include ('config.php');
if(isset($_POST['submit'])) {
  $college_name = $_POST['college_name'];

  // Accessing uploaded files
  $images = array();
  for ($i = 1; $i <= 10; $i++) {
    $image_name = 'image' . $i;
    $images[] = $_FILES[$image_name]['name'];
    $images_tmp[] = $_FILES[$image_name]['tmp_name'];
  }

  // Move uploaded files
  for ($i = 0; $i < count($images); $i++) {
    move_uploaded_file($images_tmp[$i], "upload_images/" . $images[$i]);
  }
  
  // Inserting data into the database without prepared statements
  $query = "INSERT INTO college1 (college_name, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$college_name', '$images[0]', '$images[1]', '$images[2]', '$images[3]', '$images[4]', '$images[5]', '$images[6]', '$images[7]', '$images[8]', '$images[9]')";
  
  $res_query = mysqli_query($con, $query);
  
  if($res_query){
    echo "data inserted";
  }
  else{
    echo "data not inserted";
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class="container-sm">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="college_name" class="form-label">College Name</label>
              <input type="text" class="form-control" id="college_name" name="college_name" aria-describedby="college_name">
            
            </div>
    <div class="mb-2">
                <h4 class="form-label">logo</h4>
              
              <div class="mb-3">
                <label for="image" class="form-label">visited campanies logo</label>
                <input type="file" class="form-control"  class="mb-2" name="image1" id="image1">
                <input type="file" class="form-control"  class="mb-2" name="image2" id="image2">
                <input type="file" class="form-control"  class="mb-2" name="image3" id="image3">
                <input type="file" class="form-control"  class="mb-2" name="image4" id="image4">
                <input type="file" class="form-control"  class="mb-2" name="image5" id="image5">
              </div></div>
              <div class="mb-2">
                <h4 class="form-label">Gallery</h4>
              
              <div class="mb-3">
                <label for="image" class="form-label">images of campus</label>
                <input type="file" class="form-control"  class="mb-2" name="image6" id="image6">
                <input type="file" class="form-control"  class="mb-2" name="image7" id="image7">
                <input type="file" class="form-control"  class="mb-2" name="image8" id="image8">
                <input type="file" class="form-control"  class="mb-2" name="image9" id="image9">
                <input type="file" class="form-control"  class="mb-2" name="image10" id="image10">
              </div></div>
              
              <div class="mb-3">
                <label for="link" class="form-label">google map link</label>
                <input type="link" class="form-control"  name="link" name="link" id="link">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>