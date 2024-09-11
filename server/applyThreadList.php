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

// =================> Add Browse Question <================= 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['questionTitle']) && isset($_POST['questionDescription'])) {
    $categoryId = $_GET['category-id'];
    $questionTitle = $_POST['questionTitle'];
    $questionDescription = $_POST['questionDescription'];
    $currentDateTime = date('Y-m-d H:i:s');

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['loggedin'])) {
        $userId = $_SESSION['user-id'];
        $insertQuestion = "INSERT INTO threads(thread_title, thread_description, thread_category_id, user_id, created) VALUES(?, ?, ?, ?, ?)";
        $statement = $conn->prepare($insertQuestion);
        $statement->execute([$questionTitle, $questionDescription, $categoryId, $userId, $currentDateTime]);
        echo $showSuccess;
    } else {
        echo $showAlert;
    }
}

// =================> Display Browse Question <================= 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['display_BrowseQuestion'])) {
    $json = array();
    if ($_GET['category-id']) {
        $categoryId = $_GET['category-id'];
        $sql = 'SELECT thread.*, user.username FROM threads thread LEFT JOIN users user ON thread.user_id = user.user_id WHERE thread_category_id = ?';
        $statement = $conn->prepare($sql);
        $statement->execute([$categoryId]);

        if ($statement->rowCount()) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                array_push($json, $row);
            }
        }
    }
    echo json_encode($json);
}
