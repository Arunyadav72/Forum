<?php
//database connection
include '../partials/_databaseConnection.php';

//login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['emailId']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $emailId = $_POST['emailId'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_email_id = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([$emailId]);

    if ($statement->rowCount()) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $row['user_password'])) {
            $login = true;
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $login = true;
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user-id'] = $row['user_id'];

            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            echo "Invaild username and password";
        }
    } else {
        echo "Invaild username and password";
    }
}
