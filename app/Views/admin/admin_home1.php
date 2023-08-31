<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Home - Admin</title>
		
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
							<a class="nav-link active" aria-current="page" 
							href="<?= base_url('/admin/home/course') ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('/admin/member') ?>">Member</a>
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
			<div class="d-flex mb-5">
				<a href='<?= base_url('/admin/home/course') ?>' class='btn btn-primary shadow-sm text-white fw-semibold'
					style='border-radius: 5px 0 0 5px;'>
					Course
				</a>
				<a href='<?= base_url('/admin/home/subscription') ?>' class='btn btn-light shadow-sm'
					style='border-radius: 0px 5px 5px 0px;'>
					Subscription
				</a>
			</div>
			<div class="row mb-3">
				<div class="d-flex justify-content-between align-items-center">
					<h3 class='m-0'>Course List</h3>
					<div class="d-flex">
						<div class="dropdown me-2">
							<button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Display by
							</button>
							<ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item" href="<?= base_url('/admin/home/course'); ?>">
									All
								</a></li>
								<?php 
								foreach ($kategori as $ka) : ?>
								<li><a class="dropdown-item"
									href="<?= base_url('/admin/home/course/display/' . $ka['kategori']); ?>">
									<?= $ka['kategori']; ?>		
								</a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="dropdown">
							<button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Order by
							</button>
							<ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="dropdownMenuButton1">
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/home/course/order/nama'); ?>">
										Nama
									</a>
								</li>
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/home/course/order/jumlah_materi'); ?>">
										Jumlah Materi
									</a>
								</li>
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/home/course/order/jumlah_siswa'); ?>">
										Jumlah Siswa
									</a>
								</li>
								<li>
									<a class="dropdown-item" 
									href="<?= base_url('/admin/home/course/order/rating'); ?>">
										Rating
									</a>
								</li>
								<li>
									<a class="dropdown-item"
									href="<?= base_url('/admin/home/course'); ?>">
										Terlama 
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-bordered shadow-sm bg-body">
					<thead align="middle" valign="middle" class="bg-light">
						<tr valign="middle">
							<th scope="col" rowspan="2">No.</th>
							<th scope="col" rowspan="2">Nama</th>
							<th scope="col" rowspan="2">Kategori</th>
							<th scope="col" colspan="2">Jumlah</th>
							<th scope="col" rowspan="2">Rating</th>
							<th scope="col" rowspan="2">Deskripsi</th>
							<th scope="col" rowspan="2">Gambar</th>
							<th scope="col" rowspan="2">Action</th>
						</tr>
						<tr>
							<th>Materi</th>
							<th>Siswa</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						foreach ($kelas as $k) : ?>
						<tr valign="middle">
							<td align="middle"><?= $i ?></td>
							<td><?= $k['nama']; ?></td>
							<td align="middle"><?= $k['kategori']; ?></td>
							<td align="middle"><?= $k['jumlah_materi']; ?></td>
							<td align="middle"><?= $k['jumlah_siswa']; ?></td>
							<td align="middle"><?= $k['rating']; ?></td>
							<td><?= $k['deskripsi']; ?></td>
							<td align="middle">
								<img src="<?= base_url('/img/' . $k['gambar']) ?>" class="img-thumbnail rounded">
							</td>
							<td align="middle">
								<div class="d-flex flex-column">
									<a href="<?= base_url('/admin/home/form/course/edit/' . $k['id_kelas']) ?>" class="btn btn-warning w-100 mb-2">Edit</a>
									<a href="<?= base_url('/admin/home/course/delete/' . $k['id_kelas']) ?>" class="btn btn-danger w-100">Delete</a>
								</div>
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