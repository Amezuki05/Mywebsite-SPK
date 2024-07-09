<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Matrix Normalisasi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Matrix Normalisasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Atribut</th>
                            <?php foreach ($pilihkriteria as $r): ?>
                                <th><?php echo $r['namakriteria']; ?></th>
                            <?php endforeach ?>
                            <th>Nilai Preferensi Atribut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $v = 0; ?>
                        <?php foreach ($pilihatribut as $ra): ?>
                        <tr>
                            <td><?php echo $ra['namaatribut']; ?></td>
                            <?php foreach ($pilihkriteria as $rk): ?>
                                <td>
                                    <?php 
                                    foreach ($itemratingkecocokan as $ir):
                                        if (($ir['idatribute'] == $ra['idatribute']) && ($ir['idkriteria'] == $rk['idkriteria'])) {
                                            echo $ir['nilairating'].' v= '.$ir['nilainormalisasi'];
                                            $v += $ir['bobotnormalisasi'];
                                        }
                                    endforeach;
                                    ?>
                                </td>
                            <?php endforeach; ?>
                            <td><?php echo $v; $v = 0; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
