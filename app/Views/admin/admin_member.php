<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Member - Admin</title>
		
		<!-- Title Icon -->
		<link rel="icon" href="<?= base_url('/img/logo(only badge).png') ?>">
		<!-- Bootstrap Custom -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('/style/bs_style.css') ?>">
		<!-- Icon -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- CSS -->
		<style type="text/css">
			#navbar-brand {
				-webkit-filter : drop-shadow(1px 1px 0 #fff)
								drop-shadow(-1px 1px 0 #fff)
								drop-shadow(1px -1px 0 #fff)
								drop-shadow(-1px -1px 0 #fff);
				filter : drop-shadow(1px 1px 0 #fff)
						drop-shadow(-1px 1px 0 #fff)
						drop-shadow(1px -1px 0 #fff)
						drop-shadow(-1px -1px 0 #fff);
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
			<div class="container-sm container-md container-lg container-xl container-xxl">
				<a class="navbar-brand" href="<?= base_url('/admin/home/course') ?>">
					<img src="<?= base_url('/img/logo(only badge).png') ?>" id="navbar-brand" width="30">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" 
							href="<?= base_url('/admin/home/course') ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="<?= base_url('/admin/member') ?>">Member</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Form
							</a>
							<ul class="dropdown-menu rounded-0" aria-labelledby="navbarDropdown">
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/home/form/course') ?>">
										Course
									</a>
								</li>
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/home/form/subscription') ?>">
										Subscription
									</a>
								</li>
							</ul>
						</li>
					</ul>
					<div class="d-flex">
						<div class="d-flex justify-content-between align-items-center">
							<i class="fa fa-user-circle-o me-2 fs-3 text-white"></i>
							<div class='dropdown fs-6'>
								<a class='text-decoration-none text-white dropdown-toggle' id='user' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
									Admin
								</a>
								<ul class='dropdown-menu dropdown-menu-end rounded-0' aria-labelledby='user'>
									<li><a class='dropdown-item' href='<?= base_url('/user/logout') ?>'>Logout</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<main class="py-5 mt-5 container-sm container-md container-lg container-xl container-xxl"
		style="min-height: 83.3vh;">
			<div class="row mb-3">
				<div class="d-flex justify-content-between align-items-center">
					<div class="d-flex">
						<h3 class='mb-0 me-2'>Member List</h3>
						<div class="dropdown">
							<button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Order by
							</button>
							<ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="dropdownMenuButton1">
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/member/order/nama'); ?>">
										Nama
									</a>
								</li>
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/member/order/username'); ?>">
										Username
									</a>
								</li>
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/member'); ?>">
										Terlama
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div>
						<a href="<?= base_url('/admin/member/report'); ?>" class="btn btn-primary">
							<i class="fa fa-arrow-circle-o-down me-1"></i>Download
						</a>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-bordered shadow-sm bg-body">
					<thead align="middle" valign="middle" class="bg-light">
						<tr valign="middle">
							<th scope="col">No.</th>
							<th scope="col">Nama</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Gambar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						foreach ($user as $u) : ?>
						<tr valign="middle" align="middle">
							<td><?= $i ?></td>
							<td align="left"><?= $u['nama']; ?></td>
							<td><?= $u['username']; ?></td>
							<td><?= $u['email']; ?></td>
							<td width="150">
								<img src="<?= base_url('/img/' . $u['gambar']) ?>" class="img-thumbnail rounded">
							</td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</main>
		<footer class="container-fluid bg-primary">
			<div class="d-flex justify-content-center align-items-center py-3">
				<p class="text-white m-0"><strong>Eduity</strong> | Admin Page</p>
			</div>
		</footer>
		
		<!-- Script JS for Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</body>
</html>