<div class="container-fluid">
                <h5 class="m-0 font-weight-bold text-info"> Dengan demikian urutan rangking rekomendasi adalah : </h5>
                <hr>
                <?php $nmr=1;
                foreach ($rangking as $rank) {
                echo $nmr++.'. '.$rank ['namaatribut'].' dengan Nilai Preferensi = ' .$rank['nilaipreferensi'].'<br>';
                };
                ?>
            </div>
        </div>
    </div>
</div>
<!--/.container-fluid -->