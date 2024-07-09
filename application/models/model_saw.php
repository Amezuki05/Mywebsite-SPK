<?php
class model_saw extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function hitungratingkecocokan()
    {
        // Cari nilai maksimum per kriteria
        $sql = "SELECT *, MAX(nilairating) AS maxkriteria FROM ratingkecocokan GROUP BY idkriteria";
        $qmax = $this->db->query($sql);

        // Hitung nilai r per kriteria tergantung jenisnya cost atau benefit
        foreach ($qmax->result() as $rekk)
        {
            $sqlk = "SELECT * FROM kriteria WHERE idkriteria = '".$rekk->idkriteria."'";
            $qk = $this->db->query($sqlk);
            foreach ($qk->result() as $rk)
            {
                $sqla = "SELECT * FROM atribut";
                $qa = $this->db->query($sqla);
                foreach ($qa->result() as $ra)
                {
                    if ($rk->jeniskriteria == '1') // Cost
                    {
                        $sqlr = "SELECT nilairating / ".$rekk->maxkriteria." AS nilair FROM ratingkecocokan WHERE idkriteria = '".$rekk->idkriteria."' AND idatribute = '".$ra->idatribute."'";
                    } 
                    else // Benefit
                    {
                        $sqlr = "SELECT ".$rekk->maxkriteria."/nilairating AS nilair FROM ratingkecocokan WHERE idkriteria='".$rekk->idkriteria."' AND idatribute='".$ra->idatribute."'";
                    }

                    $qr = $this->db->query($sqlr);
                    foreach ($qr->result() as $rr)
                    {
                        $bobotnormalisasi = $rk->bobotpreferensi * $rr->nilair;
                        $sqlri = "UPDATE ratingkecocokan SET nilainormalisasi = '".$rr->nilair."', bobotnormalisasi = ".$bobotnormalisasi." WHERE idkriteria = '".$rekk->idkriteria."' AND idatribute = '".$ra->idatribute."'";
                        $this->db->query($sqlri);
                    }
                }
            }
        }

        // Hitung nilai preferensi
        $sqla = "SELECT * FROM atribut";
        $qa = $this->db->query($sqla);
        foreach ($qa->result() as $ra)
        {
            $sqlr = "SELECT SUM(nilainormalisasi) AS nilaipreferensi FROM ratingkecocokan WHERE idatribute = '".$ra->idatribute."' GROUP BY idatribute";
            $qr = $this->db->query($sqlr);
            foreach ($qr->result() as $rr)
            {
                $sqlua = "UPDATE atribut SET nilaipreferensi = ".$rr->nilaipreferensi." WHERE idatribute = '".$ra->idatribute."'";
                $this->db->query($sqlua);
            }
        }

        return;
    }

    public function lakukanperangkingan()
    {
        $sqla = "SELECT * FROM atribut ORDER BY nilaipreferensi DESC";
        $qa = $this->db->query($sqla);
        return $qa->result_array();
    }
}