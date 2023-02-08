<!-- this is the navigation bar php file, it will be included in all the files that have the navigation bar visible -->

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia+Sans">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>About</title>
</head>


<body>
    <div class="header_img">
        <!-- Image and text -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand" style="color:#ECE8DD;" href="#">
                <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                AlUmni Gate
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto ">
                    <!-- the php snippet added here is to check for the currentPage adds the active current page to class active which is used to style the active page nav-link differently -->
                    <li class="nav-item px-3">
                        <a class="nav-link " href="index.php">
                            <h5 class="list-item <?php if ($currentPage === 'Index')
                            echo 'current'; ?>">Home</h5>
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="<?php echo 'Posts.php' ?>">
                                <h5 class="list-item <?php if ($currentPage === 'Posts')
                            echo 'current'; ?>">Posts</h5>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="events.php">
                            <h5 class="list-item <?php if ($currentPage === 'Events')
                            echo 'current'; ?>">Events</h5>
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link " href="Jobs.php">
                            <h5 class="list-item <?php if ($currentPage === 'Jobs')
                            echo 'current'; ?>">Jobs</h5>
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="Donation.php">
                            <h5 class="list-item <?php if ($currentPage === 'Donation')
                            echo 'current'; ?>">Donation</h5>
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="contact.php">
                            <h5 class="list-item <?php if ($currentPage === 'Contact')
                            echo 'current'; ?>">Contact</h5>
                        </a>
                    </li>
                </ul>
                <a class="btn btn-outline-dark btn-lg mr-2 header-button" href="login.php" role="button">Login</a>
                <a class="btn btn-outline-dark btn-lg header-button" href="signup.php" role="button">Signup</a>
                    
               
        </nav>

    </div>
    </div>
</body>