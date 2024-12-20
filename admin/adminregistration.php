<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Admin / Registration Form</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    /* Add this CSS to your existing styles */
    .form-label input[type="radio"] {
      display: none;
    }

    .form-label label {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .form-label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    .form-label input[type="radio"]:checked+.dot {
      background: #9b59b6;
      border-color: #d9d9d9;
    }

    /* other */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container {
      max-width: 500px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    .container .title::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
      margin-bottom: 20px;
    }

    .content form .user-details .input-box {
      margin-bottom: 15px;
    }

    .content form .input-box span.details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .content form .input-box input {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      transition: border-color 0.3s ease;
    }

    .content form .input-box input:focus,
    .content form .input-box input:valid {
      border-color: #9b59b6;
    }

    .content form .gender-details .gender-title {
      font-size: 20px;
      font-weight: 500;
    }

    .content form .category {
      display: flex;
      width: 80%;
      margin: 14px 0;
      justify-content: space-between;
    }

    .content form .category label {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .content form .category label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    .content form input[type="radio"] {
      display: none;
    }

    .content form .button {
      height: 45px;
      width: 100%;
      margin-top: 40px;
    }

    .content form .button input {
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.3s ease;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .button input:hover {
      background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }

    .content form .input-box .error {
      color: red;
    }

    @media(max-width: 584px) {
      .container {
        max-width: 100%;
      }

      .content form .user-details .input-box {
        width: 100%;
      }

      .content form .category {
        width: 100%;
      }
    }

    @media(max-width: 459px) {
      .content form .category {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>




  <div class="container">
    <div class="title">Register Here</div>
    <div class="content">
      <form action="#" method="post" id="projectForm" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
            <div class="error" id="fname_error"></div>
          </div>
          <div class="input-box">
            <label for="mobile" class="form-label">Contact</label>
            <input type="tel" class="form-control" id="mobile" name="phone" required>
            <div class="error" id="mobile_error"></div>
          </div>
          <div class="input-box">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="error" id="email_error"></div>
          </div>
          <div class="input-box">
            <label for="gender" class="form-label gender-details">Gender</label>
            <div class="category">
              <label for="male" class="form-label">
                <input type="radio" id="male" name="gender" value="male" required>
                <span class="dot"></span> Male
              </label>
              <label for="female" class="form-label">
                <input type="radio" id="female" name="gender" value="female" required>
                <span class="dot"></span> Female
              </label>
              <div class="error" id="gender_error"></div>
            </div>
          </div>
          <div class="input-box">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="error" id="password_error"></div>
          </div>
        </div>
        <div class="input-box">
        <label for="password" class="form-label">Profile Image</label>
                <input type="file" placeholder="Profile Photo" name="pimage" id="packageimage" required>
              </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
  <!-- validation -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    var projectForm = document.getElementById('projectForm');

    projectForm.addEventListener('submit', function(e) {
      if (!validateForm()) {
        e.preventDefault(); // Prevent form submission if validation fails
      }
    });

    function validateForm() {
      var isValid = true;

      var fname = document.getElementById('fname');
      var phone = document.getElementById('mobile');
      var email = document.getElementById('email');
      var password = document.getElementById('password');

      setError('fname_error', '');
      setError('mobile_error', '');
      setError('email_error', '');
      setError('password_error', '');

      if (fname.value.trim() === '') {
        setError('fname_error', 'Name is required');
        isValid = false;
      } else if (!/^[a-zA-Z\s]+$/.test(fname.value.trim())) {
        setError('fname_error', 'Invalid characters in name');
        isValid = false;
      }

      if (phone.value.trim() === '') {
        setError('mobile_error', 'Mobile Number is required');
        isValid = false;
      } else if (!/^\d{10}$/.test(phone.value.trim())) {
        setError('mobile_error', 'Mobile Number must contain exactly 10 digits and no characters or spaces');
        isValid = false;
      }

      if (email.value.trim() === '') {
        setError('email_error', 'Email is required');
        isValid = false;
      }

      if (password.value.trim() === '') {
        setError('password_error', 'Password is required');
        isValid = false;
      } else if (password.value.trim().length > 8) {
        setError('password_error', 'Password must be 8 characters or less');
        isValid = false;
      } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z\d!@#$%^&*(),.?":{}|<>]+$/.test(password.value.trim())) {
        setError('password_error', 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character');
        isValid = false;
      }

      return isValid;
    }

    function setError(id, message) {
      const errorElement = document.getElementById(id);
      errorElement.innerText = message;
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>





<?php
include '../include/db.php';

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];

  // Check if a new image is uploaded
  if ($_FILES['pimage']['size'] > 0) {
    $file_name = $_FILES['pimage']['name'];
    $file_temp = $_FILES['pimage']['tmp_name'];
    $folder = 'profilephoto/' . $file_name;
    move_uploaded_file($file_temp, $folder);
  }

  // Check if the data already exists in the database
  $checkQuery = "SELECT * FROM admin WHERE phone ='$phone' OR email = '$email'";
  $checkResult = mysqli_query($conn, $checkQuery);

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
    $sql = "INSERT INTO admin (fname, phone, email, gender, password, profile) 
            VALUES ('$fname', '$phone', '$email', '$gender', '$password', '$folder')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
      echo "<script>
                swal({
                    title: 'Successful',
                    text: 'Data inserted successfully',
                    icon: 'success',
                    button: false,
                    timer: 2000
                }).then(function() {
                    window.location.href = 'index.php';
                });
              </script>";
    } else {
      echo "<script>
                swal({
                    title: 'Failed',
                    text: 'Invalid data',
                    icon: 'error',
                    button: 'OK'
                });
              </script>";
    }
  }
}
?>