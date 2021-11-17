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
  print_r($_SESSION);
  echo $_SESSION['userid'];
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
              <li class="nav-item">
                <a class="nav-link" href="player.php">Player</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="stadium.php">Stadium<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
 
          <a class="btn btn-warning" href="login.php"> Sign Out </a>

        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- stadium section -->

  <br>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Stadium Information
        </h2>
      </div>

      <div>
        <div class="row grid">
        <?php
          $mysqli = mysqli_connect("localhost","team22","team22","team22");
          if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
          } else {
            $sql = "SELECT * FROM stadium";
            $res = mysqli_query($mysqli, $sql);
            if ($res) {
              while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $id = $newArray['stadium_id'];

                $name = $newArray['name'];
                $hometown = $newArray['hometown'];
                $source = "images/stadium_image/" . (string)$id . ".jpg";
                echo "<form name=\"frm\" action=\"stadium_info.php\" method=\"POST\">";
                  echo "<div class=\"col-sm-6 col-lg-4 all\">";
                    echo "<div class=\"box\">";
                      echo "<div>";
                        echo "<div class=\"img-box\">";
                          echo "<img src=$source alt=\"\">";
                            echo "</div>";
                        echo "<div class=\"detail-box\">";
                          echo "<h6>".$name."</h5>";
                          echo "<h5>".$hometown."</h5>";
                          echo "<br>";
                          echo "<div class=\"options\">";
                            echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
                            echo "<input type=\"submit\" value=\"more details\" class=\"btn btn-warning\" onclick=\"javascript:document.frm.submit();\">";
                            echo "<br>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</form>";
              }
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
  </section>

  <!-- end stadium section -->

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