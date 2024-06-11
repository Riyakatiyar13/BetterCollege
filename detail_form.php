<?php
include('config.php');
if(isset($_POST['submit'])) {
  $college_name = $_POST['college_name'];
  $nirf = $_POST['nirf'];
  $location = $_POST['location'];
  $area = $_POST['area'];
  $college_about = $_POST['college_about'];
  $course1a = $_POST['course1a'];
  $course1b = $_POST['course1b'];
  $course2a = $_POST['course2a'];
  $course2b= $_POST['course2b'];
  $highest = $_POST['highest'];
  $average = $_POST['average'];
  $link = $_POST['link'];
  
  //inserting data into database
  $query = "INSERT INTO `college` (`college_name`, `nirf`, `location`, `area`, `college_about`, `course1a`, `course1b`, `course2a`, `course2b`, `highest`, `average`,`map-link`) 
            VALUES ('$college_name', '$nirf', '$location','$area', '$college_about',  '$course1a', '$course1b', '$course2b', '$course2b', '$highest', '$average', '$link')";
  $query_run = mysqli_query($con, $query);


  // Check if query was successful
  if($query_run) {
    echo "Data inserted successfully";
  } else {
    echo "Error: " . mysqli_error($con);
  }

  // Close connection
  mysqli_close($con);
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
           
              <!--__nirf-->
              <div class="mb-3">
                <label for="nirf" class="form-label">NIRF</label>
                <input type="text" class="form-control" id="nirf" name="nirf" aria-describedby="nirf">
              </div>
              <!------location------->
              <div class="mb-3">
                <label for="location" class="form-label">location</label>
                <input type="text" class="form-control" id="location" name="location" aria-describedby="location">
              </div>
              <!------------------area-->
              <div class="mb-3">
                <label for="area" class="form-label">Area in acres</label>
                <input type="text" class="form-control" id="area" name="area" aria-describedby="area">
              </div>

           
            <div class="mb-3">
                <label for="college_about" class="form-label">Overview</label>
                <input type="text" class="form-control" name="college_about" id="overview">
              </div>
            
              <div class="mb-3">
                <h4 class="form-label">admission process</h4>
              </div>
              
              <div class="mb-2">
               
                <label for="bba" class="form-label">course1</label>
                <textarea class="form-control" id="course1a" name="course1a" rows="2"></textarea>
                <textarea class="form-control" id="course1b" name="course1b" rows="2"></textarea>
              </div>
              <div class="mb-3">
               
                <label for="mba" class="form-label">course2a</label>
                <textarea class="form-control" name="course2a" id="course2a" rows="2"></textarea>
                <textarea class="form-control" name="course2b" id="course2b" rows="2"></textarea>
              </div>

              <div class="mb-2">
                <h4 class="form-label">package</h4>
              </div>

              <div class="mb-3">
                <label for="highest" class="form-label">Highest Package</label>
                <input type="highest" class="form-control" name="highest" id="highest">
              </div>

              <div class="mb-3">
                <label for="average" class="form-label">lowest Package</label>
                <input type="text" class="form-control" name="average" id="lowest">
              </div>

              <div class="mb-3">
                <label for="link" class="form-label">google map link</label>
                <input type="link" class="form-control"  name="link" name="link" id="link">
              </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
          
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>