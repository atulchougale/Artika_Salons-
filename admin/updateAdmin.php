<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
  header('location:index.php');
} else {
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>AS | Admin |Admin Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
      addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
        window.scrollTo(0, 1);
      }
    </script>
    <!--  -->
    <!--  -->
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />

  </head>

  </head>

  <body>


    <!-- =============== Navigation ================ -->
    <div class="container1">
      <?php
      include './include/sidebar.php';
      ?>

      <!-- ========================= Main ==================== -->
      <div class="main">
        <?php
        include './include/topbar.php';
        ?>

        <?php

        include 'db.php';

        $id = $_GET['uid'];

        $view = "SELECT * FROM `admin` WHERE id='$id'";
        $query = mysqli_query($conn, $view);
        $data = mysqli_fetch_assoc($query)

        ?>

        <div class="container">
          <div class="wrapper">
            <div class="title">Update Detail
            </div>
            <form action="#" method="post" enctype="multipart/form-data" id="projectForm" enctype="multipart/form-data">
              <div class="field">
                <input type="text" placeholder="Full Name" name="name" id="name1" value="<?php echo $data['fname'] ?>" required>

              </div>
              <p class="error" id="name_error"></p>
              <div class="field">
                <input type="email" placeholder="Email" name="email" id="email" value="<?php echo $data['email'] ?>" required>
              </div>
              <p class="error" id="email_error"></p>
              <div class="field">
                <input type="text" placeholder="Phone No." name="phone" id="phone" value="<?php echo $data['phone'] ?>" required>
              </div>
              <p class="error" id="phone_error"></p>

              <div class="field">
                <input type="file" placeholder="Profile Photo" name="pimage" id="packageimage">
              </div>
              <div class="field">
                <input type="submit" name="submit" value="Update">
              </div>
            </form>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>


      <script>
        var toggle = true;

        $(".sidebar-icon").click(function() {
          if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
              "position": "absolute"
            });
          } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
              $("#menu span").css({
                "position": "relative"
              });
            }, 400);
          }

          toggle = !toggle;
        });
      </script>
      <!--js -->
      <script src="js/jquery.nicescroll.js"></script>
      <script src="js/scripts.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!--animate-->

      <!-- /Bootstrap Core JavaScript -->
      <!-- morris JavaScript -->
      <script src="js/raphael-min.js"></script>
      <script src="js/morris.js"></script>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <script>
        var projectForm = document.getElementById('projectForm');

        projectForm.addEventListener('submit', function(e) {
          if (!validateForm()) {
            e.preventDefault(); // Prevent form submission if validation fails
          }
        });

        function validateForm() {
          var isValid = true;

          var name = document.getElementById('name1');
          var email = document.getElementById('email');
          var phone = document.getElementById('phone');

          var password = document.getElementById('password');


          setError('name_error', '');
          setError('email_error', '');
          setError('phone_error', '');

          setError('password_error', '');
          setError('cpassword_error', '');

          if (name.value.trim() === '') {
            setError('name_error', 'Name is required');
            isValid = false;
          } else if (!/^[a-zA-Z\s]+$/.test(name.value.trim())) {
            setError('name_error', 'Invalid characters in name');
            isValid = false;
          }

          if (email.value.trim() === '') {
            setError('email_error', 'Email is required');
            isValid = false;
          }

          if (phone.value.trim() === '') {
            setError('phone_error', 'Phone Number is required');
            isValid = false;
          } else if (!/^\d{10}$/.test(phone.value.trim())) {
            setError('phone_error', 'Phone Number must contain exactly 10 digits and no characters or spaces');
            isValid = false;
          }




          return isValid;
        }

        function setError(id, message) {
          const errorElement = document.getElementById(id);
          errorElement.innerHTML = message;
        }
      </script>
  </body>

  </html>

<?php
  $id = $_GET['uid'];
  $admin = $_SESSION['admin'];
  if (isset($_POST['submit'])) {


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);



    // Check if a new image is uploaded
    if ($_FILES['pimage']['size'] > 0) {
      $file_name = $_FILES['pimage']['name'];
      $file_temp = $_FILES['pimage']['tmp_name'];
      $folder = 'profilephoto/' . $file_name;
      move_uploaded_file($file_temp, $folder);


      // Update all fields, including the new image
      $update = "UPDATE admin SET `fname` ='$name', `email` = '$email', `phone` = '$phone', `profile` = '$folder' WHERE id = '$id' ";
    } else {
      // No new image, update other fields only
      $update = "UPDATE admin SET `fname` ='$name', `email` = '$email', `phone` = '$phone' WHERE id = '$id'  ";
    }
    $query = mysqli_query($conn, $update);

    if (!$query) {

      echo  "<script>
                swal({
                    title: 'Details Updated Fail!',
                    text: 'You can Update Your Data only. ',
                    icon: 'error',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'setting.php';
                });
              </script>";

      
    } else {
      echo  "<script>
                swal({
                    title: 'Successfully!',
                    text: 'Details Updated Successfully',
                    icon: 'success',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'setting.php';
                });
              </script>";
    }
  }
}
?>