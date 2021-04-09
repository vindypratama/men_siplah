<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php echo $title; ?>
	</title>
	<?php echo $css; ?>
</head>
<body>
	<div class="container-fluid vh-100" style="border:1px solid #000">
		<header class="jumbotron jumbotron-fluid">
			header
		</header><!-- /header -->
		<section class="container-fluid" style="border:1px solid #000">
			<?php echo $container; ?>
		</section>
		<footer class="container-fluid" style="border:1px solid #000">
			footer
		</footer>
	</div>
  	<?php echo $js; ?>
</body>
</html>