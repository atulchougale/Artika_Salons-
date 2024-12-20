<?php
session_start();



// Include database connection
include('./include/db.php');


// Fetch services from the database
$sql = "SELECT * FROM services";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch and store the data in an array
    $servicesData = array();
    while ($row = $result->fetch_assoc()) {
        $servicesData[] = $row;
    }
} else {
    // Handle the case where no services are found
    $servicesData = array();
}


?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Artika Saloon | Service Details</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
    <link rel="stylesheet" href="servicestyle.css">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .search-input {
            padding: 10px;
            /* Increase padding to make the search bar taller */
            text-align: center;
            font-size: 16px;
            /* Increase font size for better visibility */
            width: 550px;
        }

        body {
            background-image: url('images/bg-image-1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        .filter-select {
            padding: 5px;
        }

        .booking-container {
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .servbg {
            margin: 50px auto;
            background-image: url('images/bg-image-4.jpg');
            background-size: cover;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-service-option-image {
            width: 100%;
            height: 50%;
        }

        .card-service-option {
            height: 400px;
            width: auto;
        }

        .filter-navbar {
            background-color: #f8f9fa;
            padding: 15px 0;
            overflow: scroll;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            white-space: nowrap;
            border-bottom: 2px solid #1d1d1d;

        }

        .filter-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
            transition: transform 0.3s ease;
        }

        .filter-item {
            display: inline-block;
            margin-right: 10px;
        }

        .filter-item a {
            text-decoration: none;
            padding: 10px;

        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .col {
            flex: 1;
        }

        .search-filter-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        body {
            background-image: url('images/bg-image-1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        .bbutton {
            border: 2px solid #1d1d1d;
            padding: 10px;
            padding-top: 10px;
            height: 40px;
            margin-bottom: 20px;
            background-color: greenyellow;
            color: #1d1d1d;
            font-weight: 600;

        }

        .bbutton:hover {
            color: greenyellow;
            border: 2px solid greenyellow;
            background-color: #1d1d1d;
        }

        @media (max-width: 767.98px) {

            p+.btn,
            .p+.btn {
                margin-top: 20px;
            }

            *+.card-service-option-panel {
                margin-top: 5px;
            }

            .size {
                font-size: 15px;
            }

            .card-service-option {
                height: 420px;
            }
        }

        @media (max-width: 767.98px) {

        }

    </style>

</head>

<body>

    <div class="container booking-container">
        <main class="page-content " id="perspective">
            <div class="content-wrapper">
                <div class="custom-progress">
                    <div class="custom-progress-body" style="width: 0;"></div>
                </div>
                <div id="wrapper">

                    <section class="section-xl bg-periglacial-blue  one-screen-page-content text-center">
                        <div class="text-center mt-4">
                            <a class="btn bbutton" href="service.php">Back to Services Page</a>
                        </div>
                        <div class="shell">
                            <h2>CHOOSE a SERVICE</h2>
                            <div class="p text-width-medium">
                                <p class="big"><b>On this page, you can select a service that you need. Here are
                                        presented only the most popular barbering services we provide. If you require a
                                        personalized barbering service, please contact us.</b></p>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <nav class="navbar filter-navbar">
                                        <ul class="filter-list">
                                            <li class="filter-item gender-filter-item "><a href="#"
                                                    class="active bbutton btn" data-gender="all">All</a></li>
                                            <li class="filter-item gender-filter-item"><a href="#"
                                                    class="active bbutton btn" data-gender="male">Male</a></li>
                                            <li class="filter-item gender-filter-item"><a href="#"
                                                    class="active bbutton btn" data-gender="female">Female</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-4">
                                    <nav class="navbar filter-navbar">
                                        <ul class="filter-list">
                                            <li class="filter-item category-filter-item "><a href="#"
                                                    class="active bbutton btn" data-category="all">All</a></li>
                                            <li class="filter-item category-filter-item"><a href="#"
                                                    class="active bbutton btn" data-category="haircare">Hair Care</a>
                                            </li>
                                            <li class="filter-item category-filter-item"><a href="#"
                                                    class="active bbutton btn" data-category="skincare">Skin Care</a>
                                            </li>
                                            <li class="filter-item category-filter-item"><a href="#"
                                                    class="active bbutton btn" data-category="bodycare">Body Care</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-4">
                                    <div class="search-filter-container">
                                        <input type="text" id="search-input" class="search-input"
                                            placeholder="Search services">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <nav class="navbar filter-navbar filter-navbar-third">
                                        <ul class="filter-list">
                                            <li class="filter-item sub-category-filter-item"><a href="#"
                                                    class="active btn bbutton" data-category="all">All</a></li>
                                            <?php
                                            // Fetch unique subServiceStyleTitles from servicesData
                                            $subServiceName = array_unique(array_column($servicesData, 'subServiceName'));
                                            foreach ($subServiceName as $subServiceName):
                                                ?>
                                                <li class="filter-item sub-category-filter-item"><a href="#"
                                                        class="active btn bbutton"
                                                        data-category="<?php echo $subServiceName; ?>">
                                                        <?php echo $subServiceName; ?>
                                                    </a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="range range-50">
                                <?php foreach ($servicesData as $service): ?>
                                    <div class="cell-xs-6 cell-md-3">
                                        <article class="card-service-option shadow"
                                            data-gender="<?php echo $service['gender']; ?>"
                                            data-category="<?php echo $service['mainService']; ?>"
                                            data-title="<?php echo $service['subServiceName']; ?>">
                                            <img class="card-service-option-image"
                                                src="admin/<?php echo $service['subServiceStyleImage']; ?>" alt="" />
                                            <p class="card-service-option-title">
                                                <?php echo $service['subServiceStyleTitle']; ?>
                                            </p>
                                            <div class="card-service-option-panel">
                                                <p class="card-service-option-text"><b>
                                                        <?php echo $service['subServiceStyleDescription']; ?>
                                                    </b> </p>
                                                <a class="btn btn-xs bbutton card-service-option-control"
                                                    href="step-2.php?sid=<?php echo $service['sid']; ?>">Choose</a>
                                            </div>
                                            <div class="card-service-option-panel">
                                                <p class="card-service-option-text size"><b>
                                                        <?php echo '$' . $service['subServiceStylePrice']; ?>
                                                    </b></p>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <?php

            if (isset($_REQUEST['sid'])) {
                $id = $_GET['sid'];


                $query = "SELECT subServiceStyleTitle  FROM services WHERE sid = '$id'";
                $data = mysqli_query($conn, $query);
                $view = mysqli_fetch_assoc($data);
                $stitle = $view['subServiceStyleTitle'];

                if ($view) {

                    $_SESSION['selected_service_id'] = $id;
                    $_SESSION['selected_service_name'] = $stitle;

                } else {
                    echo "Error  wile selecting style";
                }
            }
            $conn->close();
            ?>
        </main>
    </div>
    <script src="servicejs/core.min.js"></script>
    <script src="servicejs/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <script>
    document.addEventListener("DOMContentLoaded", function () {
        const genderFilterItems = document.querySelectorAll(".gender-filter-item");
        const categoryFilterItems = document.querySelectorAll(".category-filter-item");
        const subCategoryFilterItems = document.querySelectorAll(".sub-category-filter-item");
        const searchInput = document.getElementById("search-input");
        const serviceContainer = document.querySelector(".range-50");
        const thirdNavbar = document.querySelector(".filter-navbar-third"); // Add this line
        let originalServicesOrder = [];
        let selectedGender = "all";
        let selectedCategory = "all";
        let selectedSubCategory = "all";

        // Store the original order of services
        const serviceOptions = Array.from(document.querySelectorAll(".card-service-option"));
        originalServicesOrder = [...serviceOptions];

        genderFilterItems.forEach((filterItem) => {
            filterItem.addEventListener("click", handleGenderFilter);
        });

        categoryFilterItems.forEach((filterItem) => {
            filterItem.addEventListener("click", handleCategoryFilter);
        });

        subCategoryFilterItems.forEach((filterItem) => {
            filterItem.addEventListener("click", handleSubCategoryFilter);
        });

        searchInput.addEventListener("input", handleSearch);

        function handleGenderFilter(event) {
            event.preventDefault();
            selectedGender = event.target.dataset.gender || "all";
            filterServices();
        }

        function handleCategoryFilter(event) {
            event.preventDefault();
            selectedCategory = event.target.dataset.category || "all";
            filterServices();
            updateThirdNavbar(); // Add this line
        }

        function handleSubCategoryFilter(event) {
            event.preventDefault();
            selectedSubCategory = event.target.dataset.category || "all";
            filterServices();
        }

        function handleSearch() {
            filterServices();
        }

        function filterServices() {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredServices = getFilteredServices(searchTerm);
            rearrangeServices(filteredServices);
        }

        function getFilteredServices(searchTerm) {
            return originalServicesOrder.filter((option) => {
                const gender = option.dataset.gender.toLowerCase();
                const category = option.dataset.category.toLowerCase();
                const subCategory = option.dataset.title.toLowerCase();
                const title = option.querySelector(".card-service-option-title").innerText.toLowerCase();

                const genderMatch = selectedGender === "all" || gender === selectedGender;
                const categoryMatch = selectedCategory === "all" || category === selectedCategory;
                const subCategoryMatch = selectedSubCategory === "all" || subCategory.toLowerCase() === selectedSubCategory.toLowerCase();
                const titleMatch = searchTerm === "" || title.includes(searchTerm);

                return genderMatch && categoryMatch && subCategoryMatch && titleMatch;
            });
        }

        function rearrangeServices(filteredServices) {
            serviceContainer.innerHTML = "";
            filteredServices.forEach((option) => {
                serviceContainer.appendChild(option.cloneNode(true));
            });
        }

        // Function to update the third navbar based on the selected filter from the second navbar
        function updateThirdNavbar() {
            thirdNavbar.innerHTML = ""; // Clear existing buttons

            // Fetch unique subServiceStyleTitles based on the selected filter from the second navbar
            const filteredServices = getFilteredServices("");
            const subServiceNames = Array.from(new Set(filteredServices.map(service => service.dataset.title)));

            // Create buttons for each subServiceName
            subServiceNames.forEach(subServiceName => {
                const button = document.createElement("a");
                button.href = "#";
                button.classList.add("active", "btn", "bbutton");
                button.dataset.category = subServiceName.toLowerCase();
                button.innerText = subServiceName;
                button.addEventListener("click", handleThirdNavbarButtonClick);
                thirdNavbar.appendChild(button);
            });
        }

        // Function to handle button click in the third navbar
        function handleThirdNavbarButtonClick(event) {
            event.preventDefault();
            selectedSubCategory = event.target.dataset.category || "all";
            filterServices();
        }
    });
</script>

</body>

</html>