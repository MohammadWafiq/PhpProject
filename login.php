<?php
require('config/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new DataBase();
  if ($db->dbConnect()) {
    $table = '';
    if ($_POST['login_type'] == 'graduate')
      $table = 'graduates';
    elseif ($_POST['login_type'] == 'company')
      $table = 'companies';
      
    if ($db->logIn($table, $_POST['email'], $_POST['password'])) {
      session_start();
      $_SESSION['id'] = $db->getInfoFromEmail($_POST['email']);
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['logged_in'] = true;
      header("Location: Graduate/index.php");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia+Sans">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style2.css">
</head>

<body>

  <section class="vh-100"
    style="background:url('images/headerimg.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-non d-md-block">
                <img src="images/logo.png" alt="login form" class="img-fluid"
                  style="border-radius: 1rem 0 0 1rem; margin-top:50px;margin-left:30px;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Login</span>
                    </div>
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">login into your account</h5>
                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" name="email" class="form-control form-control-lg"
                        required />
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" name="password" class="form-control form-control-lg"
                        required />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>
                    <div>
                      <p style="display: inline;">Sign up as:&nbsp;&nbsp;</p>
                      <input type="radio" name="login_type" value="graduate">
                      <label for="gradlog">Graduate</label>
                      <input type="radio" name="login_type" value="company" style="margin-left:8px;">
                      <label for="gradlog">Company</label>
                    </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>
                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                        style="color: #393f81;">Register here(Only for Graduate)</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
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