<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Koreksi Rating Kecocokan</h1>
                            </div>
                            <form class="user" method="post" action="Ratingkecocokan/koreksiratingkecocokanbaru">
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
                                <input type="submit" name="bSimpan" value="Simpan Pengguna Baru" class="btn btn-info btn-user btn-block">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>