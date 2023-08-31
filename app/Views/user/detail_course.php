<!DOCTYPE html>
<html>
	<head>
		<!-- Metadata -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Satria Pinandita Abyatarsyah">
		<meta name="description" content="Ujian Tengah Semester mata kuliah Desain & Pemrograman Web">
		
		<title>Detail Course</title>
		
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
		<header class="container-sm container-md mb-3">
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
							<a class="nav-link active" href="<?= base_url('/course') ?>">Course</a>
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
		</header>
		<main>
			<section class="container-fluid py-5 bg-light border-bottom">
				<div class="container-sm container-md container-lg container-xl container-xxl">
					<h2><?= $kelas['nama']; ?></h2>
					<h5 class="text-muted mb-3">
						<?= $kelas['deskripsi']; ?>
					</h5>
					<div class="d-flex">
						<p class="fw-light me-3">
							<i class="fa fa-user me-1"></i>
							<?= $kelas['jumlah_siswa']; ?> people joined
						</p>
						<p>
							<?= $kelas['rating']; ?>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							(<?= $kelas['jumlah_siswa']; ?>)
						</p>
					</div>
					<a class="btn btn-outline-primary px-5 fw-semibold">Join</a>
				</div>
			</section>
			<section class="container-sm container-md container-lg container-xl container-xxl py-5">
				<div class="row">
					<div class="col-7">
						<h4 class="mt-2 text-muted" style="letter-spacing: 3px;">Table of Contents <span class="line my-2"></span></h4>
						<div class="mt-3">
							<div class="accordion mb-3" id="pendahuluan_list">
								<div class="accordion-item">
									<h2 class="accordion-header" id="pendahuluan">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pendahuluan_materi" aria-expanded="true" aria-controls="pendahuluan_materi">
											Pendahuluan
										</button>
									</h2>
									<div id="pendahuluan_materi" class="accordion-collapse collapse show" aria-labelledby="pendahuluan" data-bs-parent="#pendahuluan_list">
										<div class="accordion-body p-0">
											<div class="list-group rounded-0">
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Pendahuluan 1
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Pendahuluan 2
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Pendahuluan 3
												    </div>
											    </a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="accordion mb-3" id="materi_list">
								<div class="accordion-item">
									<h2 class="accordion-header" id="materi">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#materi_materi" aria-expanded="true" aria-controls="materi_materi">
											Materi
										</button>
									</h2>
									<div id="materi_materi" class="accordion-collapse collapse show" aria-labelledby="materi" data-bs-parent="#materi_list">
										<div class="accordion-body p-0">
											<div class="list-group rounded-0">
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Materi 1
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Materi 2
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Materi 3
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Materi 4
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Materi 5
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Materi 6
												    </div>
											    </a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="accordion mb-3" id="penutup_list">
								<div class="accordion-item">
									<h2 class="accordion-header" id="penutup">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#penutup_materi" aria-expanded="true" aria-controls="penutup_materi">
											Penutup
										</button>
									</h2>
									<div id="penutup_materi" class="accordion-collapse collapse show" aria-labelledby="penutup" data-bs-parent="#penutup_list">
										<div class="accordion-body p-0">
											<div class="list-group rounded-0">
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 border-bottom py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Penutup 1
												    </div>
											    </a>
											    <a href="#"
											    class="list-group-item list-group-item-action border-0 py-3">
											    	<div class="d-flex fw-semibold align-items-center">
												    	<button class="btn btn-dark rounded-circle me-1 fs-6 py-0 px-2">
												    		<i class="fa fa-lock"></i>
												    	</button>
												    	Penutup 2
												    </div>
											    </a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-4 pt-5">
						<div class="card-course p-3 rounded shadow-sm">
							<img class="img-fluid rounded" src="<?= base_url('/img/' . $kelas['gambar']); ?>">
							<button class="rounded my-2 py-1 px-2 text-black fw-light border-0"
							style="background-color: #DEF4F7;"><?= $kelas['kategori']; ?></button>
							<h5 class="fw-bold mt-2 mb-1">THIS COURSE INCLUDES:</h5>
							
							<div class="mt-2 text-secondary fw-light">
								<p class="mb-1">
									<i class="fa fa-book me-1"></i>
									<?= $kelas['jumlah_materi']; ?> modul belajar
								</p>
								<p class="mb-1">
									<i class="fa fa-clock-o me-1"></i>
									Akses online selamanya
								</p>
								<p class="mb-1">
									<i class="fa fa-certificate me-1"></i>
									Sertifikat digital
								</p>
								<p class="mb-1">
									<i class="fa fa-comments-o me-1"></i>
									Forum diskusi & tanya jawab
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer class="container-fluid py-4 bg-light" style="margin-top: 100px;">
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