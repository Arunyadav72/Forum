<?php
//database connection
include './partials/_databaseConnection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <style>
        #header {
            height: 70vh;
        }

        @media screen and (max-width: 1000px) {
            #header {
                /* Your styles for screens smaller than 768px */
                height: auto;
            }
        }
    </style>
</head>

<body style="background-color: #f6f9ff;">
    <header>
        <?php include './partials/_header.php'; ?>
    </header>

    <main class="container-fluid" id="header">
        <div class="row h-100">
            <div class="col-12 px-0 h-100">
                <div id="carouselExampleIndicators" class="carousel slide h-100">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active">
                            <img src="./Image/1000_F_325015501_0OREXfdOKXVEkRb3CoULxDDMgGy9gPNW.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./Image/1000_F_325015501_0OREXfdOKXVEkRb3CoULxDDMgGy9gPNW.jpg" class=" w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./Image/1000_F_325015501_0OREXfdOKXVEkRb3CoULxDDMgGy9gPNW.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Browse Category -->
    <section class="container-fluid container">
        <h2 class="text-center my-5 px-3 pb-1 border-bottom border-3 border-dark" style=" width:fit-content; margin:0 auto; ">iDiscuss - Browse Categories</h2>

        <div class="row mb-4 gy-5">
            <?php
            $sql = "SELECT * FROM categories";
            $statement = $conn->prepare($sql);
            $statement->execute();

            if ($statement->rowCount()) {
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $categoryId = $row['category_id'];
                    $categoryName = $row['category_name'];
                    $categoryDescription = $row['category_description'];

                    echo '<div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
                        <div class="card" style="width:20rem;">
                            <img src="./Image/th.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $categoryName . '</h5>
                                <p class="card-text">';
                    echo substr($categoryDescription, 0, 100) . '...';
                    echo '</p>
                                <a href="threadslist.php?category-id=' . $categoryId . '" class="btn btn-success">View Threads</a>
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="features pt-5">
        <div class="container">

            <div class="section-title text-center pb-5">
                <h2>Features</h2>
                <p>Our Most Remarkable Features</p>
            </div>

            <div class="row">
                <div class="image col-12 d-lg-none d-flex align-items-stretch justify-content-center">
                    <img src="assets/img/features.svg" class="img-fluid" alt="">
                </div>
                <div class="col-xl-12 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="row g-lg-5 g-3">
                            <div class="col-md-4 icon-box d-flex gap-3">
                                <span>
                                    <i class="bx bx-book text-success" style="font-size: 40px;"></i>
                                </span>
                                <div>
                                    <h4>Lorem ipsum dolor</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime numquam excepturi eius natus sint consequuntur atque voluptates obcaecati vitae reprehenderit!</p>
                                </div>
                            </div>

                            <div class="col-md-4 icon-box d-flex gap-3">
                                <span>
                                    <i class="bx bx-comment text-success" style="font-size: 40px;"></i>
                                </span>
                                <div>
                                    <h4>Lorem ipsum dolor</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime numquam excepturi eius natus sint consequuntur atque voluptates obcaecati vitae reprehenderit!</p>
                                </div>
                            </div>

                            <div class="col-md-4 icon-box d-flex gap-3">
                                <span>
                                    <i class="bi bi-question-mark" style="font-size: 40px;"></i>
                                </span>
                                <div>
                                    <h4>Automated Attendance</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime numquam excepturi eius natus sint consequuntur atque voluptates obcaecati vitae reprehenderit!</p>
                                </div>
                            </div>


                            <div class="col-md-4 icon-box d-flex gap-3">
                                <span>
                                    <i class="bx bx-fingerprint" style="font-size: 40px;"></i>
                                </span>
                                <div>
                                    <h4>Automated Attendance</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime numquam excepturi eius natus sint consequuntur atque voluptates obcaecati vitae reprehenderit!</p>
                                </div>
                            </div>

                            <div class="col-md-4 icon-box d-flex gap-3">
                                <span>
                                    <i class="bx bx-fingerprint" style="font-size: 40px;"></i>
                                </span>
                                <div>
                                    <h4>Automated Attendance</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime numquam excepturi eius natus sint consequuntur atque voluptates obcaecati vitae reprehenderit!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- contact us -->
    <section class="container container-fluid my-5" id="contactUs">
        <h2 class="text-center my-5 px-3 pb-1 border-bottom border-3 border-dark" style=" width:fit-content; margin:0 auto; ">Contact US</h2>

        <div class="row mx-0 g-4 d-flex flex-lg-row-reverse">
            <div class="col-12 col-md-6 border rounded-3 py-4 px-4">
                <form action="" class="d-flex flex-column gap-4 form-group">
                    <div class="d-flex flex-column gap-4">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-bounding-box fs-6 text-secondary"></i></span>
                            <input type="text" class="form-control py-2" placeholder="Enter your fullname">
                        </div>

                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-envelope fs-6 text-success"></i></span>
                            <input type="text" class="form-control py-2" placeholder="Enter your email address">
                        </div>

                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-telephone fs-6 text-danger"></i></span>
                            <input type="text" class="form-control py-2" placeholder="Enter your phone number">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-chat-fill"></i></span>
                        <textarea class="form-control" aria-label="With textarea" style="height: 150px;" placeholder="Enter your message"></textarea>
                    </div>

                    <div>
                        <button class="btn btn-success px-4 float-end">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-6 px-0 px-lg-3">
                <div class="w-100 h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60280.687128507954!2d72.83343359999999!3d19.215155199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2sin!4v1725885675686!5m2!1sen!2sin" class="w-100 h-100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <?php include './partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./script/main.js"></script>
</body>

</html>