<?php
//index.php

$error = '';
$name = '';
$email = '';
$contact = '';
// $message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p>Please Enter your Name</p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p>Only letters and white space allowed</p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p>Please Enter your Email</p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p>Invalid email format</p>';
  }
 }
 if(empty($_POST["contact"]))
 {
  $error .= '<p>Contact is required</p>';
 }
 else
 {
  $contact = clean_text($_POST["contact"]);
 }
 // if(empty($_POST["message"]))
 // {
 //  $error .= '<p><label class="text-danger">Message is required</label></p>';
 // }
 // else
 // {
 //  $message = clean_text($_POST["message"]);
 // }

 if($error == '')
 {
  $file_open = fopen("contact_data1.csv", "a");
  $no_rows = count(file("contact_data1.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'contact' => $contact,
   // 'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = 'Thank';
  $name = '';
  $email = '';
  $contact = '';
  // $message = '';
 }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- icon title and our CSS -->    
    <link rel="shortcut icon" href="vikasicon.ico">
    <title>Home | Dr. Mahatme</title>
    <link rel="stylesheet" type="text/css" href="./mainpage.css">
    <link rel="stylesheet" type="text/css" href="./footer.css">
    <link rel="stylesheet" type="text/css" href="./contact_box.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans">
    <link rel="stylesheet" type="text/css" href="./animate.css">
    <link rel="stylesheet" type="text/css" href="./footer.css">

<!--     <link rel="stylesheet" type="text/css" href="Newpages/navbar.css">
    <link rel="stylesheet" type="text/css" href="Newpages/footer.css"> -->
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Kristi" rel="stylesheet"> -->
      <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


      <!--submit button  -->


  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->

    <style>
      @import url(https://fonts.googleapis.com/css?family=Raleway:100,600,400);
    </style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>



      <!-- submit button ends -->

    <script>
    // Hide Header on on scroll down
    document.onreadystatechange = function (){
        var didScroll;
        var lastScrollTop = 0;
        var delta = 60;
        var navbarHeight = $('header').outerHeight();
        $(window).scroll(function(event){
            didScroll = true;
        });
        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);
        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > navbarHeight*2){
                // Scroll Down
                $('header').fadeIn(300).removeClass('nav-up').addClass('nav-down');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').fadeOut(200).removeClass('nav-down').addClass('nav-up');
                }
            }
            
            lastScrollTop = st;
        }
    }
    </script>
 </head>



  <body>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <header class="nav-up">
                <nav class="navbar sticky-top navbar-expand-xl navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <h3>        Dr. Vikas Mahatme</h3>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse nbar" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="about.html">About me</a>
                                <a class="dropdown-item" href="visionmahatme.html">Vision</a>
                                <a class="dropdown-item" href="bjpfornation.html">with BJP</a>
                                <a class="template-links dropdown-item" href="nagpurconstituency.html">Nagpur Constituency</a>
                            </div>
                                
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                At Nation's Service
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="nation.html" class="dropdown-item" >Debates and Issues Raised In Parliament</a>
                                <a href="achievements.html" class="dropdown-item" >Achievements</a>
                                <a href="initiatives.html" class="dropdown-item" >Major Initiatives</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="news.html">News</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gallery
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="gallery.html">Photo Gallery</a>
                                <a class="dropdown-item" href="videos.html">Videos</a>
                                <a class="dropdown-item" href="#">Speeches</a>
                                </div>
                            </li>
                            </ul>
                            <form class="form-inline">
                            <a href="https://padmshridrmahatme.blogspot.com/"><button id="blog" class="btn btn-outline-success" type="button">Blog</button></a>
                            <a href="connect.html"><button id="join" class="btn btn-outline-success" type="button" >Connect</button></a>
                        </form>
                        </div>
                    </nav>
            </header>




    <nav class="navbar tempnav navbar-expand-xl navbar-dark">
            <a class="navbar-brand" href="index.html">
                <h3>        Dr. Vikas Mahatme</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tempnavbarSupportedContent" aria-controls="tempnavbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse nbar" id="tempnavbarSupportedContent">
                <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="about.html">About me</a>
                    <a class="dropdown-item" href="visionmahatme.html">Vision</a>
                    <a class="dropdown-item" href="bjpfornation.html">with BJP</a>
                    <a class="template-links dropdown-item" href="nagpurconstituency.html">Nagpur Constituency</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    At Nation's Service
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="nation.html" class="dropdown-item" >Debates and Issues Raised In Parliament</a>
                    <a href="achievements.html" class="dropdown-item" >Achievements</a>
                    <a href="initiatives.html" class="dropdown-item" >Major Initiatives</a>
                    </div>
                </li>

<!--                 <li class="nav-item">
                    <a href="journey.html" class="nav-link" >Journey</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="news.html">News</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gallery
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="gallery.html">Photo Gallery</a>
                    <a class="dropdown-item" href="videos.html">Videos</a>
                    <a class="dropdown-item" href="#">Speeches</a>
                    </div>
                </li>
                </ul>
                <form class="form-inline">
                <a href="https://padmshridrmahatme.blogspot.com/"><button id="blog" class="btn btn-outline-success" type="button">Blog</button></a>
                <a href="connect.html"><button id="join" class="btn btn-outline-success" type="button" >Connect</button></a>
            </form>
            </div>
        </nav>


    <!-- the carousel -->
    <div id="theCarousel" class="carousel slide" data-ride="carousel">
      

    <ol class="carousel-indicators">
     <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
     <li data-target="#theCarousel" data-slide-to="1"></li>
     <li data-target="#theCarousel" data-slide-to="2"></li>
    </ol>
      
    
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- the contact form -->
            <div class="d-none d-lg-block">
                <div class=" centeredwhite animated slideInRight">
                <!-- <div class="centeredwhite"> -->
                    <div class="wrap-contact100">
                        <form class="contact100-form validate-form" method="post" >
                            <span class="contact100-form-title">
                                Participate in Nation Building
                            </span>

                            <div id="colcontent" class= "collapse">
                                <p>Join us to participate in policy making. We will reach out to you.</p>
                            </div>
                            <?php echo $error; ?>
                            <div class="wrap-input100 validate-input" data-validate="Name is required">
                                <span class="label-input100">Your Name</span>
                                <input class="input100" type="text" name="name" placeholder="" value="<?php echo $name; ?>" />
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="" value="<?php echo $email; ?>"/>
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" >
                                <span class="label-input100">Contact Number</span>
                                <input class="input100" type="text" name="contact" placeholder="" <?php echo $contact; ?> />
                                <span class="focus-input100"></span>
                            </div>


                            <!-- <div class="container-contact100-form-btn">
                                <div class="ajax-button">
                                    <div class="fa fa-check done"></div>
                                        <div class="fa fa-close failed"></div>
                                            <a href="#colcontent" data-toggle ="collapse">
                                                <input id="submit" class="submit" name="submit" type="button" value="Submit"/>
                                            </a>
                                </div>
                            </div> -->
                          <!-- <a href="index.php"> -->
                          <div class="form-group" align="center">
                          <input type="submit" name="submit" class="btn btn-info" value="Submit" />
                         </div>               
                         <!-- </a>              -->
                        </form>
                    </div>
                </div>
                <!-- </div> -->
            </div>




            <div id="dropDownSelect1"></div>

            <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="vendor/jquery/jquery-3.2.1.min.js"></script>
            <script src="vendor/animsition/js/animsition.min.js"></script>
            <script src="vendor/bootstrap/js/popper.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="vendor/select2/select2.min.js"></script>
            <script>
                $(".selection-2").select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $('#dropDownSelect1')
                });
            </script>
            <script src="vendor/daterangepicker/moment.min.js"></script>
            <script src="vendor/daterangepicker/daterangepicker.js"></script>
            <script src="vendor/countdowntime/countdowntime.js"></script>
            <script src="js/main.js"></script>

            <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');
            </script>


            <div class="imgcontainer">
            <img class="d-block w-100" src="images/pic2.jpg" max-height=652px alt="First slide">
            </div>


        </div>
        
        <!-- <div class="carousel-item">
            <div class="centered111">
                <h5 >Join Dr.Vikas Mahatme</h5> 
                <h2 >Youth in policy</h2> 
            </div>        
            <img class="d-block w-100" src="images/pic6.jpg" max-height=652px alt="Second slide">
        </div> -->


<!--         <div class="carousel-item">
            <div class="centered111">
                <h5 >Join Dr.Vikas Mahatme</h5> 
                <h2 >Youth in policy</h2> 
            </div>        
            <img class="d-block w-100" src="images/pic6.jpg" alt="Third slide">
        </div> -->

    </div>

        <a class="carousel-control-prev" href="#theCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#theCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <!-- carousel ends -->

    
    <!-- <div class=".d-none"> -->
        <div class="mycontainer">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wrap-contact100">
                        <form class="contact100-form validate-form" >
                            <span class="contact101-form-title">
                                Participate in Nation Building
                            </span>

                            <div id="colcontent" class= "collapse">
                                <p>Join us to participate in policy making. We will reach out to you.</p>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Name is required">
                                <span class="label-input100">Your Name</span>
                                <input class="input100" type="text" name="name" placeholder="">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Valid contact is required: 9999999999">
                                <span class="label-input100">Contact Number</span>
                                <input class="input100" type="text" name="contact" placeholder="">
                                <span class="focus-input100"></span>
                            </div>


                            <div class="container-contact100-form-btn">
                                <div class="ajax-button">
                                    <div class="fa fa-check done"></div>
                                        <div class="fa fa-close failed"></div>
                                            <a href="#colcontent" data-toggle ="collapse">
                                                <input id="submit" class="submit1" type="button" value="Submit">
                                            </a>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>          
            </div>
        </div>
    <!-- </div> -->
    



    <!-- the row splits -->
    <div class="row splitout">
        <!-- <div class="animated slideInLeft"> -->
        <div id="splitout1" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 center animated slideInLeft">
          <P>Lorem ipsum dolor sit amet</P>
          <H4> CONSECTETUR ADIPISCING ELIT
          </H4>
          <button type="button" id="exploreinitiative1" class="btn btn-outline-success">Contribute</button>
        </div>
        <!-- </div> -->
        <!-- <div class="animated slideInRight"> -->
        <div id="splitout2" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 center animated slideInRight">
          <P>Lorem ipsum dolor sit amet</P>
          <H4> CONSECTETUR ADIPISCING ELIT
          </H4>
          <button type="button" id="exploreinitiative2" class="btn btn-outline-success">Contribute</button>
        </div>
        <!-- </div> -->
    </div>

    <section id = "initiatives"> 
        <div class="container">
        <div class="row ">
        <div class="headerinitiative">
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus reiciendis consectetur exercitationem vero neque hic</h1>
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
        </div>
        <div class="in col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="image">
                <img src="./images/pic1.jpg" class="imginitiative img-responsive img-thumbnail">
            </div>
            <div class="buttoninitiative">
                <button id="exploreinitiative2" class="btn btn-outline-success" type="button">init1</button>
            </div>
        </div>
        <div class="in col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="image">
                <img src="./images/pic2.jpg" class="imginitiative img-responsive img-thumbnail">
            </div>
            <div class="buttoninitiative">
                <button id="exploreinitiative2" class="btn btn-outline-success" type="button">init2</button>
            </div>
        </div>
        <div class="in col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="image">
                <img src="./images/pic3.jpg" class="imginitiative img-responsive img-thumbnail">
            </div>
            <div class="buttoninitiative">
                <button id="exploreinitiative2" class="btn btn-outline-success" type="button">init3</button>
            </div>
        </div>
    </div>
    </div> 
    </section>


<!--     <div class = "featured-article">
            <img src="./images/pic4.jpg" class="imgarticle img-responsive"> 
            <div class="article">
                <h3>Featured Article</h3>
            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat consequatur inventore asperiores quasi minima.
            </h1>     
            <button id="exploreinitiative" class="btn btn-outline-success" type="button"><p>Read More</p></button>
            </div>
    </div>
 -->

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 featuredarticle">
<h3>Featured Article</h3>
            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat consequatur inventore asperiores quasi minima.
            </h1>
            <button id="exploreinitiative" class="btn btn-outline-success" type="button"><p>Read More</p></button>   <!--        <h1> Work hard </h1>
          <button type="button" id="exploreinitiative1" class="btn btn-outline-success">Contribute</button> -->
        </div>

    <section id = "quote">
        <div class="jumbotron center">
            <p class="dark">       
                    "The most difficult thing is the decision to act, the rest is merely tenacity. The fears are paper tigers. You can do anything you decide to do. You can act to change and control your life; and the procedure, the process is its own reward."
            </p>
                
            <h3>    Join Dr Mahatme   </h3>
    
        <button type="button" id="exploreinitiative" class="btn btn-outline-success">Contribute</button>
        </div>
    </section>

    <!-- <div id="joinsection" class="row">
        <div class="col-lg-6 offset-lg-6 col-md-6 offset-md-6 col-sm-12 col-xs-12 transbackground">
          <h4>Column 2</h4>
          <p>         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla at libero at finibus. Mauris dui felis, sagittis in dapibus eget, porta quis elit. Donec sodales placerat porta. Vivamus laoreet magna eget facilisis condimentum. Donec porttitor elit nibh, et mollis nunc egestas at. Vestibulum tristique vehicula ligula vel mollis. Quisque ante lectus, tincidunt maximus scelerisque in, molestie nec eros. Vestibulum finibus, lacus at gravida condimentum, tellus mauris imperdiet orci.
        </p>
        </div>
    </div> -->
            
    <!-- fottttttttterrrr-->
    <div class="image-bottom">
            <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 imgsepration">
                        <img src="./images/pic1.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 imgsepration">
                        <img src="./images/pic5.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 imgsepration">
                        <img src="./images/pic3.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 imgsepration">
                        <img src="./images/pic4.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 imgsepration">
                        <img src="./images/pic2.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 imgsepration">
                        <img src="./images/pic6.jpg" class="img-responsive img-thumbnail">
                    </div>
                                        
            </div>
        </div>
        <div class="footer">
            <div class="bar">
                <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contributions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.html">News</a>
                </li>
                </ul>
            </div>
            <div class="socialmedia">
                <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.facebook.com/drmahatme/">
                        <span class="icon-container"><i class="fab fa-facebook-f"></i></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="icon-container"><i class="fab fa-twitter"></i></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.linkedin.com/company/bjp4india/">
                        <span class="icon-container"><i class="fab fa-linkedin"></i></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.youtube.com/user/BJP4India">
                        <span class="icon-container"><i class="fab fa-youtube"></i></span>
                    </a>
                </li>
                </ul>
            </div>
            <div class="vikas mahatme">
                <p class="text-justify text-center">
                Copyright © 2018 NAPsac. Site design handcrafted by Nikhil, Ankit and Pushpam.
                <a href="mailto:nikhil11kulkarni@gmail.com">Email Us</a> 
                </p>
            </div>
            <div class="copyright">
                <p class="text-justify text-center">
                    Honorable Dr Mahatme  |  Padma Shri Awardee
                </p>   
            </div>
        </div>
    
<!--     
  <div class="container-fluid"> -->
  <!-- <div class="centered">
          <h2>Follow Dr Mahatme</h2>
  </div> -->
  <!-- <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mycol">
          <ul>
              <li><a href="https://www.facebook.com/drmahatme/">
                  <span class="icon-container"><i class="fab fa-facebook-f"></i></span>
                  <span class="text">Facebook</span>
              </a></li>
          </ul>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mycol">
          <ul>
              <li><a href="#">
                  <span class="icon-container"><i class="fab fa-twitter"></i></span>
                  <span class="text">Twitter</span>
              </a></li>
          </ul>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mycol">
          <ul>
              <li><a href="https://www.linkedin.com/company/bjp4india/">
                  <span class="icon-container"><i class="fab fa-linkedin"></i></span>
                  <span class="text">LinkedIn</span>
              </a></li>
          </ul>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mycol">
            <ul>
                <li><a href="https://www.youtube.com/user/BJP4India">
                    <span class="icon-container"><i class="fab fa-youtube"></i></span>
                    <span class="text">Youtube</span>
                </a></li>
            </ul>
        </div>
  </div> -->
<!-- </div>
   -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- submit -->
   <!--  <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
  $(".submit").click(function() {
    $(".submit").addClass("loading");
    setTimeout(function() {
      $(".submit").addClass("hide-loading");
      // For failed icon just replace ".done" with ".failed"
      $(".done").addClass("finish");
    }, 3000);
    setTimeout(function() {
      $(".submit").removeClass("loading");
      $(".submit").removeClass("hide-loading");
      $(".done").removeClass("finish");
      $(".failed").removeClass("finish");
    }, 5000);
  })
});
      //# sourceURL=pen.js
    </script> -->
    <script src="https://static.codepen.io/assets/editor/live/css_reload-2a5c7ad0fe826f66e054c6020c99c1e1c63210256b6ba07eb41d7a4cb0d0adab.js"></script>

    <!-- submit -->


  </body>
</html>

















