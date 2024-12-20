<?php
include 'db.php';


// ******************users****************//

if (isset($_POST['data'])) {
    $sql = "SELECT COUNT(*) as count FROM registration WHERE noti = 'unseen'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_row($result);
        echo $row[0];
    } else {
        echo 0;
    }
}


if (isset($_POST['update'])) {
    $update = "UPDATE registration set noti='seen' WHERE noti = 'unseen' ";
    mysqli_query($conn, $update);
}

// ******************contacts****************//
if (isset($_POST['data1'])) {
    $sql = "SELECT COUNT(*) as count FROM  contacts WHERE noti = 'unseen'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_row($result);
        echo $row[0];
    } else {
        echo 0;
    }
}


if (isset($_POST['update1'])) {
    $update = "UPDATE  contacts set noti='seen' WHERE noti = 'unseen' ";
    mysqli_query($conn, $update);
}


// *****************enquires****************//

if (isset($_POST['data2'])) {
    $sql = "SELECT COUNT(*) as count FROM courseregistration WHERE noti = 'unseen'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_row($result);
        echo $row[0];
    } else {
        echo 0;
    }
}


if (isset($_POST['update2'])) {
    $update = "UPDATE courseregistration set noti='seen' WHERE noti = 'unseen' ";
    mysqli_query($conn, $update);
}



// ***********************issues******************//


if (isset($_POST['data3'])) {
    $sql = "SELECT COUNT(*) as count FROM serviceapointment WHERE noti = 'unseen'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_row($result);
        echo $row[0];
    } else {
        echo 0;
    }
}


if (isset($_POST['update3'])) {
    $update = "UPDATE serviceapointment set noti='seen' WHERE noti = 'unseen' ";
    mysqli_query($conn, $update);
}