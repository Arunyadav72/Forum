<?php
//database connection
include '../partials/_databaseConnection.php';

//create account
$showError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>SignUp Error!</strong> User already exist. Please try other username or email.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

$showAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SignUp Success!</strong> Signup successful.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['emailId']) && isset($_POST['phoneNumber']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $emailId = $_POST['emailId'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $currentDateTime = date('Y:m:d H:i:s');

    $checkExistUser = "SELECT * FROM users WHERE user_email_id = ?";
    $statement = $conn->prepare($checkExistUser);
    $statement->execute([$emailId]);

    if (!$statement->rowCount()) {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $insertUser = "INSERT INTO users(username, user_email_id, user_phone_number, user_password, created) VALUES(?, ?, ?, ?, ?)";
        $statement = $conn->prepare($insertUser);
        $statement->execute([$username, $emailId, $phoneNumber, $hashPassword, $currentDateTime]);
        echo $showAlert;
    } else {
        echo $showError;
    }
}
