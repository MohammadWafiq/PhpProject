<?php
require('./config/connect.php');

$db = new DataBase();

if ($db->dbConnect()) {
    $query = "SELECT Company_ID, Title, Description, Add_Date_Time FROM `jobs`";
    $result = mysqli_query($db->conn, $query);
    while ($job = mysqli_fetch_assoc($result)) {
        $query2 = "SELECT Name FROM `companies` WHERE ID = $job[Company_ID]";
        $company_name = mysqli_fetch_assoc(mysqli_query($db->conn, $query2))['Name'];
        ?>


        <div class="container my-3 py-5 justify-content-center">
            <div class="row d-flex">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">
                                        <?php echo $company_name ?>
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        Shared publicly -
                                        <?php echo $job['Add_Date_Time'] ?>
                                    </p>
                                    <p class="mt-3 mb-4 pb-2">
                                        <?php echo $job['Title'] ?>
                                    </p>
                                    <p class="mt-3 mb-4 pb-2">
                                        <?php echo $job['Description'] ?>
                                    </p>
                                </div>
                                <button class="btn btn-primary btn-md" type="button" name="applyjob"
                                    style="margin-left:400px;background-color:#5F8D4E">Job apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>