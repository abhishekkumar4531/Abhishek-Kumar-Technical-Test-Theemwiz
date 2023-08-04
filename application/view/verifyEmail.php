<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Theem | Tech</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
      type="text/css" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
      type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/assets/css/styles.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    if(popAction == true) {
      $(window).on('load', function() {$(popValue).modal('show');});
    }
  </script>
</head>
<body>
  <?php include "components/navbar.php" ?>
  
  <div class="form-content text-white">
    <div class="form-field">
      <form action="verify" method="post">
        <div class="col-md-12">
          <h3>Congratulations you registered successfully!!!</h3>
        </div>
        <div class="col-md-12">
          <label for="validationCustom01" class="form-label">Enter OTP which is on send to your email</label>
          <input type="text" class="form-control" id="validationCustom01" value="" required name="otp">
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit" name="verifyBtn">Verify your email</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="/assets/js/form-validattion.js"></script>
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/userValidity.js"></script>
  <script src="/assets/js/validation.js"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
