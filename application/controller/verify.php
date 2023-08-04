<?php

require "../application/model/database.php";

/**
 * Verify
 * Verify controller extends with Framework class which is responsible for communicated with view.
 * It is responsible for email verification of user using OTP validation.
 * Validations perform with the help of PHP mailer.
 */
class Verify extends Framework {

  // Storing the object of Database class
  public $db = NULL;

  /**
    * Creating the Object of Database class which is responsible for communicated with database.
  */ 
  public function __construct() {
    $this->db = new Database();
  }
  
  /**
   * testInput
   * It is responsible for validating the HTML form data.
   * 
   * @return string 
   */
  function testInput($data) : string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  /**
   * index
   * When user request for OTP then first statement will be execute.
   * After getting OTP, then user request for OTP verification then second statement will be execute.
   * If somehow try to access this page without any request then last statement will be execute.
   */
  public function index() {
    
    // When user will request for OTP with userName and userEmail because userEmail may be
    // duplicate but userName always will be unique.
    // When OTP will send then another page will be open where user have to validate their OTP.
    // And last statement will be execute when user directly try to access this controller.
    if(isset($_POST['sendOtp'])) {
      $userName = $this->testInput($_POST['user_name']);
      $email = $this->testInput($_POST['email']);
      //$obj = new Database();
      $check = $this->db->checkEmail($userName, $email);

      // When entered userEmail and userName is valid then send the send the OTP to 
      // the registered email and store the values in session.
      // Else back to page with error message.
      if($check == true) {
        session_start();
        $otp = $this->db->sendOtp($email);
        $_SESSION['getOtp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['userName'] = $userName;
        $this->view("verifyEmail");
      }
      else {
        echo "<script>alert('Please register your email!!!');</script>";
        $this->view("sendOtp");
      }
    }
    else if(isset($_POST['verifyBtn'])) {
      session_start();

      // When OTP is already sent and stored in session varfaible then only continue the process
      // otherwise back to send OTP page for sending the OTP.
      if(isset($_SESSION['getOtp'])) {
        $enterOtp = $this->testInput($_POST['otp']);

        // Comparing the enter OTP with sent OTP if true then continue 
        // otherwise resend OTP.
        if(number_format($_SESSION['getOtp']) == number_format($enterOtp)) {
          $status = $this->db->verified($_SESSION['userName'], $_SESSION['email']);
          if($status) {
            header("location: home");
          }
          else {
            session_destroy();
            echo "<script>alert('Sorry! not verified please try again!!!');</script>";
            $this->view("sendOtp");
          }
        }
        else {
          session_destroy();
          echo "<script>alert('OOPs! OTP is not valid please try again!!!');</script>";
          $this->view("sendOtp");
        }
      }
      else {
        session_destroy();
        echo "<script>alert('Please send OTP before verification!!!');</script>";
        $this->view("sendOtp");
      }
    }
    else {
      session_start();
      if(isset($_SESSION['user_loggedin'])) {
        header("location : home");
      }
      else {
        session_destroy();
        $this->view("sendOtp");
      }
    }
  }

}

?>
