<!DOCTYPE html>
<html>
	<head>
		<!-- Metadata -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Satria Pinandita Abyatarsyah">
		<meta name="description" content="Ujian Tengah Semester mata kuliah Desain & Pemrograman Web">
		
		<title>Home</title>
		
		<!-- Logo Title -->
		<link rel="icon" href="<?= base_url('/img/logo(only badge).png') ?>">
		<!-- Eksternal CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('/style/style.css') ?>">
		<!-- Bootstrap Custom -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('/style/bs_style.css') ?>">
		<!-- Icon -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="info container-fluid">
			<marquee onmouseover="this.stop()" onmouseout="this.start()">
			<p class="my-auto py-2">Beasiswa Android Developer dan Associate Cloud Engineer dari Kominfo dan Kemnaker. Daftar segera!</p>
			</marquee>
		</div>
		<header class="container-sm container-md">
			<?php
			if (!empty($regist)) {
				if($regist == 1) {
					echo "<div class='mt-2' style='left: 50%; position: absolute;'>
							<div class='alert alert-success alert-dismissible fade show text-center'
							role='alert' style='z-index: 1; position: relative; left: -50%;'>
								<div class='d-flex align-items-center'>
									<span><strong>Successfully </strong> Registered!</span>
									<i class='btn-close' data-bs-dismiss='alert' aria-label='Close'></i>
								</div>
							</div>
						  </div>";
				}
			}			
			?>
			<?php if (!empty(session()->getFlashdata('error'))) : ?>
				<div class='mt-2' style='left: 50%; position: absolute;'>
					<div class='alert alert-danger alert-dismissible fade show text-center'
					role='alert' style='z-index: 1; position: relative; left: -50%;'>
						<div class='d-flex align-items-center'>
							<strong>
							<?php echo session()->getFlashdata('error'); ?>
							</strong>
							<i class='btn-close' data-bs-dismiss='alert' aria-label='Close'></i>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if (!empty(session()->getFlashdata('success'))) : ?>
				<div class='mt-2' style='left: 50%; position: absolute;'>
					<div class='alert alert-success alert-dismissible fade show text-center'
					role='alert' style='z-index: 1; position: relative; left: -50%;'>
						<div class='d-flex align-items-center'>
							<strong>
							<?php echo session()->getFlashdata('success'); ?>
							</strong>
							<i class='btn-close' data-bs-dismiss='alert' aria-label='Close'></i>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<nav id="navheader" class="navbar navbar-expand-lg navbar-light mt-3">
				<a class="navbar-brand" href="<?= base_url('/home') ?>">
					<img src="<?= base_url('/img/logo.png') ?>" alt="Logo Eduity" width="120">
				</a>
				<button class="navbar-toggler menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav fw-bold">
						<li class="nav-item px-2 px-lg-3">
							<a class="nav-link active" href="<?= base_url('/home') ?>">Home</a>
						</li>
						<li class="nav-item px-2 px-lg-3">
							<a class="nav-link" href="<?= base_url('/course') ?>">Course</a>
						</li>
						<li class="nav-item px-2 px-lg-3">
							<a class="nav-link" href="<?= base_url('/subscription') ?>">Subscription</a>
						</li>
						<li class="nav-item px-2 px-lg-3">
							<a class="nav-link" href="<?= base_url('/about') ?>">About</a>
						</li>
						<li class="nav-item px-2 px-lg-33">
							<a class="nav-link" href="<?= base_url('/contact') ?>">Contact</a>
						</li>
					</ul>
					<div class="d-flex w-100 justify-content-lg-end align-items-center">
						<?php if (!empty(session()->get('username'))) : ?>
							<i class="fa fa-user-circle-o me-1 fs-5"></i>
							<div class='dropdown fs-5'>
						          <a class='text-decoration-none text-black dropdown-toggle' id='user' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
						              <?php echo session()->get('username'); ?>
						          </a>
						          <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='user'>
						              <li><a class='dropdown-item' href='<?= base_url('/user/logout') ?>'>Logout</a></li>
						          </ul>
						    </div>
						<?php endif; ?>
						<?php if (empty(session()->get('username'))) : ?>
							<a href="#"class="align-self-center">
								<button class="rounded my-2 mx-2 px-2 py-1" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</button>
							</a>
							<a href="#" class="my-2 px-1">
								<button class="rounded px-3 py-1 button-outline" data-bs-toggle="modal" data-bs-target="#login">Login</button>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</nav>
			<!-- Sign Up Modal -->
			<div id="signup" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="row">
							<div class="pe-4 pt-2 text-end">
								<i class="fa fa-times close" aria-hidden="true" data-bs-dismiss="modal" style="cursor: pointer;"></i>
							</div>
						</div>
						<div class="row">
							<div class="text-center pt-3">
								<img src="<?= base_url('/img/logo(only badge).png') ?>" class="col-2 img-fluid">
							</div>
						</div>
						<div class="row mb-2">
							<div class="text-center pt-3">
								<h4 class="fw-bolder">Sign Up to Eduity</h4>
							</div>
						</div>
						<div class="row justify-content-center">
							<form class="col-10" action="<?= base_url('/user/registration') ?>" method="POST">
								<?= csrf_field(); ?>
								<div class="form-group mb-3">
									<label for="nama" style="font-weight: 500;">Fullname</label>
									<input name="nama" type="text" class="form-control" id="fullname" placeholder="Your Fullname" required>
								</div>
								<div class="form-group mb-3">
									<label for="username" style="font-weight: 500;">Username</label>
									<input name="username" type="text" class="form-control" id="username" placeholder="Your Username" required>
								</div>
								<div class="form-group mb-3">
									<label for="email" style="font-weight: 500;">Email address</label>
									<input name="email" type="email" class="form-control" id="email" placeholder="Your E-mail" required>
								</div>
								<div class="form-group mb-3">
									<label for="password" style="font-weight: 500;">Password</label>
									<input name="password" type="password" class="form-control" id="pass" placeholder="Your Password" required>
								</div>
								<div class="form-group text-center mb-3">
									<input class="form-check-input" type="checkbox" value="" id="terms" required>
									<label class="form-check-label" for="terms">
										I have read and agree to the <a href="<?= base_url('/home') ?>" style="color: #2FA4FF; font-weight: 500;">Terms and Conditions</a>
									</label>
								</div>
								<div class="w-100 text-center">
									<button name="registration" type="submit" class="rounded px-2 py-1 w-100 my-3">Sign Up</button>
								</div>
							</form>
						</div>
						<div class="row justify-content-center">
							<div class="col-10 d-flex align-items-center justify-content-around">
								<span class="line" style="width: 45%; border-radius: 90%;"></span>
								<span>Or</span>
								<span class="line" style="width: 45%; border-radius: 90%;"></span>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-5">
								<button type="button" class="rounded py-1 w-100 my-3 fw-bolder button-outline align-items-center"
								style="color: #000; font-size: 13px;">
									<img src="<?= base_url('/img/google_logo.png') ?>" class="img-fluid" id="img-google">
									<span class="brand-text"><span class="brand-text-addon">Sign up with </span>Google</span>
								</button>
							</div>
							<div class="col-5">
								<button type="button" class="rounded py-1 w-100 my-3 fw-bolder button-outline align-items-center"
								style="color: #000; font-size: 13px;">
									<img src="<?= base_url('/img/facebook_logo.png') ?>" class="img-fluid brand-img" id="img-facebook">
									<span class="brand-text"><span class="brand-text-addon">Sign up with </span>Facebook</span>
								</button>
							</div>
						</div>
						<div class="row justify-content-center mb-3">
							<div class="col-10 text-center">
								<span>Already have an Account?</span>
								<span data-bs-dismiss="modal"><a href="#" style="color: #2FA4FF; font-weight: 500;" data-bs-toggle="modal" data-bs-target="#login">
									Login here.
								</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Login Modal -->
			<div id="login" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="row">
							<div class="pe-4 pt-2 text-end">
								<i class="fa fa-times close" aria-hidden="true" data-bs-dismiss="modal" style="cursor: pointer;"></i>
							</div>
						</div>
						<div class="row">
							<div class="text-center pt-3">
								<img src="<?= base_url('/img/logo(only badge).png') ?>" class="col-2 img-fluid">
							</div>
						</div>
						<div class="row mb-2">
							<div class="text-center pt-3">
								<h4 class="fw-bolder">Login to Eduity</h4>
							</div>
						</div>
						<div class="row justify-content-center">
							<form action="<?= base_url('/user/login') ?>" method="POST" class="col-10">
								<?= csrf_field(); ?>
								<div class="form-group mb-3">
									<label for="username" style="font-weight: 500;">Username</label>
									<input name="username" type="text" class="form-control" id="username" placeholder="Your Username" required>
								</div>
								<div class="form-group mb-3">
									<label for="pass" style="font-weight: 500;">Password</label>
									<input name="password" type="password" class="form-control" id="pass" placeholder="Your Password" required>
								</div>
								<div class="w-100 text-center">
									<button type="submit" class="rounded px-2 py-1 w-100 my-3">Login</button>
								</div>
							</form>
						</div>
						<div class="row justify-content-center">
							<div class="col-10 d-flex align-items-center justify-content-around">
								<span class="line" style="width: 45%; border-radius: 90%;"></span>
								<span>Or</span>
								<span class="line" style="width: 45%; border-radius: 90%;"></span>
							</div>
						</div>
						<div class="row justify-content-center mb-3">
							<div class="col-5">
								<button type="button" class="rounded py-1 w-100 my-3 fw-bolder button-outline align-items-center"
								style="color: #000; font-size: 13px;">
									<img src="<?= base_url('/img/google_logo.png') ?>" class="img-fluid" id="img-google">
									<span class="brand-text"><span class="brand-text-addon">Login with </span>Google</span>
								</button>
							</div>
							<div class="col-5">
								<button type="button" class="rounded py-1 w-100 my-3 fw-bolder button-outline align-items-center"
								style="color: #000; font-size: 13px;">
									<img src="<?= base_url('/img/facebook_logo.png') ?>" class="img-fluid brand-img" id="img-facebook">
									<span class="brand-text"><span class="brand-text-addon">Login with </span>Facebook</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<img id="header-img-mobile" class="mobile mx-auto" src="<?= base_url('/img/header_edit.png') ?>">
				<div class="col-lg-6 header-text">
					<h1 class="fw-bold">From Student to Society</h1>
					<p>Education is for those who want to learn.<br>
					Get your education and start to work.</p>
					<a class="desktop" href="<?= base_url('/subscription')?>">
						<button class="rounded px-3 py-1">Learn now!</button>
					</a>
				</div>
				<img class="col-lg-6 header-img desktop" src="<?= base_url('/img/header_edit.png') ?>">
				<div id="header-button-mobile">
					<a class="mobile" href="<?= base_url('/home')?>">
						<button class="rounded px-3 py-1">Learn now!</button>
					</a>
				</div>
			</div>
		</header>
		<main class="my-5">
			<section id="trusted" class="container-sm container-md">
				<h3 class="text-center">Trusted by</h3>
				<div class="row align-items-center justify-content-around px-5">
					<img class="col-5 col-lg-2" src="<?= base_url('/img/brand1.png') ?>">
					<img class="col-5 col-lg-2" src="<?= base_url('/img/brand2.png') ?>">
					<img class="col-5 col-lg-2" src="<?= base_url('/img/brand3.png') ?>">
					<img class="col-5 col-lg-2" src="<?= base_url('/img/brand4.png') ?>">
				</div>
			</section>
			<section id="partner" class="container-sm container-md my-5">
				<h3 class="text-center mb-3 mb-lg-4">Our Partner</h3>
				<div class="row align-items-center justify-content-around">
					<img class="col-2 col-lg-1" src="<?= base_url('/img/campus1.png') ?>">
					<img class="col-2 col-lg-1" src="<?= base_url('/img/campus2.png') ?>">
					<img class="col-2 col-lg-1" src="<?= base_url('/img/campus3.png') ?>">
					<img class="col-2 col-lg-1" src="<?= base_url('/img/campus4.png') ?>">
					<img class="col-2 col-lg-1" src="<?= base_url('/img/campus5.png') ?>">
				</div>
			</section>
			<section id="event" class="container-fluid">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-5 p-5">
						<h3>Our Newest Event</h3>
						<p>In collaboration with partners, we organize several programs to support our learners.</p>
					</div>
					<div class="col-lg-7 px-5 pt-5 event">
						<div id="carouselEvent" class="carousel carousel-dark slide" data-bs-ride="carousel">
							<div class="carousel-indicators">
								<button type="button" data-bs-target="#carouselEvent" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
								<button type="button" data-bs-target="#carouselEvent" data-bs-slide-to="1" aria-label="Slide 2"></button>
								<button type="button" data-bs-target="#carouselEvent" data-bs-slide-to="2" aria-label="Slide 3"></button>
							</div>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="img-fluid"src="<?= base_url('/img/event1.jpg') ?>">
									<div>
										<h2>Workshop Augmented Reality</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
									</div>
									<div class="d-block m-5"></div>
								</div>
								<div class="carousel-item">
									<img class="img-fluid"src="<?= base_url('/img/event2.png') ?>">
									<div>
										<h2>Digital Marketing</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem Ipsum dolorado. </p>
									</div>
									<div class="d-block m-5"></div>
								</div>
								<div class="carousel-item">
									<img class="img-fluid"src="<?= base_url('/img/event3.jpg') ?>">
									<div>
										<h2>Marketing Summit</h2>
										<p>Lorem ipsum, consectetur adipisicing elit, sed do eiusmod	ex ea commodo labore et dolore magna aliqua. Ut enim ad minim veniam, Quis nostrud exercitation ullamco laboris nisi ut aliquip consequat dolor sit amet. </p>
									</div>
									<div class="d-block m-5"></div>
								</div>
							</div>
							<button class="carousel-control-prev control right" type="button" data-bs-target="#carouselEvent" data-bs-slide="prev">
							<span class="control-text">Previous</span>
							</button>
							<button class="carousel-control-next control left" type="button" data-bs-target="#carouselEvent" data-bs-slide="next">
							<span class="control-text">Next</span>
							</button>
						</div>
					</div>
				</div>
			</section>
			<section id="why" class="sontainer-sm container-md">
				<h3 class="text-center">Why Eduity?</h3>
				<p class="text-center">It's time to choose wisely your learning resources. Not only guaranteed material,<br>
				Eduity also has professional who will help you to learn.</p>
				<div class="row align-items-center justify-content-between">
					<div class="accordion accordion-flush col-lg-6" id="accordionFlushExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
							Global Industry Standard Curriculum
							</button>
							</h2>
							<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">The curriculum is developed with global companies and technology owners according to the needs of the latest industry.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
							Learn Whenever You Want
							</button>
							</h2>
							<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">Learn anytime, anywhere, independently. Free to choose classes according to interest in learning. Lifelong access to classes.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
							Professional is ready to help you
							</button>
							</h2>
							<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">Validate your skills by comparing the results of assignments given directly by professionals.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingFour">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
							Our Good Track Record
							</button>
							</h2>
							<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">A certificate that proves the fundamental knowledge along with the real skills that global companies want.</div>
							</div>
						</div>
					</div>
					<img class="col-lg-5" id="why-pic" src="<?= base_url('/img/why-eduity.png') ?>">
				</div>
			</section>
			<section id="category" class="py-5">
				<h3 class="text-center">Our Popular Categories</h3>
				<p class="text-center px-2 m-0">Categories will help you find what you want to study at Eduity</p>
				<p class="text-center px-2 pm-0">with a global industry standard curriculum</p>
				<div class="d-flex mx-auto justify-content-center flex-wrap" id="pop-cat">
					<?php 
					foreach ($kategori as $ka) : ?>
						<a href="<?= base_url('/course/display/' . $ka['kategori']); ?>">
							<button class="rounded px-3 py-1 me-2 mt-1 button-outline">
								<?= $ka['kategori']; ?>
							</button>
						</a>
					<?php endforeach; ?>
				</div>
			</section>
			<section id="course" class="container-sm container-md mt-5">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-5 ps-5 py-5 py-lg-0">
						<h3 class="ps-lg-5">Study with global industry standard classes</h3>
						<p class="ps-lg-5">Classes at Eduity are available for those who do not have skills (basic) to those who are already professionals.</p>
						<a href="<?= base_url('/course')?>" class="view-all ps-lg-5">
							View All
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
						</a>
					</div>
					<div class="marquee-container overflow-hidden col-lg-6">
						<div class="marquee overflow-hidden position-relative">
							<div class="marquee-inner">
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card course-card-notfull h-100" src="<?= base_url('/img/card-course2.png') ?>"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course1.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course3.png') ?>" style="width: 100%;"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course4.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card course-card-notfull h-100" src="<?= base_url('/img/card-course6.png') ?>"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course5.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course1.png') ?>" style="width: 100%;"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course2.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card course-card-notfull h-100" src="<?= base_url('/img/card-course4.png') ?>"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course3.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course5.png') ?>" style="width: 100%;"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course6.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card course-card-notfull h-100" src="<?= base_url('/img/card-course2.png') ?>"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course1.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course3.png') ?>" style="width: 100%;"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course4.png') ?>" style="width: 100%;"></a>
								</div>
								<div class="d-flex text-end">
									<a href="<?= base_url('/course')?>"><img class="course-card course-card-notfull h-100" src="<?= base_url('/img/card-course6.png') ?>"></a>
									<a href="<?= base_url('/course')?>"><img class="course-card" src="<?= base_url('/img/card-course5.png') ?>" style="width: 100%;"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="testimonials" class="container-sm container-md my-5">
				<div class="row align-items-center">
					<div class="col-md-6">
						<h5>Testimonials</h5>
						<h1>Our Learners Feedback</h1>
						<img class="img-fluid" id="testi-pic" src="<?= base_url('/img/testimonials-desc.png') ?>" alt="testimonials picture">
					</div>
					<div class="col-md-6">
						<div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="card ps-5 border-0">
										<img src="<?= base_url('/img/user1.png') ?>" class="card-img-top w-50 rounded" alt="testimonials1">
										<div class="card-body py-0">
											<h5 class="card-title m-0">Romuald Vladislav</h5>
											<p class="card-text text-secondary">Programming</p>
											<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. adipisicing elit.</p>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="card ps-5 border-0">
										<img src="<?= base_url('/img/user2.png') ?>" class="card-img-top w-50 ms-1" alt="testimonials2">
										<div class="card-body py-0">
											<h5 class="card-title m-0">Columbanus Hiawatha</h5>
											<p class="card-text text-secondary">Design</p>
											<p class="card-text">Lorem ipsum dolor sit amet, sed do eiusmod. sed do eiusmod do eiusmod.</p>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="card ps-5 border-0">
										<img src="<?= base_url('/img/user3.png') ?>" class="card-img-top w-50 ms-1" alt="testimonials3">
										<div class="card-body py-0">
											<h5 class="card-title m-0">John Washington</h5>
											<p class="card-text text-secondary">Marketing</p>
											<p class="card-text">tempor incididunt ut labore et dolore magna aliqua. dolore magna aliqua.</p>
										</div>
									</div>
								</div>
							</div>
							<button class="button-testimonials carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
							</button>
							<button class="button-testimonials carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
				</div>
			</section>
			<section id="cta" class="container-sm container-md">
				<div id="cta-container" class="py-3 py-md-5">
					<h1 class="mt-md-5 mb-0">What are you waiting for?</h1>
					<p>Join and learn whatever you want!</p>
					<a href="<?= base_url('/subscription')?>">
						<button class="rounded mb-md-5 px-3 py-1">Start Now!</button>
					</a>
				</div>
			</section>
		</main>
		<footer class="container-fluid py-4 bg-light">
			<div class="container-sm container-md m-auto row align-items-center justify-content-between">
				<div class="col-md-6 col-lg-3">
					<div class="row">
						<a href="<?= base_url('/home')?>">
							<img class="col-5 col-sm-3 col-md-5 col-lg-8 img-fluid" src="<?= base_url('/img/logo.png') ?>" alt="Logo Eduity">
						</a><br>
					</div>
					<a class="text-decoration-none text-black" href="tel:08710297289">(+62)87 1029 7289</a><br>
					<a class="text-decoration-none text-black" href="mailto:eduity@gmail.com">eduity@gmail.com</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/home')?>">Bandung, Indonesia</a><br>
					
					<div class="icons">
						<a class="text-decoration-none text-black" href="<?= base_url('/home')?>"><i class="fa fa-facebook"></i></a>
						<a class="text-decoration-none text-black" href="<?= base_url('/home')?>"><i class="fa fa-twitter"></i></a>
						<a class="text-decoration-none text-black" href="<?= base_url('/home')?>"><i class="fa fa-instagram"></i></a>
						<a class="text-decoration-none text-black" href="<?= base_url('/home')?>"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mt-4">
					<div class="row">
						<div class="col-sm-5 col-md-8">
							<h2 class="text-lg-center">Awards</h2>	
							<div class="row justify-content-md-around">
								<img class="col-3 col-sm-4 col-md-6 img-fluid"
								src="<?= base_url('/img/award1.png') ?>" alt="award1">
								<img class="col-3 col-sm-4 col-md-6 img-fluid"
								src="<?= base_url('/img/award2.svg') ?>" alt="award2">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mt-4">
					<h2>Category</h2>
					<a class="text-decoration-none text-black" href="<?= base_url('/home')?>">Privacy & Policy</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/home')?>">Terms & Condition</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/contact')?>">Customer Support</a><br>
					<a class="text-decoration-none text-black" href="mailto:eduity@gmail.com">For Business</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/contact')?>">Support</a>
				</div>
				<div class="col-md-6 col-lg-3 mt-4">
					<h2>Useful Links</h2>
					<a class="text-decoration-none text-black" href="<?= base_url('/about')?>">About Us</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/home')?>">Refer Friend</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/home')?>">Scholarship</a><br>
					<a class="text-decoration-none text-black" href="mailto:eduity@gmail.com">Marketing</a><br>
					<a class="text-decoration-none text-black" href="<?= base_url('/home')?>">free Courses</a>
				</div>
			</div>
		</footer>
		<!-- Script JS for Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>