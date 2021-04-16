<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>
		<?php echo $title; ?>
	</title>
	<?php echo $css; ?>
</head>
<body>
	<?php echo $navbar; ?>
	<div class="container-fluid min-vh-100 m-0 p-0">
		<header class="m-0 p-0">
			header
		</header>
		<section class="container-fluid">
			<?php echo $container; ?>
		</section>
		<footer class="container-fluid">
			<div class="row h-100">
				<div class="col-sm-12 col-md-6 col-lg-7 col-xl-8 h-100 text-sm-left">
					Copyright © 2021 Kementerian Pendidikan dan Kebudayaan. Hak cipta dilindungi undang-undang. Dikembangkan oleh Mitra Edukasi Nusantara. <span class="sr-only">(current)</span>
				</div>
				<div class="row col">
					<div class="col-sm-6 col h-100 text-center">
						Syarat dan Ketentuan
					</div>
					<div class="col-sm-6 col h-100 text-center">
						Kebijakan Privasi
					</div>
				</div>
			</div>
		</footer>
	</div>
	<?php echo $js; ?>
</body>
</html>