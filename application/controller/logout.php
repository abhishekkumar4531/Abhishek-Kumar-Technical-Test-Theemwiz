<?php

/**
 * Logout
 * This is responsible for destroly the current session and marked as user logged out.
 */
class Logout {

  /**
   * It will start the session and destroy the session.
   * After that redirect to Home page.
   */
  public function index() {
    session_start();
    session_unset();

    session_destroy();
    header("location: home");
  }


}

?>
