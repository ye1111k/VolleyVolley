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

  $conn = mysqli_connect("localhost","team22","team22","team22");
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n",mysqli_connect_error());
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
        <h2>
          Player Information
        </h2>
      </div>
      <ul class="filters_menu">
      <?php
        $sql = "SELECT count(*) FROM player";
        $result = mysqli_query($conn, $sql);
        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li class=\"active\" data-filter=\"*\">All (".$count.")</li>";
      
        $sql = "SELECT club_id, count(*) FROM player GROUP BY club_id;";
        $result = mysqli_query($conn, $sql);

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".gscal\">GS Caltex (".$count.")</li>";

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".ibk\">IBK (".$count.")</li>";

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".kgc\">KGC (".$count.")</li>";

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".pepper\">Pepper (".$count.")</li>";

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".heungkuk\">Heungkuk (".$count.")</li>";

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".kec\">Korea Expressway (".$count.")</li>";

        $newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = $newArray['count(*)'];

        echo "<li data-filter=\".hdec\">HDEC (".$count.")</li>";
        
      ?>
      </ul>

      <div class="filters-content">
        <div class="row grid">
        <?php
          $sql = "SELECT * FROM player";
          $result = mysqli_query($conn, $sql);

          while($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $newArray['id'];
            $name = $newArray['name'];
            $club_id = $newArray['club_id'];
            $is_captain = $newArray['is_captain'];
            $uniform_number = $newArray['uniform_number'];
            
            $sql = "SELECT club_name FROM club WHERE club_id=".$club_id;
            $res = mysqli_query($conn, $sql);
            $newArr = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $club_name = $newArr['club_name'];
            
            if($club_id==1) echo "<div class=\"col-sm-6 col-lg-4 all gscal\">";
            else if($club_id==2) echo "<div class=\"col-sm-6 col-lg-4 all ibk\">";
            else if($club_id==3) echo "<div class=\"col-sm-6 col-lg-4 all kgc\">";
            else if($club_id==4) echo "<div class=\"col-sm-6 col-lg-4 all pepper\">";
            else if($club_id==5) echo "<div class=\"col-sm-6 col-lg-4 all heungkuk\">";
            else if($club_id==6) echo "<div class=\"col-sm-6 col-lg-4 all kec\">";
            else if($club_id==7) echo "<div class=\"col-sm-6 col-lg-4 all hdec\">";
            echo "<form name=\"frm\" action=\"player_info.php\" method=\"POST\">";
              echo "<div class=\"box\">";
                echo "<div>";
                  echo "<div class=\"img-box\">";
                    echo "<img src=\"images/player_image/".$club_id."/".$uniform_number.".jpg\" alt=\"\">";
                  echo "</div>";
                echo "<div class=\"detail-box\">";
                  echo "<h5>".$name."</h5>";
                  echo "<h6>".$club_name."</h6>";
                  if($is_captain==1) echo "<h5>CAPTAIN</h5>"; 
                  else echo "<h5><br></h5>";
                  echo "<div class=\"options\">";
                    echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
                    echo "<input type=\"submit\" value=\"more details\" class=\"btn btn-warning\">";
                    echo "<br>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            echo "</div>";
            echo "</form>";
          echo "</div>";
        }
        ?>

        </div>
      </div>
    </div>
  </section>
<!--여기까지-->
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