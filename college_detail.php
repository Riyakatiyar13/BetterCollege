<?php
include 'config.php';

if (isset($_GET['college_name'])) {
    $college_name = $_GET['college_name']; // No need for htmlspecialchars or urlencode
    $query = mysqli_query($con, "SELECT * FROM `college`  WHERE `college`.`college_name` = '$college_name'");
    $show = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>college details </title>

    <link rel="stylesheet" href="http://localhost/crud/final%20project/css/college.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.css">
</head>

<body>
    <div class="main">
        <div class="container-xxl py-0  wow">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Better<span>College</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="../index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../courses.html">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../study.html">Study Abroad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../scholar.html">Scholarship</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../connectus.html">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <div class="container align-items-center text-center text-white py-4">
                
                <h1 class="pt-5"><?php echo  $show['college_name']; ?></h1>
                <p><?php echo  $show['college_name']; ?></p>
            </div>>


            <div class="container-fluid">
                <div class="container py-4 pt-4">
                    <div class="row wow1">
                        <div class="col-lg-4 col-md-4 col-sm-6 pb-4 text-center">
                            <div class="d-flex align-items-center justify-content-center py-4">
                                <i class="fa fa-university fa-2x text-dark pr-3"></i>
                                <h6 class="text-black font-weight-medium m-0">3 </h6>
                            </div>
                            <p><?php echo  $show['nirf']; ?>(Engineering Category)</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 pb-4 text-center">
                            <div class="d-flex align-items-center justify-content-center py-4">
                                <i class="fa fa-map-marker fa-2x text-dark pr-3"></i>
                                <h6 class="text-black font-weight-medium m-0">Location</h6>
                            </div>
                            <p><?php echo  $show['location']; ?></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 pb-4 text-center">
                            <div class="d-flex align-items-center justify-content-center py-4">
                                <i class="fa fa-area-chart fa-2x text-dark pr-3"></i>
                                <h6 class="text-black font-weight-medium m-0">Area In Acres</h6>
                            </div>
                            <p><?php echo  $show['area']; ?></p>
                        </div>
                    </div>
                    <div class="container py-5">
                        <div class="institute pb-4">
                            <h1> College Detail</h1>
                        </div>
                        <div class="details align-items-center justify-content-center p-2 pb-4">
                            <p><?php echo  $show['college_about']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!---central columns finish-------->
        </div>
        
        <!--------Addmission start------------>
        <div class="container-xxl py-0  wow3">
            <div class="container">
                <div class="text-left  py-4">
                    <h3 class="mb-4">Addmision Process </h3>
                </div>
                <div class="row px-5 py-2">
                    <div colspan="2">
                        <h5>B.tech</h5>

                    </div>
                    <div class="px-5" colspan="3">
                        <p><?php echo  $show['course1a']; ?></p>
                        <p> <?php echo  $show['course1b']; ?></p>
                    </div>



                </div>
                <div class="row px-5 py-2">
                    <div colspan="2">
                        <h5 class="py-3">M.tech</h5>

                    </div>
                    <div class="px-5" colspan="3">
                    <p><?php echo  $show['course2a']; ?></p>
                    <p> <?php echo  $show['course2b']; ?></p>
                   
                        
                    
                    </div>



                </div>

            </div>
        </div>
        <!--------Addmission end------------>

        <!-------placement detail----------->
        <div class="container-xxl py-0 ">
            <div class="container">
                <div class="text-left  py-4">
                    <h3 class="mb-4">Placement Details </h3>
                </div>

                <div class=" row py-2">

                    <div class="col-sm-6 col-md-4 col-lg-3 ">
                        <h5> Highest Package</h5>
                        <p><?php echo  $show['highest']; ?></p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 ">
                        <h5> Average Package</h5>
                        <p><?php echo  $show['average']; ?></p>
                    </div>
                    
                </div>
            </div>
        </div>


        
     
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-------location--------------->
    <div class="container-xxl py-2">
        <iframe src="<?php echo  $show['map-link']; ?>"></iframe>
    </div>

    </div>


    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
</body>

</html>