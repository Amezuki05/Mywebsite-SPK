<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Input Rating Kecocokan Baru</h1>
                            </div>
                            <form class="user" method="post" action="Ratingkecocokan/buatratingkecocokanbaru">
                                <div class="form-group">
                                   <label for="idkriteria">Pilih Kriteria</label>
                                   <select name="idkriteria" required>
                                        <?php foreach ($pilihkriteria as $row) : ?>
                                            <option value="<?php echo $row['idkriteria']; ?>">
                                                <?php echo $row['namakriteria']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                   <label for="idatribute">Pilih Atribut</label>
                                   <select name="idatribute" required>
                                        <?php foreach ($pilihatribut as $row) : ?>
                                            <option value="<?php echo $row['idatribute']; ?>">
                                                <?php echo $row['namaatribut']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nilairating">Nilai Rating</label>
                                    <input type="text" name="nilairating" required placeholder="Isi nilainya">
                                </div>
                                <input type="submit" name="bSimpan" value="Simpan Rating Kecocokan" class="btn btn-info btn-user btn-block">
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
    <h1 class="h3 mb-2 text-gray-800">Tabel Rating Kecocokan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Daftar Rating Kecocokan</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Atribut</th>
                                <?php foreach ($pilihkriteria as $r) : ?>
                                    <th><?php echo $r['namakriteria']; ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody><?php foreach ($pilihatribut as $ra) : ?>
                            <tr>
                                <td><?php echo $ra['namaatribut']; ?></td>
                                <?php foreach ($pilihkriteria as $rk) : ?>
                                    <td><?php foreach ($itemratingkecocokan as $ir) :
                                        if (($ir['idatribute'] == $ra['idatribute']) and ($ir['idkriteria'] == $rk['idkriteria']))
                                        {   echo $ir['nilairating']; ?>
                                                <a href="ratingkecocokan/edit/<?php echo $ir['idrating']; ?>"
                                                class="btn btn-info btn-user btn-block">Koreksi</a>
                                                <a href="ratingkecocokan/hapusratingkecocokan/<?php echo $ir['idrating']; ?>"
                                                class="btn btn-danger btn-user btn-block">Hapus</a>
                                            <?php }
                                        endforeach; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div><!--/.container-fluid -->
</div><!-- End of Main Content -->