<!DOCTYPE html>
<html>
	<head>
		<!-- Metadata -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Satria Pinandita Abyatarsyah">
		<meta name="description" content="Ujian Tengah Semester mata kuliah Desain & Pemrograman Web">
		
		<title>Payment</title>
		
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
		<header class="container-fluid py-3" style="border-bottom: 1px solid rgb(0,0,0,0.2);">
			<div class="container-xxl px-5">
				<a href="<?= base_url('/subscription')?>">
					<button class="rounded px-2 py-1">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
						Back
					</button>
				</a>
			</div>
		</header>
		<main>
			<section class="container-md" style="margin-bottom: 100px;">
				<div class="row justify-content-center">
					<div class="col-sm-11 col-md-9 col-lg-7">
						<h2>Payment for Subscription</h2>
						<div class="rounded p-4 mt-3" style="border: 1px solid rgb(0,0,0,0.2);">
							<h4>Subscription Detail</h4>
							<span class="line my-3"></span>
							<div class="d-flex justify-content-between">
								<span><?= $langganan['nama']; ?> (<?= $langganan['total_hari']; ?> days)</span>
								<h5>Rp <?= number_format($langganan['harga'], 0, ',', '.'); ?>;</h5>
							</div>
							
							<span class="line my-3"></span>
							
							<h5 class="mb-0">Promo Code</h5>
							<p class="mb-2">Save more with Promo Code</p>
							<form action="<?= base_url('/subscription/payment/promo') ?>" method="POST" class="d-flex">
								<?= csrf_field(); ?>
								<input name="promo" id="promo" type="text" class="form-control w-50" placeholder="input your promo code" aria-label="name" aria-describedby="basic-addon1" required>
								<input type="hidden" name="id" value="<?= $langganan['id_langganan']; ?>">
								<button type="submit" class="rounded px-2 py-1 ms-2">Confirm</button>
							</form>
							
							<span class="line my-3"></span>
							<div class="d-flex justify-content-between align-items-center">
								<div class="d-flex align-items-center">
									<h5 class="me-1 mb-0">Total Price</h5>
									<?php
									if (!empty($promo['persen_promo'])) {
										echo "<button class='rounded-pill px-2 py-0'>{$promo['persen_promo']}% Off</button>";
									}
									?>
								</div>
								<div class="text-end">
								<?php
								if (!empty($promo['persen_promo'])) {
									$total = $langganan['harga']-($langganan['harga']*$promo['persen_promo']/100);
									echo "<p class='text-muted fs-6 mb-0'><del>Rp ". number_format($langganan['harga'], 0, ',', '.') .";</del></p>";
									echo "<h5 class='mb-0'>Rp ". number_format($total, 0, ',', '.') .";</h5>";
								} else {
									echo "<h5 class='mb-0'>Rp ". number_format($langganan['harga'], 0, ',', '.') .";</h5>";
								}
								?>
								</div>
							</div>
							<div class="d-flex justify-content-end mt-3">
								<button class="rounded px-2 py-1">Pay now</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>