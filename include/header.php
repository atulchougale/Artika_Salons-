 <!-- Top Bar Start -->
 <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email']) { ?>

     <div class="top-bar d-none d-md-block clearfix">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6">
                     <div class="top-bar-left">
                         <div class="text">
                             <h2>8:00 - 9:00</h2>
                             <p>Opening Hour Mon - Fri</p>
                         </div>
                         <div class="text">
                             <h2>+123 456 7890</h2>
                             <p>Call Us For Appointment</p>
                         </div>
                        
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="top-bar-right">

                         <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
                             <li class="sigi"><a class="btn btn-success" href="profile.php">Profile</a></li>
                             <li class="tol">Welcome :</li>
                             <li class="sig"><?php echo htmlentities($_SESSION['user_email']); ?> /</li>
                             <li class="sigi"><a class="btn btn-danger" href="logout.php">Logout</a></li>
                         </ul>
                         <div class="clearfix"></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 <?php } else { ?>

     <div class="top-bar d-none d-md-block clearfix">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6">
                     <div class="top-bar-left">
                         <div class="text">
                             <h2>8:00 - 9:00</h2>
                             <p>Opening Hour Mon - Fri</p>
                         </div>
                         <div class="text">
                             <h2>+123 456 7890</h2>
                             <p>Call Us For Appointment</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="top-bar-right">

                         <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">

                             <li class="sig"><a href="registform.php" class="btn btn-primary">Register</a></li>
                             <li class="sigi"><a href="logform.php" class="btn btn-success"> Login</a></li>
                         </ul>
                         <div class="clearfix"></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 <?php } ?>
 <!-- Top Bar End -->

 <!-- Nav Bar Start -->
 <div class="navbar navbar-expand-lg bg-dark navbar-dark clearfix">
     <div class="container-fluid">
         <a href="index.php" class="navbar-brand">Artika</a>
         <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
             <div class="navbar-nav ml-auto">
                 <a href="index.php" class="nav-item nav-link active">Home</a>
                 <a href="about.php" class="nav-item nav-link">About</a>
                 <a href="service.php" class="nav-item nav-link">Service</a>
                 <a href="offer.php" class="nav-item nav-link">Offers</a>
                 <a href="price.php" class="nav-item nav-link">Price</a>
                 <a href="team.php" class="nav-item nav-link">Barber</a>
                 <a href="portfolio.php" class="nav-item nav-link">Gallery</a>
                 <a href="course.php" class="nav-item nav-link">Course</a>

                 <a href="contact.php" class="nav-item nav-link">Contact</a>
             </div>
         </div>
     </div>
 </div>
 <!-- Nav Bar End -->