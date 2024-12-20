<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>

    <div class="search">
        <div class="brand">
            <h2>Artika Salon</h2>
        </div>
    </div>

    <div class="search">
        <label>
            <input type="text" placeholder="Search here">
            <!-- <ion-icon name="search-outline"></ion-icon> -->
        </label>
    </div>
    <?php
    $email = $_SESSION['admin'];
    $view = "SELECT * FROM `admin` WHERE email ='$email'";
    $query = mysqli_query($conn, $view);
    $data = mysqli_fetch_assoc($query);
    ?>
    <div class="search1">
        <div>
            <h3><?php echo $data['fname'] ?></h3>
        </div>
    </div>

    <div class="user">
        <a href="">
            <img src="<?php echo $data['profile'] ?>" alt="ADMIN">

        </a>
    </div>

</div>