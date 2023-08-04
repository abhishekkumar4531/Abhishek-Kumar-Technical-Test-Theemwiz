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
<body class="bg-secondary">
  <?php include "components/navbar.php" ?>

  <div class="form-content text-white">
    <div class="form-field">
      <h3 class="pt-2 pb-2">Enter your register email address</h3>
      <form action="verify" method="post">
        <dl>
          <dt><label for="user_name">Enter your user name</label></dt>
          <dd>
            <input type="text" name="user_name" id="user_name" required onblur="" placeholder="Enter your user name" value="<?php if (isset($_POST['first_name'])) {
                                                                                                                                              echo $_POST['first_name'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="invalid_uname" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['userNameError']) && !$GLOBALS['userNameError']) {
              echo "Invalid syntax of user name!!!";
            }
            ?>
          </dd>
          <dt><label for="email">Enter your email</label></dt>
          <dd>
            <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email" value="<?php if (isset($_POST['email'])) {
                                                                                                                                    echo $_POST['email'];
                                                                                                                                  } ?>">
          </dd>
          <dd id="email_success" class="success-msg"></dd>
          <dd id="email_status" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['invaldiEmail']) && $GLOBALS['invaldiEmail']) {
              echo "Please Enter Unique Email-Address!!!";
            } ?>
          </dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['emailError']) && !$GLOBALS['emailError']) {
              echo "Invalid syntax of email!!!";
            }
            ?>
          </dd>
          <dd>
            <button class="btn btn-primary" id="submitBtn" name="sendOtp">Send OTP</button>
          </dd>
        </dl>
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
