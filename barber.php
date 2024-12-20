<?php
session_start();
include './include/db.php';
$id = $_GET['bid'];

$query = "SELECT * FROM `barbers` WHERE bid='$id'";
$query_show = mysqli_query($conn, $query);
$show = mysqli_fetch_assoc($query_show);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Barber</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .pic {
            width: 100%;
            aspect-ratio: 1/1;
            border-radius: 2rem;
            background: linear-gradient(45deg, transparent, #4db5ff, transparent);
            display: grid;
            place-items: center;
        }

        .pic img {
            width: 100%;
            border-radius: 2rem;
            overflow: hidden;
            transform: rotate(10deg);
            transition: all 400ms ease;
        }

        .pic img:hover {
            transform: rotate(0deg);


        }

        .con {
            display: grid;
            align-items: center;
            grid-template-columns: 50% 35%;
            gap: 6%;
            padding: 30px
        }

        @media ( max-width: 768px){
            
        .con {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding: 30px
        }
        }
            
        
        .text {


            margin-bottom: 100px;
            line-height: 1.5;
            padding: 10px;
            text-align: center;
        }

        .contai {
            position: relative;

            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            transform-style: preserve-3d;
            perspective: 500px;
            margin: auto;
            padding-bottom: 20px;
        }

        .contai .bo {
            position: relative;
            width: 230px;
            height: 230px;
            background: #000;
            transition: 0.5s;
            transform-style: preserve-3d;
            overflow: hidden;
            margin-right: 15px;
            margin-top: 45px;
        }

        .contai:hover .bo {
            transform: rotateY(25deg);
        }

        .contai .bo:hover~.bo {
            transform: rotateY(-25deg);
        }

        .contai .bo:hover {
            transform: rotateY(0deg) scale(1.25);
            z-index: 1;
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.5);
        }

        .contai .bo .imgBx {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .contai .bo .imgBx:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(255, 0, 0, 0.555), #0000007c);
            z-index: 1;
            opacity: 0;
            transition: 0.5s;
            mix-blend-mode: multiply;
        }

        .contai .bo:hover .imgBx:before {
            opacity: 1;
        }

        .contai .bo .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contai .bo .content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            display: flex;
            padding: 10px;
            align-items: flex-end;
            box-sizing: border-box;
        }

        .contai .bo .content h2 {
            color: #fff;
            transition: 0.5s;
            text-transform: uppercase;
            margin-bottom: 5px;
            font-size: 20px;
            transform: translateY(200px);
            transition-delay: 0.3s;
        }

        .contai .bo:hover .content h2 {
            transform: translateY(0px);
        }

        .contai .bo .content p {
            color: #fff;
            transition: 0.5s;
            font-size: 14px;
            transform: translateY(200px);
            transition-delay: 0.4s;
        }

        .contai .bo:hover .content p {
            transform: translateY(0px);
        }
        strong{
            color: #d5b981;
            font-size: 25px;
            font-weight: 800;
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
    <div class="page-header-contact">
        <div class="container price1 wow zoomIn animated animated " data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Barber</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Barber</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->

    <div class="team">
        <div class="container">
            <div class="ba">
                <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">
                    <p>Our Barber Team</p>
                    <h2>Meet Our Hair Cut Expert Barber</h2>
                </div>


            </div>
        </div>
    </div>
    </div>
    <div class="container shadow-lg rounded ">
        <div class="con">


            <div class="text">
                <div class="text-center">
                    <h1 style=" margin-bottom:20px; font-family: 'Protest Riot', sans-serif; color: rgb(201, 51, 133); text-shadow: 3px 2px black; font-size: 50px; display: block;">
                        <?php echo $show['barbername'] ?></h1>
                </div>
                <div class="text1">
                    <h4 style="margin-bottom:20px;font-size: 25px; color: black;"><strong>Specialist:-</strong> <?php echo $show['specialist'] ?>.</h4>
                    <h4 style="margin-bottom:20px;font-size: 25px; color: black;"><strong>Extra Work:-</strong> <?php echo $show['extrawork'] ?>.</h4>
                    <h4 style="margin-bottom:20px;font-size: 25px; color: black;"><strong>Skills And Experience:-</strong></h4>


                    <ul style="font-size: 20px; color: black;">
                        <li><?php echo $show['skill'] ?></li>

                    </ul>
                </div>
            </div>

            <div class="pic">
                <img src="./admin/<?php echo $show['bphoto']; ?>" alt="Team Image" width="450px" height="450px">

            </div>

        </div>

    </div>

    <div class="container mt-4 rounded shadow-lg">

        <div class="team">
            <div class="container">
                <div class="ba">
                    <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">
                        <p></p>
                        <h2>My Gallery</h2>
                    </div>


                </div>
            </div>
        </div>

        <div class="contai  row">
            <div class="bo col-md-3 col-sm-4">
                <div class="imgBx">
                    <img src="img/bar1.jpg">
                </div>
                <div class="content">

                </div>
            </div>
            <div class="bo col-md-3 col-sm-4">
                <div class="imgBx">
                    <img src="img/bar2.jpg">
                </div>
                <div class="content">

                </div>
            </div>
            <div class="bo col-md-3 col-sm-4">
                <div class="imgBx">
                    <img src="img/bar3.jpg">
                </div>
                <div class="content">

                </div>
            </div>
            <div class="bo col-md-3 col-sm-4">
                <div class="imgBx">
                    <img src="img/bar4.jpg">
                </div>
                <div class="content">

                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

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


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>