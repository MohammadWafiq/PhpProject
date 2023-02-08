<?php
require('./config/connect.php');
$db = new DataBase();
if ($db->dbConnect()) {
    $db->query = "SELECT Title, Add_Date_Time, Description, Picture, Date, Time FROM `events`"; // sql query to get the data from the database
    $result = mysqli_query($db->conn, $db->query); //runs the query
    while ($event = mysqli_fetch_assoc($result)) { //fetches the data from the query into an associative array for each row and iterates oover the rows
        ?>

        <div class="container my-3 py-5 justify-content-center">
            <div class="row d-flex">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">
                                        <?= $event['Title'] ?>
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        Shared publicly -
                                        <?= $event['Add_Date_Time'] ?>
                                    </p>
                                    <p class="mt-3 mb-4 pb-2">
                                        <?= $event['Description'] ?>
                                    </p>
                                    <p class="text-muted small mb-0">
                                        Event on
                                        <?= $event['Date'] ?> at
                                        <?= $event['Time'] ?>
                                    </p>
                                </div>
                                <img class=" shadow-1-strong me-3" src="images/headerimg.jpg" alt="avatar" width="200px"
                                    height="200px" style="margin-left:250px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
?>