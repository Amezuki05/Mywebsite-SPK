<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Tabel Edit Atribut</h1>


	<div class="row">
		<div class="col-lg-7">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Edit Atribut</h1>
				</div>
				<!-- Menampilkan pesan error atau sukses -->
				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<form class="user" method="post" action="<?php echo site_url('atribut/update'); ?>">
					<input type="hidden" name="idatribute" value="<?php echo $atribut['idatribute']; ?>">
					<div class="form-group">
						<input type="text" name="namaatribut" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Atribut" value="<?php echo $atribut['namaatribut']; ?>">
					</div>
					<input type="submit" name="bSimpan" value="Simpan Perubahan" class="btn btn-info btn-user btn-block">
					</input>
					<hr>
				</form>
				<hr>
			</div>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->