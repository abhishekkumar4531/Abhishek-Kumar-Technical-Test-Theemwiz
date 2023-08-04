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
      <form class="row g-3 needs-validation" novalidate action="profile" method="post">
        <dl>
          <h3>
            <?php if (isset($_SESSION['fetchedData']['firstName'])) {
              echo "Welcome back ". $_SESSION['fetchedData']['firstName'] ."!!!";} 
            ?>
          </h3>
          <dt><label for="user_name">Your user name</label></dt>
          <dd>
            <input type="text" name="user_name" id="user_name" required onblur="" placeholder="Enter your user name" readonly value="<?php if (isset($_SESSION['fetchedData']['userName'])) {
                                                                                                                                              echo $_SESSION['fetchedData']['userName'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="invalid_uname" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['userNameError']) && !$GLOBALS['userNameError']) {
              echo "Invalid syntax of user name!!!";
            }
            ?>
          </dd>
          <dt><label for="first_name">Your first name</label></dt>
          <dd>
            <input type="text" name="first_name" id="first_name" required onblur="checkFname()" placeholder="Enter your first name" value="<?php if (isset($_SESSION['fetchedData']['firstName'])) {
                                                                                                                                              echo $_SESSION['fetchedData']['firstName'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="invalid_fname" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['firstNameError']) && !$GLOBALS['firstNameError']) {
              echo "Invalid syntax of first name!!!";
            }
            ?>
          </dd>
          <dt><label for="last_name">Your last name</label></dt>
          <dd>
            <input type="text" name="last_name" id="last_name" required onblur="checkLname()" placeholder="Enter your last name" value="<?php if (isset($_SESSION['fetchedData']['lastName'])) {
                                                                                                                                              echo $_SESSION['fetchedData']['lastName'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="invalid_lname" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['lastNameError']) && !$GLOBALS['lastNameError']) {
              echo "Invalid syntax of last name!!!";
            }
            ?>
          </dd>
          <dt><label for="pwd">Your password</label></dt>
          <dd>
            <input type="password" name="password" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password" value="<?php if (isset($_SESSION['fetchedData']['password'])) {
                                                                                                                                              echo $_SESSION['fetchedData']['password'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="pwd_success" class="success-msg"></dd>
          <dd id="pwd_status" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['passwordError']) && !$GLOBALS['passwordError']) {
              echo "Invalid syntax of password!!!";
            }
            ?>
          </dd>
          <dt><label for="mobile">Your mobile</label></dt>
          <dd>
            <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no" value="<?php if (isset($_SESSION['fetchedData']['phone'])) {
                                                                                                                                              echo $_SESSION['fetchedData']['phone'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="invalid_mobile" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['mobileError']) && !$GLOBALS['mobileError']) {
              echo "Invalid syntax of mobile!!!";
            }
            ?>
          </dd>
          <dt><label for="email">Your email</label></dt>
          <dd>
            <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email" value="<?php if (isset($_SESSION['fetchedData']['email'])) {
                                                                                                                                              echo $_SESSION['fetchedData']['email'];
                                                                                                                                            } ?>">
          </dd>
          <dd id="email_success" class="success-msg"></dd>
          <dd id="email_status" class="error-msg"></dd>
          <dd class="error-msg">
            <?php if (isset($GLOBALS['DuplicateErrorMsg']) && $GLOBALS['DuplicateErrorMsg']) {
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
            <button id="submitBtn" class="btn btn-primary" type="submit" name="update">Update</button>
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
