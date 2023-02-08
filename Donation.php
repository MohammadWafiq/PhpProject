<?php
$currentPage = "Donation";
require_once('header.php');
require('config/connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new DataBase();
  if ($db->dbConnect()) {
    if ($db->donate($_POST['fullname'], $_POST['PN'], $_POST['amount'])) {
      echo '<scirpt>' . 'alert("donation has been made successfully.")' . '</scirpt>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia+Sans">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="css/stylesheet.css">
  <title>Donation</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script>
    $(document).ready(function () {
      $('input[type="radio"]').click(function () {
        var demovalue = $(this).val();
        $("div.myDiv").hide();
        $("#show").show();
      });
    });

  </script>
</head>

<body>

  <section class="h-100 gradient-form" style="background-color:  #ECE8DD;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <form action="" method="post">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="fullname">Fullname</label>
                      <input type="text" name="fullname" class="form-control" required />
                      <label class="form-label" for="PN">phonenumber</label>
                      <input type="Phone" name="PN" class="form-control" required />
                      <label class="text" for="cdn">Card Number</label>
                      <input type="number" name="cdn" class="form-control" required />
                      <label class="text" for="edate">ExpiaryDate mm/yy</label>
                      <input type="number" name="edate" class="form-control" required />
                      <label class="text" for="cvv">Cvv</label>
                      <input type="number" name="cvv" class="form-control" required />
                      <label class="text" for="amount">Amount</label>
                      <input type="number" name="amount" class="form-control" required />
                      <input type="submit" class="btn btn-md " style="background-color:#DDDDDD; margin-top:5%;"
                        name="submit" value="Submit" />

                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                  <h2 class="mb-4">Donation <br><br>
                    Help The University to improve it's services ,
                    and help Students in their University fees</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>