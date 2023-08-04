<!-- Masthead-->
<header class="masthead">
  <div class="container position-relative">
    <div class="row justify-content-center">
      <div class="col-xl-6">
        <div class="text-center text-white">

          <div class="hii-user">
            <h2>
              <?php if(isset($_SESSION['firstName'])) { echo "Hii ". $_SESSION['firstName'] ."!!!"; }  ?>
            </h2>
          </div>
          <!-- Page heading-->
          <h1 class="mb-5">Generate more leads with a professional landing page!</h1>
          <!-- Signup form-->
          <!-- * * * * * * * * * * * * * * *-->
          <!-- * * SB Forms Contact Form * *-->
          <!-- * * * * * * * * * * * * * * *-->
          <!-- This form is pre-integrated with SB Forms.-->
          <!-- To make this form functional, sign up at-->
          <!-- https://startbootstrap.com/solution/contact-forms-->
          <!-- to get an API token!-->
          <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
            <!-- Email address input-->
            <div class="row">
              <div class="col">
                <input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">
                  Email Address is required.</div>
                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email
                  Address Email is not valid.</div>
              </div>
              <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
              <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
              </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
              <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- popup section -->
<section class="modal-wrap">
  <!-- Modal  login -->
  <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-wrap">
            <form class="row g-3 needs-validation" novalidate method="post" accept="home">
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Username or Email Address</label>
                <input type="text" class="form-control" id="validationCustom01" value="" required name="email">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-12">
                <label for="validationDefaultpass" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="validationDefaultpass" aria-describedby="inputGroupPrepend2" required name="password">
                </div>
                <div class="link-wrap d-flex justify-content-between ">
                  <a href="#">Lost Password</a> <a href="#signup" data-bs-toggle="modal" data-bs-target="#Signup">Register</a>
                </div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Remember me
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="login">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal  Signup -->
  <div class="modal fade" id="Signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sign UP</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-wrap">
            <form class="row g-3 needs-validation" novalidate action="home" method="post">
              <dl>
                <dt><label for="user_name">Enter your user name</label></dt>
                <dd>
                  <input type="text" name="user_name" id="user_name" required onblur="" placeholder="Enter your user name" value="<?php if (isset($_POST['user_name'])) {
                                                                                                                                                    echo $_POST['user_name'];
                                                                                                                                                  } ?>">
                </dd>
                <dd id="invalid_uname" class="error-msg"></dd>
                <dd class="error-msg">
                  <?php if (isset($GLOBALS['userNameError']) && !$GLOBALS['userNameError']) {
                    echo "Invalid syntax of user name!!!";
                  }
                  ?>
                </dd>
                <dt><label for="first_name">Enter your first name</label></dt>
                <dd>
                  <input type="text" name="first_name" id="first_name" required onblur="checkFname()" placeholder="Enter your first name" value="<?php if (isset($_POST['first_name'])) {
                                                                                                                                                    echo $_POST['first_name'];
                                                                                                                                                  } ?>">
                </dd>
                <dd id="invalid_fname" class="error-msg"></dd>
                <dd class="error-msg">
                  <?php if (isset($GLOBALS['firstNameError']) && !$GLOBALS['firstNameError']) {
                    echo "Invalid syntax of first name!!!";
                  }
                  ?>
                </dd>
                <dt><label for="last_name">Enter your last name</label></dt>
                <dd>
                  <input type="text" name="last_name" id="last_name" required onblur="checkLname()" placeholder="Enter your last name" value="<?php if (isset($_POST['last_name'])) {
                                                                                                                                                echo $_POST['last_name'];
                                                                                                                                              } ?>">
                </dd>
                <dd id="invalid_lname" class="error-msg"></dd>
                <dd class="error-msg">
                  <?php if (isset($GLOBALS['lastNameError']) && !$GLOBALS['lastNameError']) {
                    echo "Invalid syntax of last name!!!";
                  }
                  ?>
                </dd>
                <dt><label for="pwd">Enter your password</label></dt>
                <dd>
                  <input type="password" name="password" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password" value="<?php if (isset($_POST['pwd'])) {
                                                                                                                                                echo $_POST['pwd'];
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
                <dt><label for="mobile">Enter your mobile</label></dt>
                <dd>
                  <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no" value="<?php if (isset($_POST['mobile'])) {
                                                                                                                                            echo $_POST['mobile'];
                                                                                                                                          } ?>">
                </dd>
                <dd id="invalid_mobile" class="error-msg"></dd>
                <dd class="error-msg">
                  <?php if (isset($GLOBALS['mobileError']) && !$GLOBALS['mobileError']) {
                    echo "Invalid syntax of mobile!!!";
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
                  <button id="submitBtn" class="btn btn-primary" type="submit" name="register">Register</button>
                </dd>
                <dd>
                  <a href="/login">Exiting user?</a>
                </dd>
              </dl>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Verify email -->
  <!--<div class="modal fade" id="Verify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Verify your email</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-wrap">
            <form class="row g-3 needs-validation" novalidate method="POST" action="home">
              <div class="col-md-12">
                <h3>Congratulations you registered successfully!!!</h3>
              </div>
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Enter OTP which is on your email</label>
                <input type="text" class="form-control" id="validationCustom01" value="" required name="otp">
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="verifyBtn">Verify</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>-->

</section>
















<!-- Icons Grid-->
<section class="features-icons bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
          <h3>Fully Responsive</h3>
          <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
          <h3>Bootstrap 5 Ready</h3>
          <p class="lead mb-0">Featuring the latest build of the new Bootstrap 5 framework!</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
          <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
          <h3>Easy to Use</h3>
          <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Image Showcases-->
<section class="showcase">
  <div class="container-fluid p-0">
    <div class="row g-0">
      <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-1.jpg')"></div>
      <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <h2>Fully Responsive Design</h2>
        <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will
          look great on any device, whether it's a phone, tablet, or desktop the page will behave
          responsively!</p>
      </div>
    </div>
    <div class="row g-0">
      <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
      <div class="col-lg-6 my-auto showcase-text">
        <h2>Updated For Bootstrap 5</h2>
        <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the
          way in mobile responsive web development! All of the themes on Start Bootstrap are now using
          Bootstrap 5!</p>
      </div>
    </div>
    <div class="row g-0">
      <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
      <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <h2>Easy to Use & Customize</h2>
        <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand
          some deeper customization options. Out of the box, just add your content and images, and your
          new landing page will be ready to go!</p>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials-->
<section class="testimonials text-center bg-light">
  <div class="container">
    <h2 class="mb-5">What people are saying...</h2>
    <div class="row">
      <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
          <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
          <h5>Margaret E.</h5>
          <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
          <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
          <h5>Fred S.</h5>
          <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of
            super nice landing pages."</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
          <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
          <h5>Sarah W.</h5>
          <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to
            us!"</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Call to Action-->
<section class="call-to-action text-white text-center" id="signup">
  <div class="container position-relative">
    <div class="row justify-content-center">
      <div class="col-xl-6">
        <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        <!-- Signup form-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form class="form-subscribe" id="contactFormFooter" data-sb-form-api-token="API_TOKEN">
          <!-- Email address input-->
          <div class="row">
            <div class="col">
              <input class="form-control form-control-lg" id="emailAddressBelow" type="email" placeholder="Email Address" data-sb-validations="required,email" />
              <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:required">
                Email Address is required.</div>
              <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">
                Email Address Email is not valid.</div>
            </div>
            <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
          </div>
          <!-- Submit success message-->
          <!---->
          <!-- This is what your users will see when the form-->
          <!-- has successfully submitted-->
          <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
              <div class="fw-bolder">Form submission successful!</div>
              <p>To activate this form, sign up at</p>
              <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
          </div>
          <!-- Submit error message-->
          <!---->
          <!-- This is what your users will see when there is-->
          <!-- an error submitting the form-->
          <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Footer-->
<footer class="footer bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><a href="#!">About</a></li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item"><a href="#!">Contact</a></li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
        </ul>
        <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
      </div>
      <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
        <ul class="list-inline mb-0">
          <li class="list-inline-item me-4">
            <a href="#!"><i class="bi-facebook fs-3"></i></a>
          </li>
          <li class="list-inline-item me-4">
            <a href="#!"><i class="bi-twitter fs-3"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="#!"><i class="bi-instagram fs-3"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>