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

  <div class="hero_area">
    <div class="bg-box">
        <img src="images/volleymain.png" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="">
            <span>
              volley volley
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- signup section -->
  <section class="book_section layout_padding">
    <div class="bg-box">
        <img src="images/volleymain.png" alt="">
    </div>
    <div class="container">
      <div class="heading_container">
        <h2 style="color:#ffffff">
          Sign Up
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="./join.php" method="POST" onsubmit="return checkSubmit()">
              <div>
                <input type="text" class="form-control" placeholder="ID" name="uid" id="uid"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cPwd" id="cPwd"/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="NickName" name="name" id="name"/>
              </div>
              <div class="btn_box">
                <button type="submit" class="btn btn-warning">
                  Sign up now!
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
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
                            <p>
                                team1 vs team2
                            </p>
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
                                team1
                            </p>
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
                                player1
                            </p>
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
      </div>
    </div>
  </section>
  <!-- end sign up section -->

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
				function checkSubmit() {
    			var idCheck = document.getElementById("uid");
    			var pwCheck1 = document.getElementById("pwd");
    			var pwCheck2 = document.getElementById("cPwd");
    			var name = document.getElementById("name");
 
 
    			if(idCheck.value.length == 0){
        		alert('Please enter your ID.');
        		return false;
    			}
    			if(pwCheck1.value.length == 0){
        		alert('Please enter your password.');
        		return false;
    			}
    			if(pwCheck2.value != pwCheck1.value){
    				alert('Please confirm your password.');
        		return false;
    			}
    			if(name.value.length == 0){
    				alert('Please enter your Nickname.');
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