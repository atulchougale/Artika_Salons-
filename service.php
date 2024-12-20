<?php
include('./include/db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Services-Artika Saloon</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
       <link href="css/style.css" rel="stylesheet">
       <style>
         .booking-container {
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .box-service {
	color: #999;
	background: #fff;
	text-align: left;
}

.box-service-left {
	position: relative;
	overflow: hidden;
	height: 300px;
}

.box-service-image {
	position: absolute;
	top: 50%;
	left: 50%;
	-webkit-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	width: auto;
	height: auto;
	min-height: 100%;
	min-width: 100%;
}

.box-service-body {
	padding: 25px 25px 40px;
}

.box-service-header {
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-direction: row;
	-ms-flex-direction: row;
	flex-direction: row;
	-webkit-flex-wrap: nowrap;
	-ms-flex-wrap: nowrap;
	flex-wrap: nowrap;
	-webkit-justify-content: space-between;
	-ms-flex-pack: justify;
	justify-content: space-between;
}

.box-service-title,
.box-service-price {
	display: inline-block;
	margin-top: 0;
	margin-bottom: 0;
	font-family: "Arvo", Helvetica, Arial, sans-serif;
	font-weight: 400;
	color: #000;
	font-size: 22px;
	line-height: 1.2;
	letter-spacing: .05em;
	text-transform: uppercase;
	color: #000;
}

.box-service-title a,
.box-service-price a {
	display: inline;
	font: inherit;
	letter-spacing: inherit;
}

.box-service-title a, .box-service-title a:active, .box-service-title a:focus,
.box-service-price a,
.box-service-price a:active,
.box-service-price a:focus {
	color: inherit;
}

.box-service-title a:hover,
.box-service-price a:hover {
	color: #014d55;
}

.box-service-title {
	padding: 0 20px 3px 0;
	word-spacing: 100vw;
}

.box-service-price small {
	font-size: .66em;
}

.box-service-text {
	font-size: 14px;
	line-height: 1.71429;
}

.box-service-control {
    min-width: 257px;
    border-radius: 35px;
    height: 62px;
    text-align: center;
    padding-top: 11px;
    font-size: 25px;

}

.box-service-control, .box-service-control:active, .box-service-control:focus {
	color: #fff;
	background: #014d55;
	border-color: #014d55;
}

.box-service-control:hover {
	color: #fff;
	background: #000;
	border-color: #000;
}

.box-service-dark {
	background: #242423;
}

.box-service-dark .box-service-title,
.box-service-dark .box-service-price {
	color: #fff;
}

.box-service-dark .box-service-control:hover {
	color: #000;
	background: #fff;
	border-color: #fff;
}

* + .box-service {
	margin-top: 50px;
}

* + .box-service-text {
	margin-top: 20px;
}

* + .box-service-control {
	margin-top: 30px;
}

.box-service + .box-service {
	margin-top: 0;
}

@media (max-width: 767px) {
	.box-service-reverse .box-service-image {
		top: 25%;
		left: 25%;
		-webkit-transform: translate(-25%, -25%);
		transform: translate(-25%, -25%);
	}
}

@media (min-width: 768px) {
	.box-service {
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-flex-direction: row;
		-ms-flex-direction: row;
		flex-direction: row;
		-webkit-align-items: stretch;
		-ms-flex-align: stretch;
		align-items: stretch;
	}
	.box-service .box-service-body {
		padding: 80px 60px;
	}
	.box-service-reverse {
		-webkit-flex-direction: row-reverse;
		-ms-flex-direction: row-reverse;
		flex-direction: row-reverse;
	}
	.box-service-left {
		-webkit-flex-shrink: 0;
		-ms-flex-negative: 0;
		flex-shrink: 0;
		height: auto;
		width: 35%;
		max-width: 500px;
		min-width: 300px;
	}
	.box-service-body {
		width: 65%;
		-webkit-flex-grow: 1;
		-ms-flex-positive: 1;
		flex-grow: 1;
	}
	.box-service-title,
	.box-service-price {
		font-size: 24px;
	}
	* + .box-service {
		margin-top: 75px;
	}
}

@media (min-width: 992px) {
	.box-service .box-service-body {
		padding: 100px 100px 100px 125px;
	}
	.box-service-left {
		width: 40%;
	}
	.box-service-body {
		width: 60%;
	}
	.box-service-reverse .box-service-body {
		padding-right: 125px;
		padding-left: 100px;
	}
	.box-service-title,
	.box-service-price {
		font-size: 36px;
	}
	* + .box-service-control {
		margin-top: 65px;
	}
}
body {
    background-image: url('images/bg-image-4.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0; /* Remove default margin to ensure full coverage */
    padding: 0; /* Remove default padding to ensure full coverage */
}
       </style>


    </head>

    <body>
        <!-- Top Bar Start -->
        <?php
    include('./include/header.php');
    ?>
        <!-- Nav Bar End -->


        <!-- Page Header Start -->
        <div class="page-header-service">
            <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
                <div class="row">
                    <div class="col-12">
                        <h2>Service</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Service</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                    <p>Our Salon Services</p>
                    <h2>Best Salon and Barber Services for You</h2>
                </div>
               
                <div class="page">
      <main class="page-content" id="perspective">
        <div class="content-wrapper">
          <div id="wrapper">
            <div class="container-fluid booking-container">
            <section class="section-xl bg-periglacial-blue text-center">
              <div class="shell">
                <article class="box-service box-service-dark box-service-reverse">
                  <div class="box-service-left"><img class="box-service-image" src="images/services-1-500x490.png" alt="" width="500" height="490"/>
                  </div>
                  <div class="box-service-body">
                    <div class="box-service-header">
                      <p class="box-service-title">Hair Care</p>                      
                    </div>
                    <div class="box-service-text">
                      <p>Experience the best of hair care with Lyra Salon, your premier beauty destination, is the go-to salon near you for exquisite hair care and pampering experiences.We pride ourselves on being the best hair beauty parlour near you, providing not just services, but a sanctuary for self-care and indulgence. We take pride in being the go-to beauty destination for those seeking the best in hair care treatment services in Kerala. Our expert stylists are dedicated to providing unparalleled hair treatments, precision haircuts, professional hair coloring, and rejuvenating hair spa services using high-quality hair care products, ensuring that your hair receives the premium treatment it deserves. Indulge in a pampering experience with our rejuvenating hair spa treatments. Designed to nourish and revitalize your hair, our spa treatments offer a blissful escape from the everyday hustle, leaving you with silky-smooth and luscious locks. Discover the epitome of hair care and beauty. Book your appointment . Your Premier Hair Care Destination in Kochi, Thrissur, Calicut, Angamaly and Guruvayur!Your journey to beautiful, healthy hair begins here.</p>
                    </div>
                    <a class="btn btn-sm box-service-control "  href="servicedetails.php">Explore Now</a>
                  </div>
                </article>
                <article class="box-service">
                  <div class="box-service-left"><img class="box-service-image" src="images/services-2-500x490.png" alt="" width="500" height="490"/>
                  </div>
                  <div class="box-service-body">
                    <div class="box-service-header">
                      <p class="box-service-title"> Skin Care Treatment</p>                     
                    </div>
                    <div class="box-service-text">
                      <p>Discover radiant skin at its best with our specialized skincare treatments. At Lyra Salon, we believe in nurturing your skin's health and natural beauty. Our experts curate personalized solutions that cleanse, nourish, and rejuvenate, ensuring you leave with a refreshed glow. Elevate your skincare routine with us and embrace the beauty you deserve."Elevate your beauty at Lyra Salon, renowned as the best salon in Thrissur, Guruvayur, Kochi, and Calicut. Our skincare treatments are designed to pamper and protect your skin, unveiling a luminous complexion that exudes confidence. Join us in experiencing the pinnacle of skincare and beauty, only at Lyra Salon."</p>
                    </div><a class="btn btn-sm box-service-control "  href="servicedetails.php">Explore Now</a>
                  </div>
                </article>
                <article class="box-service box-service-dark box-service-reverse">
                  <div class="box-service-left"><img class="box-service-image" src="images/services-3-500x490.png" alt="" width="500" height="490"/>
                  </div>
                  <div class="box-service-body">
                    <div class="box-service-header">
                      <p class="box-service-title">Body Care</p>                      
                    </div>
                    <div class="box-service-text">
                      <p>Indulge in Pure Bliss with our Luxurious Body Care Treatments services. At Lyra Salon, we understand that your body deserves the same level of care as your face. Our body treatments are meticulously designed to rejuvenate, hydrate, and soothe from head to toe. Immerse yourself in relaxation as our skilled therapists pamper you, leaving your skin soft, supple, and glowing. Discover a new level of indulgence at Lyra, the unrivaled salon in Thrissur, Guruvayur, Kochi, and Calicut.</p>
                    </div><a class="btn btn-sm box-service-control " style="width: 50px;" href="servicedetails.php">Explore Now</a>
                  </div>
                </article>         
                    </div>
                  </div>
                </div>
              </div>
            </section>
</div>



            </div>
        </div>
        <!-- Service End -->


        <!-- Footer Start -->
        <?php
    include('./include/footer.php');
    ?>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
