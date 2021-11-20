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
            Update Result
          </h2>
          <br>
            <div>

            <?php
              $game_id=$_POST['game_id']; //id 받아올 변수

              $conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결
              
              $sql="select * from game WHERE id=".$game_id;
              $result=mysqli_query($conn, $sql);
              
              $club_array=["GS Caltex Seoul KIXX", "IBK Altos", "KGC Pro Volleyball Club", 
              "AI Peppers", "Heungkuk Life Insurance Pink Spiders",
              "Korea Expressway Corporation Hi-Pass", "HDEC Hillstate"];
              if ($result==TRUE){
                while($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  $club1=$newArray['club1'];
                  $club2=$newArray['club2']; 
                }
                echo "<H3>".$club_array[$club1-1]."</H3>";
                echo "<H3> VS </H3>";
                echo "<H3>".$club_array[$club2-1]."</H3>";

              }
              mysqli_close($conn);

            ?>

<br>
<br>
            <H5> update game result: winner </H5>
            <form action="./gameUpdate.php" method="POST">
                <select name="winner" id="winner">
                    <option value=1>GS Caltex Seoul KIXX</option>
                    <option value=2>IBK Altos</option>
                    <option value=3>KGC Pro Volleyball Club</option>
                    <option value=4>AI Peppers</option>
                    <option value=5>Heungkuk Life Insurance Pink Spiders</option>
                    <option value=6>Korea Expressway Corporation Hi-Pass</option>
                    <option value=7>HDEC Hillstate</option>
                </select>

              <?php
              echo "<input type=\"hidden\" name=\"game_id\" value=\"$game_id\">";
              echo "<input type=\"hidden\" name=\"club1\" value=\"$club1\">";
              echo "<input type=\"hidden\" name=\"club2\" value=\"$club2\">";
              ?>
              <input type="submit" value="update" class="btn btn-warning"/>
            </form>
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
  <script>
    function checkSubmit(){
    var uNickName = document.getElementById("uNickName");
    
    if(userId.value.length == 0){
      alert('please enter new NickName');
      return false;
    }
    
    return true;
    }
    //if ('addEventListener' in window) {
      //window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
      //document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    //}
    
  </script>
</body>

</html>