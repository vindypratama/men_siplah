
<?php
$success = session()->getFlashdata('success');
$error = session()->getFlashdata('error');

if(!empty($success))
{
	?>
	<div class="alert alert-success" role="alert">
		<?=$success?>
	</div>
	<?php
}

if(!empty($error)) 
{
	?>
	<div class="alert alert-danger" role="alert">
		<?=$error?>
	</div>
	<?php
} 
?>
<div class="container-fluid py-3">
	<table id="pengguna" class="display" style="width:100%">
		<thead>
			<tr>
				<th>NAMA</th>
				<th>EMAIL</th>
				<th>PHONE</th>
				<th>TERSEDIA</th>
				<th>AKTIF</th>
				<th>AKSI</th>
			</tr>
		</thead>
	</table>
</div>