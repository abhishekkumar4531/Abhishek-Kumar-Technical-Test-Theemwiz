<!-- Navigation-->
<nav class="navbar navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="home">Start Bootstrap</a>

    <!--<div class="nav-link">
      Button trigger modal
      <a href="#signup" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Login">Login</a>
      <a class="btn btn-primary" href="#signup" data-bs-toggle="modal" data-bs-target="#Signup">Sign Up</a>
    </div>-->

    <div class="nav-link">
      <?php
        if(isset($_SESSION['user_loggedin'])) {
          echo "<a class='btn btn-primary me-3' href='profile'>Profile</a>";
          echo "<a class='btn btn-primary' href='logout'>Logout</a>";
        }
        else {
          echo "<a href='#signup' class='me-3 btn btn-primary' data-bs-toggle='modal' data-bs-target='#Login'>Login</a>";
          echo "<a class='btn btn-primary' href='#signup' data-bs-toggle='modal' data-bs-target='#Signup'>Sign Up</a>";
        }
      ?>
      </div>
  </div>
</nav>
