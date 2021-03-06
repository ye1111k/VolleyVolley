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
              <li class="nav-item">
                <a class="nav-link" href="club.php">Club</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="player.php">Player <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stadium.php">Stadium</a>
              </li>
            </ul>
          </div>
 
          <a class="btn btn-warning" href="signOut.php"> Sign Out </a>
          &nbsp;
          <a class="btn btn-warning" href="withdraw.php"> Withdraw </a>
          &nbsp;
          <a class="btn btn-warning" href="changeNickName.php"> change NickName </a>
          
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- player section -->
  <br>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <div id="target1">
            <h2>
            player information
            </h2>
        </div>
      </div>

      <div class="filters-content">
          <div class="col-sm-12 col-lg-12">
            <div class="box">
              <div>
              <?php
                    $mysqli = mysqli_connect("localhost","team22","team22","team22");
                    if (mysqli_connect_errno()) {
                      printf("Connect failed: %s\n",mysqli_connect_error());
                      exit();
                    }
                    else {
                      $sql="select * from player where id=" . $_REQUEST['id'];
                      $res = mysqli_query($mysqli, $sql);
                      if ($res) {
                        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                          $id = $newArray['id'];
                          $name = $newArray['name'];
                          $club_id = $newArray['club_id'];
                          
                          $is_captain = $newArray['is_captain'];
                          $birth = $newArray['birth'];
                          $debut = $newArray['debut'];
                          $nationality = $newArray['nationality'];
                          $position = $newArray['position'];
                          $uniform_number = $newArray['uniform_number'];
                          $source = "images/player_image/" . (string)$club_id . "/" . (string)$uniform_number . ".jpg";
                        }
                        echo "<div class=\"img-box\">";
                          echo "<img src=$source alt=\"\">";
                        echo "</div>";
                        echo "<div class=\"detail-box\" style=\"text-align: center\">";
                        echo "<h5>".$name."</h5>";
                        //echo "<h5>".$club_id."</h5>";
                        if($club_id == 1){
                          $club = "gscal";
                          echo "<h5>GS Caltex Seoul KIXX</h5>";
                        }
                        else if ($club_id == 2){
                          $club = "ibk";
                          echo "<h5>IBK Altos</h5>";
                        }
                        else if ($club_id == 3){
                          $club = "kgc";
                          echo "<h5>KGC Pro Volleyball Club</h5>";
                        }
                        else if ($club_id == 4){
                          $club = "pepper";
                          echo "<h5>AI Peppers</h5>";
                        }
                        else if ($club_id == 5){
                          $club = "heungkuk";
                          echo "<h5>Heungkuk Life Insurance Pink Spiders</h5>";
                        }
                        else if ($club_id == 6){
                          $club = "kec";
                          echo "<h5>Korea Expressway Corporation Hi-Pass</h5>";
                        }
                        else if ($club_id == 7){
                          $club = "hdec";
                          echo "<h5>HDEC Hillstate</h5>";
                        }
                        //echo "<h5>".$is_captain."</h5>";
                        if($is_captain == 1){
                          echo "<h5>CAPTAIN</h5>";
                        }
                        else{
                          echo "<h5></h5>";
                        }
                        echo "<h5>".$birth."</h5>";
                        echo "<h5> Debut : ".$debut."</h5>";
                        echo "<h5> Nationality : ".$nationality."</h5>";
                        echo "<h5> Position : ".$position."</h5>";
                        echo "<h5> Uniform Number : ".$uniform_number."</h5>";
                      }
                      else {
                        printf("Could not retrieve records: %s\n",mysqli_error($mysqli));
                      }
                      mysqli_free_result($res);
                      mysqli_close($mysqli);
                    }
                  ?>
              </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end player section -->

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
