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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
</head>

<body style="background-color: #f6f9ff;">
    <?php include './partials/_header.php'; ?>

    <header class="container-fluid" style="height: 70vh;">
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
                            <img src="./Image/compressed-colorful-code-background-web-programming-with-ruby-coding-2K4E1HF.jpg" class=" w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./Image/th.jpeg" class="d-block w-100 img-fluid" alt="...">
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
    </header>

    <section class="container">
        <h2 class="text-center my-5">iDiscuss - Browse Categories</h2>

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

                    echo '<div class="col-12 col-md-4">
                        <div class="card" style="width: 18rem;">
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

    <?php include './partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>