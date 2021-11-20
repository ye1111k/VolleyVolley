<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/volleyicon.png" type="">

  <title> volley volley </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
<?php
  session_start();
//  print_r($_SESSION);
//  echo $_SESSION['userid'];

  $conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
?>
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/volleymain.png" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              volley volley
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="club.php">Club <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="player.php">Player</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stadium.php">Stadium</a>
              </li>
            </ul>
          </div>

          <a class="btn btn-warning" href="login.php"> Sign Out </a>
          &nbsp;
          <a class="btn btn-warning" href="withdraw.php"> Withdraw </a>
          &nbsp;
          <a class="btn btn-warning" href="changeNickName.php"> change NickName </a>
          
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- info section -->
  <br>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <div id="target1">
          <h2>
            Add new Match
          </h2>
          <br>
          <form action="./insertMatch.php" method="POST" onsubmit="return checkSubmit()">
            <div>
                <h4>Club 1</h4>
                <select name="club1" id="club1">
                    <option value=1>GS Caltex Seoul KIXX</option>
                    <option value=2>IBK Altos</option>
                    <option value=3>KGC Pro Volleyball Club</option>
                    <option value=4>AI Peppers</option>
                    <option value=5>Heungkuk Life Insurance Pink Spiders</option>
                    <option value=6>Korea Expressway Corporation Hi-Pass</option>
                    <option value=7>HDEC Hillstate</option>
                </select>
            </div>
            <br><br><br>  
            <div>
                <h4>Club 2</h4>
                <select name="club2" id="club2">
                    <option value=1>GS Caltex Seoul KIXX</option>
                    <option value=2>IBK Altos</option>
                    <option value=3>KGC Pro Volleyball Club</option>
                    <option value=4>AI Peppers</option>
                    <option value=5>Heungkuk Life Insurance Pink Spiders</option>
                    <option value=6>Korea Expressway Corporation Hi-Pass</option>
                    <option value=7>HDEC Hillstate</option>
                </select>
            </div>
            <br><br><br>
            <div>
                <h4>Game Schedule</h4> 
                <div>
                    <input type="date" class="form-control" name="schedule_date" id="schedule_date"/>
                    <input type="time" class="form-control" name="schedule_time" id="schedule_time"/>
                </div>
            </div>
            <br><br>
            <div>
                <h4>Stadium</h4>
                <select name="stadium" id="stadium">
                    <option value=1>Gimcheon Gymnasium</option>
                    <option value=2>Suwon Gymnasium</option>
                    <option value=3>Incheon Samsan World Gymnasium</option>
                    <option value=4>Jangchung Arena</option>
                    <option value=5>Chungmu Gymnasium</option>
                    <option value=6>Hwaseong Gymnasium</option>
                    <option value=7>Pepper Stadium</option>
                </select>
            </div>
            <br> <br><br>
            <button type="submit" class="btn btn-warning">
                  Register
            </button>
        </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="footer-info">
        <div class="footer-col">
            <a href="" class="footer-logo">
              volley volley
            </a>
            <p style= "color: #ABABAB">
              Information of Korean women's volleyball
            </p>
            <br>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Bottleneck</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
</body>

</html>