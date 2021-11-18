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

<script>

  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){            
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
    });
  });
  
</script>

<body>
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
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="club.php">Club</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="player.php">Player</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stadium.php">Stadium</a>
              </li>
            </ul>

          <a class="btn btn-warning" href="login.php"> Sign Out </a>
          &nbsp;
          <a class="btn btn-warning" href="withdraw.php"> Withdraw </a>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Today's Match
                    </h1>
                    <?php
                      $today=date("Y-m-d");

                      echo $today;

                      $sql = "SELECT * FROM game WHERE date(schedule) = date(now());";
                      $result=mysqli_fetch_array(mysqli_query($conn, $sql));

                      if($result==FALSE){
                        echo "<p>There's no match today.</p>";
                      }
                      else{
                        $club1_id = $result['club1'];
                        $club2_id = $result['club2'];
                        $schedule = $result['schedule'];
                        $stadium_id = $result['stadium_id'];

                        $sql = "SELECT club_name FROM club WHERE club_id=".$club1_id;
                        $result = mysqli_query($conn, $sql);
                        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $club1 = $newArray['club_name'];

                        $sql = "SELECT club_name FROM club WHERE club_id=".$club2_id;
                        $result = mysqli_query($conn, $sql);
                        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $club2 = $newArray['club_name'];

                        $sql = "SELECT name FROM stadium WHERE stadium_id=".$stadium_id;
                        $result = mysqli_query($conn, $sql);
                        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $stadium = $newArray['name'];

                        echo "<p> <h3><b>".$club1."</b></h3> vs <h3><b>".$club2." </b></h3></p>";
                        echo $schedule;
                        echo " at <b>".$stadium."</b>";
                        echo "<div class=\"btn-box\">";
                          echo "<a href=\"#target1\" class=\"btn1\">";
                          echo "show detail";
                          echo "</a>";
                        echo "</div>";  
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Today's Team
                    </h1>
                    <p>
                    <?php
                      $today_number = (idate("Y") + idate("m") + idate("d"));
                      $player_number = $today_number%7;
                      
                      $sql = "SELECT * FROM club WHERE club_id=".$player_number;
                      $result = mysqli_query($conn, $sql);
                      $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
                      
                      $club_name = $newArray['club_name'];

                      echo "<h3><b>".$club_name."</b></h3>";
                    ?>
                    </p>
                    <div class="btn-box">
                      <a href="club.php" class="btn1">
                        show more teams
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Today's Player
                    </h1>
                    <p>
                    <?php
                      $player_number = $today_number%125;
                      
                      $sql = "SELECT * FROM player WHERE id=".$player_number;
                      $result = mysqli_query($conn, $sql);
                      $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
                      
                      $name = $newArray['name'];
                      $club_id = $newArray['club_id'];
                      $uniform_number = $newArray['uniform_number'];
                      $position = $newArray['position'];
                      
                      $sql = "SELECT club_name FROM club WHERE club_id=".$club_id;
                      $result = mysqli_query($conn, $sql);
                      $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);

                      $club_name = $newArray['club_name'];

                      echo "<h3><b>".$name."</b></h3>(".$club_name.", ".$position.", ".$uniform_number.")";
                    ?>
                    </p>
                    <div class="btn-box">
                      <a href="player.php" class="btn1">
                        show more players
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- game section -->

  <br>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <div id="target1">
        <h2>
          Game Schedule
        </h2>
      </div>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".past">Past</li>
        <li data-filter=".upcoming">Upcoming</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">

          <?php
            $sql = "SELECT * FROM game ORDER BY schedule ASC;";
            
            $result = mysqli_query($conn, $sql);
            while($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              $game_schedule = $newArray['schedule'];
              
              $club1_id = $newArray['club1'];
              $club2_id = $newArray['club2'];
              $stadium_id = $newArray['stadium_id'];

              $sql = "SELECT club_name FROM club WHERE club_id=".$club1_id;
              $res = mysqli_query($conn, $sql);
              $newArr = mysqli_fetch_array($res, MYSQLI_ASSOC);
              $club1 = $newArr['club_name']; //club1

              $sql = "SELECT club_name FROM club WHERE club_id=".$club2_id;
              $res = mysqli_query($conn, $sql);
              $newArr = mysqli_fetch_array($res, MYSQLI_ASSOC);
              $club2 = $newArr['club_name']; //club2

              $sql = "SELECT name FROM stadium WHERE stadium_id=".$stadium_id;
              $res = mysqli_query($conn, $sql);
              $newArr = mysqli_fetch_array($res, MYSQLI_ASSOC);
              $stadium = $newArr['name']; //stadium name

              
              if($game_schedule<$today){
                $win_club_id = $newArray['winner'];
                if(!isset($win_club_id)){
                  $win_club = "not upated yet";
                }
                else {
                  $sql = "SELECT club_name FROM club WHERE club_id=".$win_club_id;
                  $res = mysqli_query($conn, $sql);
                  $newArr = mysqli_fetch_array($res, MYSQLI_ASSOC);

                  $win_club = $newArr['club_name'];
                }

                echo "<div class=\"col-sm-12 col-lg-12 all past\">";
                  echo "<div class=\"box\">";
                    echo "<h5 style=\"color:#000000\">&nbsp</h5>";
                    echo "<table style=\"width:100%\">";
                      echo "<colgroup>";
                        echo "<col width=\"33%\"/>";
                        echo "<col width=\"33%\"/>";
                        echo "<col width=\"34%\"/>";
                      echo "</colgroup>";
                      echo "<tr style=\"text-align:center\">";
                        echo "<td>";
                          echo "<h3>".$club1."</h3>";
                        echo "</td>";
                        echo "<td>";
                          echo "<h5>VS</h5>";
                          echo "<br>";
                          echo "<h4>".$game_schedule."</h4>";
                          echo "<h4>".$stadium."</h4>";
                          echo "<h4>Winner: ".$win_club."</h4>";
                        echo "</td>";
                        echo "<td>";
                          echo "<h3>".$club2."</h3>";
                        echo "</td>";
                      echo "</tr>";
                    echo "</table>";
                  echo "</div>";
                echo "</div>";
              }
              else{
                echo "<div class=\"col-sm-12 col-lg-12 all upcoming\">";
                  echo "<div class=\"box\">";
                    echo "<h5 style=\"color:#000000\">&nbsp</h5>";
                      echo "<table style=\"width:100%\">";
                        echo "<colgroup>";
                          echo "<col width=\"33%\"/>";
                          echo "<col width=\"33%\"/>";
                          echo "<col width=\"34%\"/>";
                        echo "</colgroup>";
                        echo "<tr style=\"text-align:center\">";
                          echo "<td>";
                            echo "<h3>".$club1."</h3>";
                          echo "</td>";
                          echo "<td>";
                            echo "<h5>VS</h5>";
                            echo "<br>";
                            echo "<h4>".$game_schedule."</h4>";
                            echo "<h4>".$stadium."</h4>";
                        echo "</td>";
                        echo "<td>";
                          echo "<h3>".$club2."</h3>";
                        echo "</td>";
                      echo "</tr>";
                    echo "</table>";
                  echo "</div>";
                echo "</div>";
                echo "";
                echo "";
              }
            }
          ?>

        </div>
      </div>
    </div>
  </section>

  <!-- end game section -->

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