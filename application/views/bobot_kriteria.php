<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bobot Kriteria</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Input Bobot Kriteria</h6>
        </div>
        <div class="card-body">
            <?php echo form_open('kriteria/bobotharapan'); ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Bobot Preferensi</th>
                        <th>Jenis Kriteria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itemkriteria as $kriteria): ?>
                        <tr>
                            <td>
                                <?php echo $kriteria['namakriteria']; ?>
                                <input type="hidden" name="idkriteria[]" value="<?php echo $kriteria['idkriteria']; ?>">
                            </td>
                            <td>
                                <input type="text" name="bobotharapan[]" class="form-control" value="<?php echo $kriteria['bobotpreferensi']; ?>">
                            </td>
                            <td>
                                <select name="jeniskriteria[]" class="form-control">
                                    <option value="1" <?php echo $kriteria['jeniskriteria'] == 1 ? 'selected' : ''; ?>>Cost</option>
                                    <option value="2" <?php echo $kriteria['jeniskriteria'] == 2 ? 'selected' : ''; ?>>Benefit</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="bSimpanBobot" class="btn btn-info">Simpan Bobot</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
