<?php
$currentPage = "Contact"; //used to check for active page
require_once('header.php'); //includes the nav bar
require_once('config/connect.php'); //includes the database connection
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO `feedback` (`Name`, `Phone_Number`, `Email`, `Subject`, `Feedback`) 
                      VALUES ('$name', '$phone_number', '$email', '$subject', '$message');";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['success'] = "You have sent your feedback";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Contact</title>
</head>

<body>
    <!--Section: Contact v.2-->
    <section class="mb-4" style="margin-top:10%;">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us
            directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row text-center" style="margin-left: 25%;">

            <!--Grid column-->
            <div class="col-md-8 mb-md-0 mb-2">
                <form id="contact-form" name="contact-form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control" required>

                            </div>
                        </div>
                        <br>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>
                                <input type="text" id="email" name="email" class="form-control">

                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">

                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                    <br>
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="phone" class="">Phone number</label>
                                <input type="tel" id="subject" name="phone" class="form-control">

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2"
                                    class="form-control md-textarea" required></textarea>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="text-center" style="padding: 5%;">
                        <button type="submit" class="btn btn-primary" style="width: 15%; background-color:#5F8D4E;">Send</button>
                    </div>
                </form>
                <div class="status"></div>
            </div>
        </div>

    </section>
    <!--Section: Contact v.2-->
</body>

</html>