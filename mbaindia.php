<?php
session_start();
require 'config.php';

// Initialize the $filter_fee variable
$filter_fee = '';
$filter_location  = '';
$filter_rank = '';

// Fetching data from the table
if (isset($_POST["filter_btn"])) {
  $filter_value = $_POST["filter_value"];
  $query = "SELECT * FROM mbaindia WHERE college_name LIKE '%$filter_value%'";
} else {
  $query = "SELECT * FROM mbaindia";
}

// Check if the filter button is clicked
if (isset($_POST["filter_apply"])) {
  // Initialize the query with no conditions
  $query = "SELECT * FROM mbaindia";

  // Initialize an array to store conditions
  $conditions = [];

  // Get the selected fee range value
  $filter_fee = $_POST["filter_fee"];
  // Get the selected location value
  $filter_location = $_POST["filter_location"];
  // Get the selected rank value
  $filter_rank = $_POST["filter_rank"];

  // Add conditions based on selected filters
  if (!empty($filter_fee)) {
      $conditions[] = "fees >= '$filter_fee'";
  }
  if (!empty($filter_location)) {
      $conditions[] = "state1 = '$filter_location'";
  }
  if (!empty($filter_rank)) {
      $conditions[] = "`nirf` = '$filter_rank'";
  }

  // If there are any conditions, append them to the query
  if (!empty($conditions)) {
      $query .= " WHERE " . implode(" OR ", $conditions);
  }
}

// Execute the query
$query_run = mysqli_query($con, $query);

// Check if the query executed successfully
if (!$query_run) {
    die('Error: ' . mysqli_error($con));
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/table.css">

  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
  <div class="conatiner-xxl pb-4">
    <header>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Better<span>College</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="course.html">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="abroad.html">Study Abroad</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="scholarship.html">Scholarship</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About us</a>
            </li>
          </ul>

      </nav>
    </header>
    <div class="image-container">
    <div class="image-overlay"><h1> List of top 50 Colleges of MBA across the India.</h1>
    <p>Explore elite colleges for Master—your gateway to excellence.</p>
</div>

  </div>
  <div class="container mt-3 pt-3">
     <div class="container mt-5">
    <form class="d-flex" role="search" action="" method="post">
      <input class="form-control me-2 custom-search" name="filter_value" type="search" placeholder="Search" aria-label="Search" style="border:1px solid black;">
      <button class="btn btn-outline-success" name="filter_btn" type="submit">Search</button>
    </form>
  </div>
  <style>
    .custom-search {
      height: 60px;
    }
  </style>
 
    
  <form method="post">
    <div class="row">
        <!-- <div class="col-lg-2 col-md-2 col-sm-4 pt-4 ml-3">
            <div class="form-group">
                <select class="form-control outline-primary" name="filter_fee" id="exampleFormControlSelect1">
                    <option value="">Select Fee Range</option>
                    <option value="50000">>= 50,000</option>
                    <option value="100000">>=100,000</option>
                    <option value="25000"> <=2500</option>
                    <option value="75000">>=75000</option>
                </select>
            </div>
        </div> -->
        <div class="col-lg-2 col-md-2 col-sm-4 pt-4">
            <div class="form-group">
                <select class="form-control outline-primary mx-2" name="filter_location" id="exampleFormControlSelect1">
                    <option>Location</option>
                    <?php
$sql = "SELECT DISTINCT state1 FROM mbaindia";
$result = mysqli_query($con, $sql);

// Check if the query was successful and if there are any rows returned
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch associative array of countries
    $states = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($states as $state) { ?>
        <option value="<?php echo $state['state1']; ?>"><?php echo $state['state1']; ?></option>
    <?php }
} else {
    // Error handling if the query fails or no rows are returned
    echo "No countries found.";
}
?>

                </select>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 pt-4">
            <div class="form-group">
                <select class="form-control outline-primary mx-2" name="filter_rank" id="exampleFormControlSelect1">
                    <option>NIRF</option>
                    <?php
$sql = "SELECT `nirf` FROM mbaindia";
$result = mysqli_query($con, $sql);

// Check if the query was successful and if there are any rows returned
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch associative array of countries
    $rank = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rank as $nirf) { ?>
        <option value="<?php echo $nirf['nirf']; ?>"><?php echo $nirf['nirf']; ?></option>
    <?php }
} else {
    // Error handling if the query fails or no rows are returned
    echo "Not found.";
}
?>

                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary my-4" name="filter_apply">Apply Filter</button>
    </div>
</form>

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg-dark">
                        <h4 style="color: white;"> Management(MBA)
                          
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php if (mysqli_num_rows($query_run) > 0) { ?> 
                            <table class="table table-responsive table-striped">
                                <thead style= "background-color:#023e8a; color: white; ">
                                    <tr >
                                        <th>Sr. No.</th>
                                        <th>Name of College</th>
                                        <th>state</th>
                                       
                                        <th> AnnuaL Fee</th>
                                        <th>Entrance Exam</th>
                                        
                                        <th>nirf Rank</th>
                                        <th> Average Package(in LPA)</th>
                                        <th> Offical Link</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query_run as $student) { ?>
                                        <tr>
                                            <td><?= $student['id']; ?></td>
                                            <td> <a href="college_detail2.php/?college_name=<?= $student['college_name']; ?>"><?= $student['college_name']; ?></a></td>
                                            <td><?= $student['state1']; ?></td>
                                          
                                            <td><?= $student['fees']; ?></td>
                                            <td><?= $student['exam']; ?></td>
                                            
                                            <td><?= $student['nirf']; ?></td>
                                            <td><?= $student['package']; ?></td>
                                           
                                            <td><a href="<?php echo $student['official_website']; ?>">official link</a></td>
                                            <td>
                                          
                                            </td> 
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <div>
                            <nav aria-label="...">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item " aria-current="page">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
 </div>
                        <?php
                     } 
                     else
                      { ?>
                            <h5>No Record Found</h5>
                        <?php 
                    } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
  </div>
  <!------bootstrap js---->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>