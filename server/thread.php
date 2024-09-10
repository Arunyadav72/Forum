<?php
//database connection
include '../partials/_databaseConnection.php';

//add browse(thread) answer in threads table
$showAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> You are not loggedin
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

$showSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Your browse answer successfully added
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['commentDescription'])) {
    $threadId = $_GET['thread-id'];
    $commentContent = $_POST['commentDescription'];
    $currentDateTime = date('Y-m-d H:i:s');
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['loggedin'])) {
        if (empty($commentContent)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Please add comment/ answer
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            $userId = $_SESSION['user-id'];
            $insertComment = "INSERT INTO comments(comment_content, thread_id, user_id, created) VALUES(?, ?, ?, ?)";
            $statement = $conn->prepare($insertComment);
            $statement->execute([$commentContent, $threadId, $userId, $currentDateTime]);
            echo $showSuccess;
        }
    } else {
        echo $showAlert;
    }
}
