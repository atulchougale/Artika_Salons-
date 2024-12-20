<?php
// Start the session
session_start();
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
// Redirect to the login page
echo"<script>
alert ('LogOut Successfully');

</script>";
header('location:index.php');

exit();
?>