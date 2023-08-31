<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Course - Admin</title>
		
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
							<a class="nav-link" href="<?= base_url('/admin/member') ?>">Member</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
			<div class="row justify-content-center align-items-center">
				<div class="col-2"></div>
				<div class="col-8 p-0">
					<p class="fw-semibold">Form <span class="text-muted">| Course</span></p>
				</div>
				<div class="col-2"></div>
			</div>
			<div class="row justify-content-center align-items-center">
				<div class="col-2"></div>
				<div class="col-8 border rounded px-5 py-4 justify-content-center align-items-center">
					<h3 class="mb-3">Edit Course</h3>
					<form action="<?= base_url('/admin/home/form/course/save/' . $kelas['id_kelas']) ?>"
					method="POST" enctype="multipart&#x2F;form-data">
						<?= csrf_field(); ?>
						<div class="row">
							<div class="col-12">
								<div class="form-floating mb-3">
									<input type="text" name="nama" class="form-control" 
									value="<?= $kelas['nama'] ?>" required>
									<label for="nama">Nama</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-floating mb-3">
									<input type="text" name="kategori" class="form-control" 
									value="<?= $kelas['kategori'] ?>" required>
									<label for="kategori">Kategori</label>
								</div>
							</div>
							<div class="col">
								<div class="form-floating mb-3">
									<input type="number" min="1" name="materi" class="form-control" 
									value="<?= $kelas['jumlah_materi'] ?>" required>
									<label for="materi">Jumlah Materi</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-floating mb-3">
									<textarea name="deskripsi" class="form-control" style="height: 100px"><?= $kelas['deskripsi'] ?></textarea required>
									<label for="deskripsi">Deskripsi</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="gambar" class="text-muted" style="font-size: 14px;">Cover | Max. Size 4 Mb</label>
									<input name="file_upload" class="form-control" type="file">
								</div>
							</div>
						</div>
						<div class="row px-2">
							<div class="justify-content-center px-1">
								<button type="submit" class="btn btn-primary w-100">Edit</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-2"></div>
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