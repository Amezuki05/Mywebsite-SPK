<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Edit Rating Kecocokan</h1>

    <div class="row">
        <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit Rating Kecocokan</h1>
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

                <form class="user" method="post" action="<?php echo site_url('ratingkecocokan/update'); ?>">
                    <input type="hidden" name="idrating" value="<?php echo $ratingkecocokan['idrating']; ?>">
                    <div class="form-group">
                        <input type="text" name="nilairating" class="form-control form-control-user" id="exampleFirstName" placeholder="Nilai Rating" value="<?php echo $ratingkecocokan['nilairating']; ?>">
                    </div>
                    <input type="submit" name="bSimpan" value="Simpan Perubahan" class="btn btn-info btn-user btn-block">
                </form>
                <hr>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
