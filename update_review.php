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
 const drawStar = (target) => {
    document.querySelector(`.star span`).style.width = `${target.value * 10}%`;
  }
</script>
<body class="sub_page">
<?php
  session_start();

  $mysqli = mysqli_connect("localhost","team22","team22","team22");
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
  }
  //echo $_REQUEST['id'];
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
                <a class="nav-link" href="player.php">Player </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="stadium.php">Stadium<span class="sr-only">(current)</span></a>
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

  <!-- stadium section -->
  <br>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <div id="target1">
            <h2>
            stadium information
            </h2>
        </div>
      </div>

      <div class="filters-content">
          <div class="col-sm-12 col-lg-12">
            <div class="box">
              <div>
                  <?php
                    
                      $sql="select * from stadium where stadium_id=" . $_REQUEST['stadium_id'];
                      $res = mysqli_query($mysqli, $sql);
                      if ($res) {
                        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                          $id = $newArray['stadium_id'];
                          $name = $newArray['name'];
                          $hometown = $newArray['hometown'];
                          $source = "images/stadium_image/" . (string)$id . ".jpg";
                        }
                        echo "<div class=\"img-box\">";
                          echo "<img src=$source alt=\"\">";
                        echo "</div>";
                        echo "<div class=\"detail-box\" style=\"text-align: center\">";
                        echo "<h5>".$name."</h5>";
                        echo "<h5>".$hometown."</h5>";
                      }
                      else {
                        printf("Could not retrieve records: %s\n",mysqli_error($mysqli));
                      }
                      mysqli_free_result($res);
                      
                  ?>
                  </div>
              </div>
          </div>

          <div class="club">
            <div>
                <h4>&emsp; Public Transport</h3>
                    <div class="wrapper">
                      <?php
                        
                          $sql="select * from public_transport where stadium_id=" . $_REQUEST['stadium_id'];
                          $res = mysqli_query($mysqli, $sql);
                          if ($res) {
                            $sql2 = "select min(distance_stadium) from public_transport where stadium_id=" . $_REQUEST['stadium_id'];
                            $res2 = mysqli_query($mysqli, $sql2);

                            while($min_distance = mysqli_fetch_array($res2, MYSQLI_ASSOC)){
                              $min_value = $min_distance['min(distance_stadium)'];
                            }
                            
                            $num = 0;
                            $array=["one", "two", "three"];
                            while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                              $id = $newArray['stadium_id'];
                              $name = $newArray['name'];
                              $vehicle = $newArray['vehicle'];
                              $distance_stadium = $newArray['distance_stadium'];
                              if ($vehicle == 1){
                                $number = $newArray['bus_number'];
                                $vehicle_name="bus";
                              }
                              else {
                                $number = $newArray['station_number'];
                                $vehicle_name="subway";
                              }

                              if ($distance_stadium == $min_value) {
                                echo "<div style=\"color:yellow\" class=".$array[$num].">";
                              }
                              else {
                                echo "<div class=".$array[$num].">";
                              }
                                echo "<h6>".$vehicle_name."</h6>";
                                echo "<h6>".$number."</h6>";
                                echo "<h6>".$name."</h6>";
                                echo "<h6>".$distance_stadium." meters away</h6>";
                              echo "</div>";
                              $num = $num + 1;
                            }
                          }
                          else {
                            printf("Could not retrieve records: %s\n",mysqli_error($mysqli));
                          }
                          mysqli_free_result($res);
                          
                      ?>
                    </div>
            </div>
        </div>

        <div class="club">
            <div>
                <h4>&emsp; Restaurant</h3>
                    <div class="wrapper2">
                      <?php
                          
                            $sql="select * from restaurant where stadium=" . $_REQUEST['stadium_id'];
                            $res = mysqli_query($mysqli, $sql);
                            if ($res) {
                              $num = 0;
                              $array=["one2", "two2"];
                              while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                $id = $newArray['stadium'];
                                $name = $newArray['name'];
                                $main_dish = $newArray['main_dish'];
                                $distance_stadium = $newArray['distance_stadium'];
                                echo "<div class=".$array[$num].">";
                                  echo "<h6>".$name."</h6>";
                                  echo "<h6>".$main_dish."</h6>";
                                  echo "<h6>".$distance_stadium." meters away</h6>";
                                echo "</div>";
                                $num = $num + 1;
                              }
                            }
                            else {
                              printf("Could not retrieve records: %s\n",mysqli_error($mysqli));
                            }
                            mysqli_free_result($res);
                            
                        ?>

                    </div>
            </div>
        </div>

        <div class="club">
            <div>
              <h4>&emsp; Update review </h3>
              <?php
                
                  $sql="select avg(star_num) from review where stadium_id=" . $_REQUEST['stadium_id'];
                  $res = mysqli_query($mysqli, $sql);
                  if ($res) {
                    while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                      $val=$newArray['avg(star_num)'];
                      echo "<h5 style=\"float:right; color: yellow;\"> ★" . number_format($val, 2) . " </h5>";
                    }
                  }
                  else {
                    printf("Could not retrieve records: %s\n",mysqli_error($mysqli));
                  }
                  mysqli_free_result($res);
                  mysqli_close($mysqli);
              ?>
              
              <form action="./update_review_register.php" method="POST" onsubmit="return checkSubmit()">
                <div class="write">
                  <span class="star">
                    ★★★★★
                    <span>★★★★★</span>
                    <input type="range" name="star" oninput="drawStar(this)" value="1" step="1" min="0" max="10">
                  </span>
                  <input type="text" class="form-control" placeholder="update" name="rv"/>
                  <?php
                    $review_id=$_REQUEST['review_id'];
                    echo "<input type=\"hidden\" name=\"id\" value=".$review_id.">";
                  ?>
                  <input type="submit" value="register" class="btn btn-warning" style="margin-top: 10px">
                </div>
              </form>
            </div>
        </div>

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
