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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AS | Admin | Create Barber</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .form-group {
        margin-bottom: 20px;
      }

      .error {
        color: red;
      }

      .form-group {
        margin-bottom: 20px;
      }

      .container {
        background-color: aliceblue;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }
    </style>
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
        <!-- ======================== Your Content=========== -->
        <div class="container mt-3">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <h2 class="mb-3" text align="center">Barber's Page</h2>
              <form action="#" method="post" id="projectForm" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="BarberName">Barber Name</label>
                  <input type="text" class="form-control" id="Barbername" name="Barbername" required>
                  <div class="error" id="Barbername_error"></div>
                </div>
                <div class="form-group">
                  <label for="specialist">Specialist</label>
                  <input type="text" class="form-control" id="Specialist" name="Specialist" required>
                  <div class="error" id="Specialist_error"></div>
                </div>
                <div class="form-group">
                  <label for="Extra Work">Extra Work</label>
                  <input type="text" class="form-control" id="Extrawork" name="Extrawork" required>
                  <div class="error" id="Extrawork_error"></div>
                </div>
                <div class="form-group">
                  <label for="skill">Skill and Experience</label>
                  <input type="text" class="form-control" id="skill" name="skill" required>
                  <div class="error" id="skill_error"></div>
                </div>
                <div class="form-group">
                  <label for="packageimage">Barber Image</label>
                  <input type="file" name="pimage" id="packageimage" required>
                </div>
                <button type="submit" class="btn btn-primary" id="submit" value="submit" name="submit">Create</button>
              </form>
            </div>
          </div>
        </div>
        <!-- ======================== Your Content=========== -->
        <?php
        include './include/footer.php';
        ?>
      </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- validation -->
    <script>
      var projectForm = document.getElementById('projectForm');

      projectForm.addEventListener('submit', function(e) {
        if (!validateForm()) {
          e.preventDefault(); // Prevent form submission if validation fails
        }
      });

      function validateForm() {
        var isValid = true;

        var barbername = document.getElementById('Barbername');
        var specialist = document.getElementById('Specialist');
        var extrawork = document.getElementById('Extrawork');
        var skill = document.getElementById('skill');

        setError('Barbername_error', '');
        setError('Specialist_error', '');
        setError('Extrawork_error', '');
        setError('skill_error', '');

        if (barbername.value.trim() === '') {
          setError('Barbername_error', 'Barber Name is required');
          isValid = false;
        } else if (!/^[a-zA-Z\s]+$/.test(barbername.value.trim())) {
          setError('Barbername_error', 'Invalid characters in name');
          isValid = false;
        }

        if (specialist.value.trim() === '') {
          setError('Specialist_error', 'Specialist is required');
          isValid = false;
        }

        if (extrawork.value.trim() === '') {
          setError('Extrawork_error', 'Extra Work is required');
          isValid = false;
        }

        if (skill.value.trim() === '') {
          setError('skill_error', 'Skill is required');
          isValid = false;
        }
        return isValid;
      }

      function setError(id, message) {
        const errorElement = document.getElementById(id);
        errorElement.innerHTML = message;
      }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./notif.js"></script>
  </body>

  </html>

<?php
  if (isset($_POST['submit'])) {
    $barbername = mysqli_real_escape_string($conn, $_POST['Barbername']);
    $specialist = mysqli_real_escape_string($conn, $_POST['Specialist']);
    $extrawork = mysqli_real_escape_string($conn, $_POST['Extrawork']);
    $skill = mysqli_real_escape_string($conn, $_POST['skill']);
    $file_name = $_FILES['pimage']['name'];
    $file_temp = $_FILES['pimage']['tmp_name'];
    $folder = 'barberimages/' . $file_name;
    if (move_uploaded_file($file_temp, $folder)) {
    } else {
      die("Error uploading file: " . $_FILES['pimage']['error']);
    }
    // Check if the data already exists in the database
    $checkQuery = "SELECT * FROM  barbers WHERE Barbername = '$barbername'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (!$checkResult) {
      die("Error checking data: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($checkResult) > 0) {
      echo "<script>
            swal({
                title: 'Failed',
                text: 'Data already exists',
                icon: 'error',
                button: 'OK'
            });
          </script>";
    } else {
      // Data doesn't exist, proceed with insertion
      $sql = "INSERT INTO `barbers` (`bid`, `barbername`, `specialist`, `extrawork`, `skill`, `bphoto`)
             VALUES ('', '$barbername', '$specialist', '$extrawork', '$skill', '$folder')";
      $query = mysqli_query($conn, $sql);
      if (!$query) {
        echo "<script>
              Swal({
                  title: 'Error!',
                  text: 'Registration Failed. Please try again later.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              }).then(function() {
                  window.location.href = 'createbarber.php';
              });
          </script>";
      } else {
        echo "<script>
              swal({
                  title: 'Barber Select Successfully',
                  text: 'Welcome..!!',
                  icon: 'success',
                  button: 'Ok, Done!',
              }).then(function() {
                  window.location.href = 'managebarber.php';
              });
            </script>";
      }
    }
  }
}
?>