<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Input Atribut Baru</h1>
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

                    <form class="user" method="post" action="<?php echo site_url('atribut/buatatributbaru'); ?>">
                        <div class="form-group">
                            <input type="text" name="namaatribut" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Atribut">
                        </div>
                        <input type="submit" name="bSimpan" value="Simpan Atribut Baru" class="btn btn-info btn-user btn-block">
                        </input>
                        <hr>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Atribut</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tabel Daftar Atribut</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Atribut</th>
                        <th>Nama Atribut</th>
                        <th>Koreksi/Hapus</th>
                    </tr>
                </thead>
                <tbody><?php foreach ($itematribut as $row) : ?>
                        <tr>
                            <td><?php echo $row['idatribute']; ?></td>
                            <td><?php echo $row['namaatribut']; ?></td>
                            <td>
                                <a href="<?php echo site_url('atribut/edit/' . $row['idatribute']); ?>" class="btn btn-info btn-user btn-block">Koreksi</a>
                                <a href="<?php echo site_url('atribut/delete/' . $row['idatribute']); ?>" class="btn btn-danger btn-user btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus atribut ini?');">Hapus</a>
                            </td>
                        </tr><?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->