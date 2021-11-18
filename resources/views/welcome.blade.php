<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<title>Document</title>
</head>
<body>





    <div class="hero-img">
        @include('inc.navbar')
          <div class="mt-5 container">
          <h1 class="display-4 text-light"><strong>Your Journey To <br> The Quran</strong></h1>
          <p class="fs-5 text-light">Learn with Tutors you choose for Tajweed,<br>Recitation, Hifz and Arabic lessons,<br>in your time, at your rates.</p>
          <div>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                  I Want to learn
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a class="dropdown-item" href="/Hifz">Hifz</a></li>
                  <li><a class="dropdown-item" href="/Tajweed">Tajweed</a></li>
                  <li><a class="dropdown-item" href="/Recitation">Recitation</a></li>
                  <li><a class="dropdown-item" href="/Translation">Translation</a></li>
                </ul>
              </div>
            </div> </div> </div> <br>

            <! -- End of Navbar and Hero image -->



            <! -- Three cards with Three simple steps -->
    <br><br>
    <div class="container-fluid text-center">
      <br>
      <h1>3 Simple Steps To Start</h1> <br>
      <div class="row">
        <div class="col-md-4">
          <h3>Find a Quran Tutor</h3> <br>
          <img style="height:200px; width: 200px;" src="images/muslim.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p class="card-text">You can  browse profiles  of hand-picked <br> online Quran teachers who teach Quran <br>  courses like Noorani Qaida, Quran Recitation, <br> Tajweed, Quran memorization and Arabic language. <br> </p>
        </div> <br> <br>
        <div class="col-md-4">
          <h3>Take a Demo Class</h3> <br>
          <img style="height:200px; width: 200px;" src="images/arab.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>Use your thirty minute free classroom <br> time to interview Quran. <br> Continue your Quran lessons with your <br> selected tutor by choosing a classroom plan</p>
        </div> <br>
        <div class="col-md-4">
          <h3>Start Learning Quran</h3> <br>
          <img style="height:200px; width: 200px;" src="images/quran.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p class="card-text">"Recite in the name of your Lord <br> who created.Created man from a <br> clinging substance.Recite, and your <br> Lord is the most Generous."</p>
        </div>
        <center><button type="button" class="btn btn-success mt-3">Find Tutor</button></center>
      </div>
    </div> <br><br>

    <! -- End of three cards with steps -->

    <! -- container Portion, written advantages to join our Quran Learning website -->
    <div class="container-fluid text-center tutor">
      <br>
      <h1>Why Online Quran Learning</h1> <br>
      <div class="row">
        <div class="col-md-4">
          <img style="height:170px; width: 170px;" src="images/clock.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>No software needed, Log in and enjoy learning</p>
        </div>
        <div class="col-md-4">
          <img style="height:170px; width: 170px;" src="images/minaret.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>Learn Quran in your native language</p>
        </div>
        <div class="col-md-4">
          <img style="height:170px; width: 170px;" src="images/card2.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>Hire multiple tutors, one for each subject</p>
        </div>
      </div> <br><br>
      <div class="container-fluid text-center tutor">
        <div class="row">
          <div class="col-md-4">
            <img style="height:170px; width: 170px;" src="images/hijab.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
            <p>Female Tutors available</p>
          </div>
          <div class="col-md-4">
            <img style="height:170px; width: 170px;" src="images/rosary.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
            <p>Choose from our handpicked, verified Quran Tutors</p>
          </div>
          <div class="col-md-4">
            <img style="height:170px; width: 170px;" src="images/islam.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
            <p>Safe learning environment for you and kids</p>
          </div>
        </div>
      </div> <br><center><button type="button" class="btn btn-success mt-3">SignUp as Tutor</button></center> <br>
    </div>
    <! --End of container Portion, written advantages to join our Quran Learning website -->




    <div class="container-fluid text-center">
      <br> <br>
      <h1>Register as a tutor on Qutor</h1> <br>
      <div class="row">
        <div class="col-md-4">
          <h3>Build your profile</h3> <br>
          <img style="height:150px; width: 150px;" src="images/website.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>Build your Quran Tutor profile and choose <br> the Quran courses you want to teach, <br> like online Tajweed, Hifz memorization and Arabic <br> Language course.</p>
        </div>
        <div class="col-md-4">
          <h3>Launch</h3> <br>
          <img style="height:140px; width: 140px;" src="images/chatting.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>You can message Quran students and they <br> can message you. If you are a <br> good match, set up your first Quran <br> lesson and start teaching your online Quran classes</p>
        </div>
        <div class="col-md-4">
          <h3>Teach and Earn</h3> <br>
          <img style="height:140px; width: 140px;" src="images/dollar.png" class="card-img-top rounded mx-auto d-block" alt="Card"> <br>
          <p>Set your hourly rate and every minute <br> you spend teaching Quran classes gets logged <br> so you know how much to bill each student. <br> Students pay you directly</p>
        </div>
      </div>
    </div> <br><br> <br>


    <!-- Carousel -->
    <div class="container-xl">
	<div class="row">
		<div class="col-lg-8 mx-auto">
			<h2>What they say about us</h2> <br><br>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="img-box"><img src="images/hijab.png" alt=""></div>
						<p class="testimonial">
              JazakumAllah Khair for what you are doing to help others with Quran. May Allah (SWT) reward you!
              </p>

					</div>
					<div class="carousel-item">
						<div class="img-box"><img src="images/arab.png" alt=""></div>
						<p class="testimonial">
              I was quite pleased with the classroom and the tutor. My daughter finished reading the Quran. We will definitely recommend it to others as well in sha Allah.
              </p>

					</div>
					<div class="carousel-item">
						<div class="img-box"><img src="images/cardd1.jpg" alt=""></div>
						<p class="testimonial">
              Alhamdulillah we are pleased to continue the Quran lessons for my daughter with our Quran Tutor.
              </p>
					</div>

          <div class="carousel-item">
						<div class="img-box"><img src="images/cardd.jpg" alt=""></div>
						<p class="testimonial">
              Alhamdulillah, my one-on-one Quran lessons are going great. I'm very thankful that I found my Quran Tutor through your website! I find it a great way to learn Quran.
            </p>
					</div>
				</div>
				<!-- Carousel controls --> <br><br>
				<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
</div>

    <footer class="home_footer"> <br> <br>
      <div class="container-fluid">
        <div class="row text-center text-light">
          <div class="col-md-3">
            <h3 class="font-w8">Quran Learning</h3>
            <hr class="dropdown-divider"> <br>
            <p class="font-w8">Interactive Quran makes Quran learning easy for kids and adults</p> <br> <br>
          </div>
          <div class="col-md-3">
            <h3 class="font-w8">Quick Links</h3>
            <hr class="dropdown-divider"> <br>
            <p class="font-weight-bold"><i class="pr-3 text-light fs-4 fas fa-user-plus "></i>SignUp</p>
            <p class="font-weight-bold"><i class="pr-3 text-light fs-4 fas fa-sign-in-alt "></i>Login</p> <br> <br>
          </div>
          <div class="col-md-3">
            <h3 class="font-w8">Follow Up</h3>
            <hr class="dropdown-divider"> <br>
            <i class="fs-3 fab fa-instagram"></i>
            <i class="pl-4 fs-3 fab fa-facebook-f"></i>
            <i class="pl-4 fs-3 fab fa-youtube"></i> <br><br> <br>
          </div>
          <div class="col-md-3">
            <h3 class="font-w8">Contact Us</h3>
            <hr class="dropdown-divider"> <br>
            <h5 class="font-w8">+923413735671</h5>
            <h5 class="font-w8">mr.awaisdanish@gmail.com</h5>
          </div>
        </div> <br><br><br>
      </div>
    </footer>
</body>
</html>
