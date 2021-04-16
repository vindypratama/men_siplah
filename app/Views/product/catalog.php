<div class="container">
<div class="row">

	<?php
		for($i=0;$i<12;$i++)
		{
	?>
  <div class="col-6 col-sm-6 col-md-3 col-lg-2 p-2">
    <div class="card">
    	<img class="card-img-top" src="<?php echo base_url('uploads/product/2.jpg'); ?>" alt="Card image" width="120" height="180px"  style="background-color: #CCFFFF;">
    	<div class="card-body m-1 p-1">
    		<h4 class="card-title">John Doe</h4>
    		<p class="card-text">Some example text.</p>
    		<a href="#" class="btn btn-primary">See Profile</a>
    	</div>
    </div>
  </div>
  <div class="col-6 col-sm-6 col-md-3 col-lg-2 p-2">
    <div class="card">
    	<img class="card-img-top" src="<?php echo base_url('assets/image/template/logo-marketplace-siplah.png'); ?>" alt="Card image" width="120" height="180px" style="background-color: #CCFFFF;">
    	<div class="card-body m-1 p-1">
    		<h4 class="card-title">John Doe</h4>
    		<p class="card-text">Some example text.</p>
    		<a href="#" class="btn btn-primary">See Profile</a>
    	</div>
    </div>
  </div>
  <?php
  	}
  ?>
</div>
</div>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>