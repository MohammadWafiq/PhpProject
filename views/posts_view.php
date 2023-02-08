<?php
require('./config/connect.php');

$db = new DataBase();

if ($db->dbConnect()) {
    $query = "SELECT ID, Graduate_ID, Add_Date_Time, Text, Status FROM `posts`";
    $result = mysqli_query($db->conn, $query);
    while ($post = mysqli_fetch_assoc($result)) {
        if ($post['Status'] != 'Accepted') {
            continue;
        }
        $query2 = "SELECT Name FROM `graduates` WHERE ID = $post[Graduate_ID]";
        $student_name = mysqli_fetch_assoc(mysqli_query($db->conn, $query2))['Name'];
        ?>
        <div class="container my-3 py-2 justify-content-center">
            <div class="row d-flex">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <img class="rounded-circle shadow-1-strong me-3" src="images/logo.png" alt="avatar" width="60"
                                    height="60" />
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">
                                        <?= $student_name ?>
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        Shared publicly -
                                        <?= $post['Add_Date_Time'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-outline w-100">
                                <p class="form-control" style="background: #fff;">
                                    <?= $post['Text'] ?>
                                </p>
                            </div>
                            <div class="small d-flex justify-content-start">
                                <a href="login.php" class="d-flex align-items-center me-3">
                                    <i class="far fa-comment-dots me-2"></i>
                                    <p class="mb-0" style="margin-left:4px;">Comment</p>
                                </a>
                            </div>
                        </div>
                        <?php
                        $post_ID = $post['ID'];
                        $comments_query = "SELECT * FROM `comments` WHERE `Post_ID` = $post_ID";
                        $comment_result = mysqli_query($db->conn, $comments_query);
                        if ($comment_result->num_rows > 0) {
                            echo '<h6 style="padding-left:5%;">Comments</h6>';
                        }
                        while ($comment = mysqli_fetch_assoc($comment_result)) {
                            ?>
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3" src="images/logo.png" alt="avatar" width="40"
                                        height="40" />
                                    <div class="form-outline w-100">
                                        <p class="form-control" style="background: #fff;">
                                            <?= $comment['Text'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>