<?php

require "../application/model/database.php";

/**
 * Home
 * Home controller extends with Framework class which is responsible for communicated with view.
 * This class is responsible for Registration, Login and Home page.
 * It consists a index() method which is perform operations according to request.
 * It's constructor is responsible for creating the object of Database class.
 */
class Home extends Framework
{

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
  function testInput($data): string
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  /**
   * index
   * It deals with Register, Login, Verify and Home page request.
   * Later Verify request is commented here and implemented with the help of seperate controller.
   */
  public function index() {

    // When user submit their registration form then first statement will be execute.
    // It will fetched all the data and validate them after verification it will send to the Database class
    // string the data into database.
    // If user send the Login request then second statement will be execute.
    // And if user request for Home page then last statement will be execute.
    if (isset($_POST['register'])) {
      $userName = $this->testInput($_POST['user_name']);
      $firstName = $this->testInput($_POST['first_name']);
      $lastName = $this->testInput($_POST['last_name']);
      $mobile = $this->testInput($_POST['mobile']);
      $email = $this->testInput($_POST['email']);
      $password = $this->testInput($_POST['password']);
      $verify = 0;

      $valid = new Validation();
      $check = $valid->verifyData($userName, $firstName, $lastName, $mobile, $email, $password);

      // If all data are valid then strore the data into database.
      // If any data will not be valid then back to Home page with error message.
      if ($check == null) {
        $insert = $this->db->userRegistration($userName, $firstName, $lastName, $mobile, $email, $password, 0);

        // After successfully insertion send the email for verification purpose.
        // When registration completed then user will get a link via registered email for verification.
        // If insertion is not completed then return to Home page with error message.
        if ($insert) {
          session_start();
          //$otp = $db->sendOtp($email);
          //$_SESSION['otp'] = $otp;
          //echo "<script>alert('Please verify your email : ". $email ." before login!!!'); var popAction = true, popValue = '#Verify';</script>";
          $verify = $this->db->verifyEmail($firstName, $email);
          echo "<script>alert('Please check your email for verifying your email address before login!!!!!!');</script>";
          $this->view("home");
        } else {
          $duplicate = $this->db->duplicateUser;
          if ($duplicate) {
            echo "<script>alert('Please used another user-name instead of " . $userName . "!!!'); var popAction = true, popValue = '#Signup';</script>";
            $this->view("home");
          } else {
            $this->view("home");
          }
        }
      } else {
        print_r($check);
        $this->view("home");
      }
    }

    /*else if(isset($_POST['verifyBtn'])) {
      session_start();
      $otp = $this->testInput($_POST['otp']);
      if(isset($_SESSION['otp'])) {
        $getOtp = $_SESSION['otp'];
        if(number_format($getOtp) == number_format($otp)) {
          session_destroy();
          echo "<script>alert('Your account is verified, now you can login!!!'); var popAction = true, popValue = '#Login';</script>";
          $this->view("home");
        }
        else {
          echo "<script>alert('Please enter valid OTP!!!'); var popAction = true, popValue = '#Verify';</script>";
          $this->view("home");
        }
      }
      else {
        echo "<script>alert('Please resend OTP!!!');</script>";
        $this->view("home");
      }
    }*/ else if (isset($_POST['login'])) {
      $email = $this->testInput($_POST['email']);
      $password = $this->testInput($_POST['password']);
      //$db = new Database();

      $status = $this->db->loginRequest($email, $password);

      // If user logged in successfully then start the session and
      // go to home page with alert message.
      // If not then back to home page with error message.
      if ($status) {
        session_start();
        $_SESSION['user_loggedin'] = $email;
        echo "<script>alert('Logged in sucessfully!!!');</script>";
        $this->view("home");
      } else {
        echo "<script>alert('Please try again!!!');</script>";
        $this->view("home");
      }
    } else {
      session_start();
      
      // If user logged in then session should continue otherwise destroy the session.
      if (isset($_SESSION['user_loggedin'])) {
        $fetch = $this->db->getProfle($_SESSION['user_loggedin']);
        $_SESSION['firstName'] = $fetch['firstName'];
        $this->view("home");
      } else {
        session_destroy();
        $this->view("home");
      }
      //$this->view("home");
    }
  }
}
