<?php
//database connection
include './partials/_databaseConnection.php';

//add browse question in threads table
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-comment'])) {
    $threadId = $_GET['thread-id'];
    $commentContent = $_POST['comment-description'];
    $currentDateTime = date('Y:m:d H:i:s');

    $insertComment = "INSERT INTO comments(comment_content, thread_id, user_id, created) VALUES(?, ?, ?, ?)";
    $statement = $conn->prepare($insertComment);
    $statement->execute([$commentContent, $threadId, 0, $currentDateTime]);
}
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

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron bg-secondary-subtle p-5 rounded-3">
                    <?php
                    if ($_GET['thread-id']) {
                        $threadId = $_GET['thread-id'];
                        $sql = "SELECT * FROM threads WHERE thread_id = ?";
                        $statement = $conn->prepare($sql);
                        $statement->execute([$threadId]);
                        $row = $statement->fetch(PDO::FETCH_ASSOC);

                        echo '<p class="m-0 fw-semibold">Browse Question</p>
                        <h1 class="display-5">' . $row['thread_title'] . '</h1>
                        <p class="lead">' . $row['thread_description'] . '</p>
                        <p class="m-0 mt-5 fw-semibold text-end">Added By - Arun Yadav</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mx-0">
            <div class="col-12">
                <h2 class="text-center px-3 pb-1 border-bottom border-3 border-dark" style=" width:fit-content; margin:0 auto; ">Questions Threads</h2>
            </div>
        </div>

        <div class="row mx-0 my-5">
            <div class="col-12 py-2 col-md-7 d-flex flex-column gap-4 border rounded" style="max-height: 94vh; height:100%; overflow-y: auto; scrollbar-width:thin">
                <?php
                $threadId = $_GET['thread-id'];
                $sql = "SELECT * FROM comments WHERE thread_id = ?";
                $statement = $conn->prepare($sql);
                $statement->execute([$threadId]);

                if ($statement->rowCount()) {
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $commentId = $row['thread_id'];
                        $commentContent = $row['comment_content'];
                        $commentAddedDateTime = $row['created'];

                        echo '<section class="d-flex flex-column gap-1 py-2">
                            <!-- added user -->
                            <div class="d-flex gap-2">
                                <div style="width: 45px; height:45px;" class="border  rounded-circle text-center">
                                    <i class="bi bi-person fs-2"></i>
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Arun Yadav</p>
                                    <p class="m-0">';
                        echo ($commentAddedDateTime) ? date("g:i A", strtotime($commentAddedDateTime)) . ' || ' : '';
                        echo date("j F, Y", strtotime($commentAddedDateTime));
                        echo '</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3" style="margin-left:20px;">
                                <div style="width:9px;" class="bg-secondary-subtle rounded"></div>
                                <div class="h-100">
                                    <p>' . $commentContent . '</p>
                                </div>
                            </div>
                        </section>';
                    }
                } else {
                    echo '<div class="jumbotron bg-secondary-subtle p-5 rounded-3">
                        <h1 class="display-6">Question Threads Not Founds</h1>
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    </div>';
                }
                ?>
            </div>

            <!-- Add Question Form -->
            <div class="col-12 px-0 ps-5 col-md-5" style="position: sticky; top:200px; right:0px">
                <h4>Add Your Comment/ Answer</h4>
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" class="from-group mt-4">
                    <div class="mb-3">
                        <textarea id="comment-description" name="comment-description" class="form-control" placeholder="Leave a comment/ answer here" required style="height: 150px"></textarea>
                    </div>
                    <div class="float-end">
                        <button type="submit" id="add-comment" name="add-comment" class="btn btn-success">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include './partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>