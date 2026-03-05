<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span style="">
              Tripy
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link <?php if($file=='index') { echo 'activee'; } else { echo 'noactive';}?>" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($file=='about') { echo 'activee'; } else { echo 'noactive';}?>" href="about.php"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($file=='service') { echo 'activee'; } else { echo 'noactive';}?>" href="service.php"> Services </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link <?php if($file=='contact') { echo 'activee'; } else { echo 'noactive';}?>" href="contact.php">Contact Us</a>
                </li>
                <?php 
                if(isset($_SESSION['front_login_id']))
                {
                  ?>
                  <li class="nav-item">
                  <a class="nav-link <?php if($file=='change_password') { echo 'activee'; } else { echo 'noactive';}?>" href="change_password.php"> Change password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($file=='ride_booking') { echo 'activee'; } else { echo 'noactive';}?>" href="ride_booking.php">Ride Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($file=='user_rides') { echo 'activee'; } else { echo 'noactive';}?>" href="user_rides.php">My Rides</a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </a>
                </li>
                  <?php
                }
                else
                {
                  ?>
                  <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                  <?php
                }
                ?>
               
                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>