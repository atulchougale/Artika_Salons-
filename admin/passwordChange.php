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
  <title>AS | Admin | Password Change</title>
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

    <style>
      .error {
        color: red;
      }
    </style>
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


        <div class="container">
          <div class="wrapper">
            <div class="title">Password Reset
            </div>
            <form action="#" method="post" id="projectForm">
              <div class="field">
                <input type="password" placeholder="Old Password" name="oldpassword" id="oldpassword" required>
              </div>
              <p class="error" id="oldpassword_error"></p>

              <div class="field">
                <input type="password" placeholder="Password" name="password" id="password" required>
              </div>
              <p class="error" id="password_error"></p>

              <div class="field">
                <input type="password" placeholder="Conform Password" name="cpassword" id="cpassword" required>
              </div>
              <p class="error" id="cpassword_error"></p>
              <div class="field">
                <input type="submit" name="submit" value="Reset Password">
              </div>
            </form>
          </div>
        </div>


        <?php
        include "./include/footer.php";
        ?>

      </div>
    </div>




    <!-- Bootstrap Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!--animate-->

    <!-- /Bootstrap Core JavaScript -->

    <script src="assets/js/main.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./notif.js"></script>
    <script>
      var projectForm = document.getElementById('projectForm');

      projectForm.addEventListener('submit', function(e) {
        if (!validateForm()) {
          e.preventDefault(); // Prevent form submission if validation fails
        }
      });

      function validateForm() {
        var isValid = true;


        var oldpassword = document.getElementById('oldpassword');


        var password = document.getElementById('password');


        setError('oldpassword_error', '');
        setError('password_error', '');
        setError('cpassword_error', '');

        if (oldpassword.value.trim() === '') {
          setError('oldpassword_error', 'Confirm Old Password is required');
          isValid = false;
        } else if (oldpassword.value.trim() == password.value.trim()) {
          setError('oldpassword_error', 'Old Password and New Password is Same please Make New Password');
          isValid = false;

        } else {
          setError('password_error', '');

          if (!/(?=.*[a-zA-Z])/.test(oldpassword.value.trim())) {
            setError('oldpassword_error', 'oldpassword must include at least one letter');
            isValid = false;
          }

          if (!/(?=.*\d)/.test(oldpassword.value.trim())) {
            setError('oldpassword_error', 'oldpassword must include at least one digit');
            isValid = false;
          }

          if (!/(?=.*[!@#$%^&*(),.?":{}|<>])/.test(oldpassword.value.trim())) {
            setError('oldpassword_error', 'oldpassword must include at least one special character (!@#$%^&*(),.?":{}|<>)');
            isValid = false;
          }

          // if (!/^.{8,}$/.test(oldpassword.value.trim())) {
          //   setError('oldpassword_error', 'oldpassword must be at least 8 characters long');
          //   isValid = false;
          // }
        }

        if (password.value.trim() === '') {
          setError('password_error', 'Password is required');
          isValid = false;
        } else {
          setError('password_error', '');

          if (!/(?=.*[a-zA-Z])/.test(password.value.trim())) {
            setError('password_error', 'Password must include at least one letter');
            isValid = false;
          }

          if (!/(?=.*\d)/.test(password.value.trim())) {
            setError('password_error', 'Password must include at least one digit');
            isValid = false;
          }

          if (!/(?=.*[!@#$%^&*(),.?":{}|<>])/.test(password.value.trim())) {
            setError('password_error', 'Password must include at least one special character (!@#$%^&*(),.?":{}|<>)');
            isValid = false;
          }

          if (!/^.{8,}$/.test(password.value.trim())) {
            setError('password_error', 'Password must be at least 8 characters long');
            isValid = false;
          }
        }

        if (cpassword.value.trim() === '') {
          setError('cpassword_error', 'Confirm Password is required');
          isValid = false;
        } else if (cpassword.value.trim() !== password.value.trim()) {
          setError('cpassword_error', 'Passwords do not match');
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
  if (isset($_POST['submit'])) {


    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
    $uemail = $_SESSION['admin'];

    $update = "UPDATE `admin` SET  `Password`= '$password' WHERE Password='$oldpassword' and email='$uemail'";



    $query = mysqli_query($conn, $update);

    if ($query) {

      echo  "<script>
                swal({
                    title: 'Successfully!',
                    text: 'Password Changed Successfully',
                    icon: 'success',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'setting.php';
                });
              </script>";
    } else {
      echo  "<script>
                swal({
                    title: 'Failed!',
                    text: 'Old Password Is Not Match',
                    icon: 'error',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'setting.php';
                });
              </script>";
    }
  }
}
?>