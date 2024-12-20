<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    .container {
      display: flex;
      max-width: 1400px;
      width: 780px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .image-container {
      flex: 1;
      overflow: hidden;

    }

    .image {
      width: 400px;
      height: 100%;
      object-fit: fill;
    }

    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    html,
    body {
      display: grid;
      height: 100%;
      width: 100%;
      place-items: center;
      /* background:#F6F3F0; */
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      /* background: linear-gradient(-135deg, #c850c0, #4158d0); */

    }

    ::selection {
      background: #4158d0;
      color: #fff;
    }

    .wrapper {
      width: 380px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title {
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      line-height: 100px;
      color: #fff;
      user-select: none;
      border-radius: 15px 15px 0 0;
      background: linear-gradient(-135deg, #c850c0, #4158d0);
    }

    .wrapper form {
      padding: 10px 30px 50px 30px;
    }

    .wrapper form .field {
      height: 50px;
      width: 100%;
      margin-top: 20px;
      position: relative;
    }

    .wrapper form .field input {
      height: 100%;
      width: 100%;
      outline: none;
      font-size: 17px;
      padding-left: 20px;
      border: 1px solid lightgrey;
      border-radius: 25px;
      transition: all 0.3s ease;
    }

    .wrapper form .field input:focus,
    form .field input:valid {
      border-color: #4158d0;
    }

    .wrapper form .field label {
      position: absolute;
      top: 50%;
      left: 20px;
      color: #999999;
      font-weight: 400;
      font-size: 17px;
      pointer-events: none;
      transform: translateY(-50%);
      transition: all 0.3s ease;
    }

    form .field input:focus~label,
    form .field input:valid~label {
      top: 0%;
      font-size: 16px;
      color: #4158d0;
      background: #fff;
      transform: translateY(-50%);
    }

    form .content {
      display: flex;
      width: 100%;
      height: 50px;
      font-size: 16px;
      align-items: center;
      justify-content: space-around;
    }

    form .content .checkbox {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    form .content input {
      width: 15px;
      height: 15px;
      background: red;
    }

    form .content label {
      color: #262626;
      user-select: none;
      padding-left: 5px;
    }

    form .content .pass-link {
      color: "";
    }

    form .field input[type="submit"] {
      color: #fff;
      border: none;
      padding-left: 0;
      margin-top: -10px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
      background: linear-gradient(-135deg, #c850c0, #4158d0);
      transition: all 0.3s ease;
    }

    form .field input[type="submit"]:active {
      transform: scale(0.95);
    }

    form .signup-link {
      color: #262626;
      margin-top: 20px;
      text-align: center;
    }

    form .pass-link a,
    form .signup-link a {
      color: #4158d0;
      text-decoration: none;
    }

    form .pass-link a:hover,
    form .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="image-container">
      <img src="img/cont/logimg2.jpg" alt="Background Image" class="image">
    </div>
    <div class="wrapper">
      <div class="title">
        Login Form
      </div>
      <form action="#" method="post">
        <div class="field">
          <input type="email" placeholder="Username or mobile" name="email" class="form-control" required>
        </div>
        <div class="field">
          <input type="password" placeholder="Password" name="password" class="form-control" required>
        </div>
        <div class="field">
          <input type="submit" class="button" name="login" value="Login">
        </div>
        <div class="signup-link">
          Not a member? <a href="registform.php">Signup now</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>

<?php
include './include/db.php';
if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM registration WHERE email = '$email' && password = '$password' ";

  $data = mysqli_query($conn, $query);

  $total = mysqli_num_rows($data);
  //  echo $total;
  if ($total == 1) {

    $_SESSION['user_email'] = $email;
    echo "<script>
              swal({
                  title: 'Successful',
                  text: 'You are Login Successfully',
                  icon: 'success',
                  button: false,
                  timer: 2000
              }).then(function() {
                  window.location.href = 'servicedetails.php';
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

?>