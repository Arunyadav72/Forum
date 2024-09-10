<?php
//database connection
include '../partials/_databaseConnection.php';

//add browse question in threads table
$showAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> You are not loggedin
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

$showSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Your browse question successfully added
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['questionTitle']) && isset($_POST['questionDescription'])) {
    $categoryId = $_GET['category-id'];
    $questionTitle = $_POST['questionTitle'];
    $questionDescription = $_POST['questionDescription'];
    $currentDateTime = date('Y-m-d H:i:s');

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['loggedin'])) {
        if (empty($questionTitle)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Please add question title
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else if (empty($questionDescription)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Please add description
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            $userId = $_SESSION['user-id'];
            $insertQuestion = "INSERT INTO threads(thread_title, thread_description, thread_category_id, user_id, created) VALUES(?, ?, ?, ?, ?)";
            $statement = $conn->prepare($insertQuestion);
            $statement->execute([$questionTitle, $questionDescription, $categoryId, $userId, $currentDateTime]);
            echo $showSuccess;
        }
    } else {
        echo $showAlert;
    }
}
