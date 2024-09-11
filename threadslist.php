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

    <!-- Show category details -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron bg-secondary-subtle p-5 rounded-3">
                    <?php
                    if ($_GET['category-id']) {
                        $categoryId = $_GET['category-id'];
                        $sql = "SELECT * FROM categories WHERE category_id = ?";
                        $statement = $conn->prepare($sql);
                        $statement->execute([$categoryId]);
                        $row = $statement->fetch(PDO::FETCH_ASSOC);

                        echo '<h1 class="display-4">' . $row['category_name'] . '</h1>
                        <p class="lead">' . $row['category_description'] . '</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <p class="lead">
                            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
                        </p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mx-0">
            <div class="col-12">
                <h2 class="text-center px-3 pb-1 border-bottom border-3 border-dark" style=" width:fit-content; margin:0 auto; ">Browse Questions</h2>
            </div>
        </div>
        <div class="row mx-0 my-5">
            <!-- Show Browse Question -->
            <div class="col-12 col-lg-7 py-2 d-flex flex-column gap-4 border rounded" id="question-box" category-id=<?php echo $_GET['category-id']; ?> style="max-height: 94vh; height:100%; overflow-y: auto; scrollbar-width:thin"></div>


            <!-- Add Browse Question Form -->
            <div class="col-12 col-lg-5 px-0 ps-lg-5 ps-0 mt-5 mt-lg-0" style="position: sticky; top:200px; right:0px" id="add-browse-question">
                <h4>Add Your Question</h4>
                <p id="txtHint"></p>
                <form method="POST" class="from-group mt-4">
                    <div class="form-floating mb-3">
                        <input type="text" id="question-title" class="form-control" placeholder="Question-title" required>
                        <label for="question-title">Question Title</label>
                    </div>
                    <div class="mb-3">
                        <textarea id="question-description" class="form-control" placeholder="Leave a description here" style="height: 150px" required></textarea>
                    </div>
                    <div class="float-end">
                        <button type="button" id="add-question" class="btn btn-success">Add Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include './partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./script/main.js"></script>
</body>

</html>