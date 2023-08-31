<!DOCTYPE html>
<html>
	<head>
		<!-- Metadata -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Satria Pinandita Abyatarsyah">
		<meta name="description" content="Ujian Tengah Semester mata kuliah Desain & Pemrograman Web">
		
		<title>Subscription</title>
		
		<!-- Logo Title -->
		<link rel="icon" href="<?= base_url('/img/logo(only badge).png') ?>">
		<!-- Eksternal CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('/style/style.css') ?>">
		<!-- Icon -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Bootstrap Custom -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('/style/bs_style.css') ?>">
	</head>
	<body>
		<div class="info container-fluid">
			<marquee onmouseover="this.stop()" onmouseout="this.start()">
			<p class="my-auto py-2">Beasiswa Android Developer dan Associate Cloud Engineer dari Kominfo dan Kemnaker. Daftar segera!</p>
			</marquee>
		</div>
		<header class="container-sm container-md">
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
							<a class="nav-link" href="<?= base_url('/home') ?>">Home</a>
						</li>
						<li class="nav-item px-2 px-lg-3">
							<a class="nav-link" href="<?= base_url('/course') ?>">Course</a>
						</li>
						<li class="nav-item px-2 px-lg-3">
							<a class="nav-link active" href="<?= base_url('/subscription') ?>">Subscription</a>
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
		</header>
		<main>
			<section id="cost-benefit" class="container-sm container-md">
				<div class="cost-benefit-title">
					<h2 class="text-center" style="font-weight: 400;">Subscription Fee and Benefits</h2>
					<p class="text-center fw-lighter">Choose a subscription package as a learning investment that suits your needs.</p>
					<span class="line w-100" style="border-radius: 90%; height: 3px;"></span>
				</div>
				<div class="cost-benefit-content mt-4 rounded" style="background-color: #F4F4F5; border: 1px solid rgb(0,0,0,0.2);">
					<div class="row px-4">
						<?php 
						foreach ($langganan as $l) : ?>
						<div class="col-lg-6 p-3">
							<div class="cost-benefit-card p-sm-5 px-2 py-5 text-center rounded" style="border: 1px solid rgb(0,0,0,0.2);">
								<h4 class="fw-light"><?= $l['nama']; ?> (<?= $l['total_hari']; ?> days)</h4>
								<h4 class="mb-4">Rp <?= number_format($l['harga'], 0, ',', '.'); ?>;</h4>
								<a href="<?= base_url('/subscription/payment/' . $l['id_langganan']); ?>">
									<button class="rounded px-3 py-1">Choose</button>
								</a>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<span class="line"></span>
					<div class="row text-lg-start text-center">
						<div class="col-lg-6">
							<div class="benefit-card ps-lg-5 my-5">
								<i class="fa fa-book me-1 d-inline-block d-lg-none" aria-hidden="true"></i>
								<h5 style="font-size: 18px;">
									<i class="fa fa-book me-1 d-none d-lg-inline-block" aria-hidden="true"></i>
									Access All Classes
								</h5>
								<p class="ms-lg-4">Full access to all classes at Eduity Academy.</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="benefit-card my-lg-5 mb-5">
								<i class="fa fa-file-text me-1 d-inline-block d-lg-none" aria-hidden="true"></i>
								<h5 style="font-size: 18px;">
									<i class="fa fa-file-text me-1 d-none d-lg-inline-block" aria-hidden="true"></i>
									Submission
								</h5>
								<p class="ms-lg-4">Test your technical skills by doing submission assignments.</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="benefit-card ps-lg-5 mb-5">
								<i class="fa fa-comments me-1 d-inline-block d-lg-none" aria-hidden="true"></i>
								<h5 style="font-size: 18px;">
									<i class="fa fa-comments me-1 d-none d-lg-inline-block" aria-hidden="true"></i>
									Discussion Forum
								</h5>
								<p class="ms-lg-4">Discuss learning materials with other students.</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="benefit-card mb-5">
								<i class="fa fa-pencil me-1 d-inline-block d-lg-none" aria-hidden="true"></i>
								<h5 style="font-size: 18px;">
									<i class="fa fa-pencil me-1 d-none d-lg-inline-block" aria-hidden="true"></i>
									Exam
								</h5>
								<p class="ms-lg-4">Validate your knowledge by doing exam questions.</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="benefit-card ps-lg-5 mb-5">
								<i class="fa fa-certificate me-1 d-inline-block d-lg-none" aria-hidden="true"></i>
								<h5 style="font-size: 18px;">
									<i class="fa fa-certificate me-1 d-none d-lg-inline-block" aria-hidden="true"></i>
									Certificate
								</h5>
								<p class="ms-lg-4">Certificate of competence, if you complete the class well.</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="benefit-card mb-5">
								<i class="fa fa-history me-1 d-inline-block d-lg-none" aria-hidden="true"></i>
								<h5 style="font-size: 18px;">
									<i class="fa fa-history me-1 d-none d-lg-inline-block" aria-hidden="true"></i>
									Update Certificate
								</h5>
								<p class="ms-lg-4">Renew your expired certificate.</p>
							</div>
						</div>
					</div>
					<span class="line"></span>
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-8 col-lg-5 text-center py-5">
							<h5 class="mb-4" style="font-weight: 400;">Still not sure to subscribe? Try free for 15 days and access all classes at Eduity Academy.</h5>
							<button class="rounded px-3 py-1">Try now!</button>
						</div>
					</div>
				</div>
			</section>
			<section id="support-cost-benefit" class="container-fluid py-4"
			style="background-color: #F4F4F5; margin-top: 100px; border: 1px solid rgb(0,0,0,0.2);">
				<div id="testimonials" class="container-sm container-md my-5">
					<div class="row align-items-center">
						<div class="col-md-6">
							<h5>Testimonials</h5>
							<h1>Our Learners Feedback</h1>
							<p>What do those who have studied at Eduity say?</p>
						</div>
						<div class="col-md-6">
							<div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<div class="card ps-5 border-0" style="background-color: #F4F4F5;">
											<img src="<?= base_url('/img/user1.png') ?>" class="card-img-top w-50 rounded" alt="testimonials1">
											<div class="card-body py-0">
												<h5 class="card-title m-0">Romuald Vladislav</h5>
												<p class="card-text text-secondary">Programming</p>
												<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. adipisicing elit.</p>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="card ps-5 border-0" style="background-color: #F4F4F5;">
											<img src="<?= base_url('/img/user2.png') ?>" class="card-img-top w-50 ms-1" alt="testimonials2">
											<div class="card-body py-0">
												<h5 class="card-title m-0">Columbanus Hiawatha</h5>
												<p class="card-text text-secondary">Design</p>
												<p class="card-text">Lorem ipsum dolor sit amet, sed do eiusmod. sed do eiusmod do eiusmod.</p>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="card ps-5 border-0" style="background-color: #F4F4F5;">
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
				</div>
				<div id="trusted" class="container-sm container-md" style="margin-top: 100px;">
					<h3 class="text-center">Trusted by</h3>
					<div class="row align-items-center justify-content-around px-5">
						<img class="col-5 col-lg-2" src="<?= base_url('/img/brand1.png') ?>">
						<img class="col-5 col-lg-2" src="<?= base_url('/img/brand2.png') ?>">
						<img class="col-5 col-lg-2" src="<?= base_url('/img/brand3.png') ?>">
						<img class="col-5 col-lg-2" src="<?= base_url('/img/brand4.png') ?>">
					</div>
				</div>
				<div id="partner" class="container-sm container-md my-5">
					<h3 class="text-center mb-3 mb-lg-4">Our Partner</h3>
					<div class="row align-items-center justify-content-around">
						<img class="col-2 col-lg-1" src="<?= base_url('/img/campus1.png') ?>">
						<img class="col-2 col-lg-1" src="<?= base_url('/img/campus2.png') ?>">
						<img class="col-2 col-lg-1" src="<?= base_url('/img/campus3.png') ?>">
						<img class="col-2 col-lg-1" src="<?= base_url('/img/campus4.png') ?>">
						<img class="col-2 col-lg-1" src="<?= base_url('/img/campus5.png') ?>">
					</div>
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