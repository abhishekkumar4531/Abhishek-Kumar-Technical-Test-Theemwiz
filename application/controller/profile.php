<?php

require "../application/model/database.php";

/**
 * Profile
 * Profile controller extends with Framework class which is responsible for communicated with view.
 * It is responsible for fetching the logged in user data and present them.
 * It is also responsible for updating the logged in user data.
 */
class Profile extends Framework {

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

  public function index() {

    // When user request for updaring the data then if block will be execute.
    // It will fetched the data and validate them after that for send to the Database 
    // class for updating the data.
    // If user requesting for only view the logged in user data then else block will be execute.
    if(isset($_POST['update'])) {
      $userName = $this->testInput($_POST['user_name']);
      $firstName = $this->testInput($_POST['first_name']);
      $lastName = $this->testInput($_POST['last_name']);
      $mobile = $this->testInput($_POST['mobile']);
      $email = $this->testInput($_POST['email']);
      $password = $this->testInput($_POST['password']);

      $valid = new Validation();
      $check = $valid->verifyData($userName, $firstName, $lastName, $mobile, $email, $password);

      // If all data valid then send to the Databae otherwise back to Profile page with error message.
      if($check == null) {
        $update = $this->db->updateProfile($userName, $firstName, $lastName, $mobile, $email, $password);

        // After successfully updated then also update the data on view.
        if($update) {
          $fetch = $this->db->getProfle($email);
          $_SESSION['fetchedData'] = $fetch;
          echo "<script>alert('Your account is updated successfully!!!');</script>";
          $this->view("userProfile");
        }
        else {
          echo "<script>alert('Error while updating the data!!!');</script>";
          $this->view("home");
        }
      }
      else {
        print_r($check);
        $this->view("home");
      }
    }
    else {
      session_start();

      // If user logged in then continue with Profile page.
      // If somehow any one access it then immediatly destroy the session and redirect to Home page.
      if(isset($_SESSION['user_loggedin'])) {
        $fetch = $this->db->getProfle($_SESSION['user_loggedin']);
        if($fetch != NULL) {
          //print_r($fetch);
          $_SESSION['fetchedData'] = $fetch;
          $this->view("userProfile");
        }
        else {
          session_destroy();
          header("location: home");
        }
      }
      else {
        session_destroy();
        header("location: home");
      }
    }
  }
}

?>
