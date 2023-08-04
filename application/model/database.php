<?php

require "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;

class Database extends Connection {

  // Exiting userName status
  public $duplicateUser = false;

  // User entered email is valid or not
  public $emailErrorMsg = false;

  // User entered password is valid or not
  public $pwdErrorMsg = false;

  // User entered email for verification is valid or not
  public $verifyEmail = false;

  /**
   * userRegistration
   * This is responsible for new user registration.
   * First it will check is userName unique or not, if unique then continue otherwise return false.
   * After that it store the data in to database and if succesfully updated then return true otherwise false.
   * 
   * @return boolean
   */
  public function userRegistration($userName, $firstName, $lastName, $mobile, $email, $password, $verify) {
    $checkUser = "SELECT userName FROM user WHERE userName = '$userName'";

    $result = $this->conn->query($checkUser);

    // If userName exits then return false otherwise continue and store the data.
    if ($result->num_rows > 0) {
      $this->duplicateUser = true;
      return false;
    }
    else{
      $this->duplicateUser = false;
      $post = "INSERT INTO user (userName, firstName, lastName, password, phone, email, verify) 
      VALUES('$userName', '$firstName', '$lastName', '$password', '$mobile', '$email', 0)";
      if($this->conn->query($post)) {
        return true;
      }
      else {
        return false;
      }
    }
    $this->conn->close();
  }

  /**
   * loginRequest
   * It is responsible for user log-in.
   * If user exit then return true otherwise return false.
   * 
   * @return boolean
   */
  public function loginRequest($userEmail, $userPassword) {
    $fetch = "SELECT email, password, verify FROM user WHERE email = '$userEmail'";
    $result = $this->conn->query($fetch);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if($row["verify"] == 1) {
        if($userPassword === $row["password"]) {
          $this->emailErrorMsg = false;
          $this->pwdErrorMsg = false;
          return true;
        }
        else {
          $this->pwdErrorMsg = true;
          return false;
        }
      }
      else {
        $this->verifyEmail = true;
        return false;
      }
    }
    else {
      $this->emailErrorMsg = true;
      return false;
    }

    $this->conn->close();
  }

  /**
   * checkEmail
   * When user request for OTP for then verify is user entered correct email and userName.
   * If email and userName is already available then return true else false.
   * 
   * @return boolean
   */
  public function checkEmail($userName, $email) {
    $checkUser = "SELECT userName, email FROM user WHERE userName = '$userName'";

    $result = $this->conn->query($checkUser);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if($email == $row['email']){
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }

  /**
   * verified
   * It is responsible for updating the verification status.
   * 
   * @return boolean
   */
  public function verified($userName, $email) {
    $status = $this->checkEmail($userName, $email);
    if($status) {
      $update = "UPDATE user SET verify = 1 WHERE userName = '$userName'";
      if ($this->conn->query($update) === TRUE) {
        return true;
      }
      else {
        return false;
      }
    }
  }

  /**
   * getProfile
   * It is responsible for fetching the user's data whose email address is $userEmail
   * 
   * @return mixed
   */
  public function getProfle($userEmail) {
    $fetch = "SELECT * FROM user WHERE email = '$userEmail'";
    $result = $this->conn->query($fetch);
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      return $row;
    }
    return null;
  }

  /**
   * updateProfile
   * It is responsible for updating the user data.
   * After successfully update it will return true otherwise false.
   * 
   * @return boolean
   */
  public function updateProfile($userName, $firstName, $lastName, $phone, $email, $password) {
    $update = "UPDATE user SET firstName = '$firstName', lastName = '$lastName', phone = '$phone', email = '$email', password = '$password'  WHERE userName = '$userName'";
    $result = $this->conn->query($update);

    if($result) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * sendOtp
   * It is responsible for sending the OTP.
   * 
   * @return integer
   */
  public function sendOtp($userEmail) {
    $email = $userEmail;
    $otp = rand(100000, 999999);

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "abhi31kr45@gmail.com";
    $mail->Password = "ylagckqsadjtgigz";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom("abhi31kr45@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "OTP Verication!!!";
    $mail->isHTML(TRUE);
    $mail->Body = "<b>Please verify your account : </b> Your OTP => $otp";
    $mail->send();
    return $otp;
  }

  /**
   * verifyEmail
   * It will consists the link of the proccess of verifying email.
   * After registration this function is called.
   */
  public function verifyEmail($firstName, $userEmail) {
    $email = $userEmail;

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "abhi31kr45@gmail.com";
    $mail->Password = "ylagckqsadjtgigz";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom("abhi31kr45@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "Thanks for registration!!!";
    $mail->isHTML(TRUE);
    $mail->Body = "Hello $firstName !!! <br>Now verify your account after clicking on given link : <a href='theem.com/verify'>Send OTP for verification</a>";
    $mail->send();
  }

}

?>
