<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="index.php">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

            <div class="d-flex flex-md-row flex-column gap-3">
                <!-- Search bar functionalty -->
                <form class="d-flex align-items-center m-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>

                <div class="d-flex gap-2">
                    <?php
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '
                        <!-- User and logout button --> 
                        <button class="btn btn-outline-success text-white"><i class="bi bi-person-circle"></i> You</button>
                        <button class="btn btn-outline-success">Logout</button>';
                    } else {
                        echo '
                        <!-- Login and SignUp Button -->
                        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#login-modal">Login</button>
                        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signUp-modal">SignUp</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<?php
include './partials/loginModal.php';
include './partials/signUpModal.php';
?>