<?php
    $x = {23.57, 50}
    $y = {0.125, 0.5}
    $sampelTerbesar = (int) round(max($x));
    $banyakSampel = array();
    $sampelZ = 0;
    $sampelZ1 = 0;
    $sampelZTot = 0;
    $areaZ = 0;
    $miuY1 = 0;
    $batasY = 0;

    for ($m=0; $m < $jumlahY; $m++) {
        $batas = 0;
        $batas = $x[$m];
        $batasY = $y[$m];
        for ($i=0; $i < $batas; $i++) {
            $banyakSampel[$i] = $i + 1;
            if ($banyakSampel[$i] < $batas) {
                $sampelZ = $sampelZ + ($banyakSampel[$i] * $batasY);
            }
        }
    }
    $miuY = 0;
    $miuY = number_format($miuY1, 2);

    $z1 = $sampelZ/$miuY;
    $z = number_format($z1, 2);
    return $z;
?>