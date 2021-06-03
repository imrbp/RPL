<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('css/welcome.css')}}" />
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<!-- Fonts -->
</head>

<body class="antialiased">
	<header>
		<div class="logo">
			<img src="images/logo.png" alt="">
			<b>WARE WAREHOUSE</b>
		</div>
		<input type="checkbox" id="menu-bar">
		<label for="menu-bar" class="fas fa-bars"></label>
		<nav class="navbar">
			<a href="#home">Home</a>
			<a href="#about">About</a>
			<a href="#features">Features</a>
			<a href="#contact">Contact</a>
		</nav>
	</header>


	<!-- home section -->
	<section class="home" id="home">
		<div class="content">
			<h3>Ware <span>Warehouse</span></h3>
			<p> "Cari barang tanpa ribet? di WareWarehouse aja" </p>
			<a href="{{route('login')}}" class="btn">Start</a>
		</div>
		<div class="image">
			<img src="images/warehouse.png" alt="">
		</div>
	</section>


	<!-- about section -->
	<section class="about" id="about">
		<div class="column">
			<div class="image">
				<img src="images/un.png" alt="">
			</div>
			<div class="content">
				<h2> About the App </h2>
				<p style="text-align: justify">WareWarehouse merupakan aplikasi berbasis web yang berguna untuk melakukan Inventarisasi. WareWarehouse memiliki fitur untuk mencatat log masuk-keluar barang, lokasi penyimpanan barang.</p>
			</div>
		</div>
	</section>


	<!-- features section starts -->
	<section class="features" id="features">
		<h2> App Features </h2>
		<div class="box-container">
			<div class="boxa">
				<img src="images/fo.png" alt="">
				<h3>Laporan</h3>
				<p align="justify">Menu laporan digunakan untuk melihat item-item yang ada di dalam warehouse beserta keterangan lainnya yang mendukung seperti jumlah item, dan sebagainya.</p>
			</div>
			<div class="boxu">
				<img src="images/nam.png" alt="">
				<h3>Transpage</h3>
				<p align="justify">Menu transpage berfungsi untuk mengupdate laporan yang ada di warehouse. </p>
			</div>
			<div class="boxi">
				<img src="images/aaa.png" alt="">
				<h3>Backup/Restore</h3>
				<p align="justify">Menu backup/restore digunakan untuk megechek salinan cadangan data selama satu minggu yang ada di warehouse.</p>
			</div>
		</div>
	</section>

	<!-- contact section -->
	<section class="contact" id="contact">
		<h2> Contact Us: </h2>
		<div class="ik">
			<div class="image">
				<img src="images/ia.png" alt="">
			</div>
			<div class="box">
				<div class="wrapper">
					<div class="button">
						<div class="icon"><i class="fab fa-facebook-f"></i></div>
						<a href="https://www.facebook.com/"><span>Facebook</span></a>
					</div>
					<div class="button">
						<div class="icon"><i class="fab fa-twitter"></i></div>
						<a href="google.com"><span>Twitter</span></a>
					</div>
					<div class="button">
						<div class="icon"><i class="fab fa-instagram"></i></div>
						<a href="google.com"><span>Instagram</span></a>
					</div>
					<div class="button">
						<div class="icon"><i class="fas fa-phone"></i></div>
						<a href="google.com"><span>Telephone</span></a>
					</div>
					<div class="button">
						<div class="icon"><i class="fab fa-whatsapp"></i></div>
						<a href="google.com"><span>Whatsapp</span></a>
					</div>
				</div>
			</div>
	</section>

	<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
		@if (Route::has('login'))
		<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
			@auth
			<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
			@else
			<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

			@if (Route::has('register'))
			<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
			@endif
			@endauth
		</div>
		@endif
	</div>

</body>

</html>