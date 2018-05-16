<?php
	// tidak cocok
	$rules[0] = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);

	// kurang cocok
    $rules[1] = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
    $rules[2] = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);
    $rules[3] = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
    $rules[4] = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
    $rules[5] = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
    $rules[6] = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
    $rules[7] = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);
    $rules[8] = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);

    // cukup cocok
    $rules[9] = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
    $rules[10] = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);
    $rules[11] = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
    $rules[12] = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);
    $rules[13] = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
    $rules[14] = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);
    $rules[15] = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
    $rules[16] = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
    $rules[17] = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
    $rules[18] = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);
    $rules[19] = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
    $rules[20] = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
    $rules[21] = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
    $rules[22] = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);
    $rules[23] = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
    $rules[24] = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
    $rules[25] = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
    $rules[26] = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
    $rules[27] = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
	$rules[28] = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);
    $rules[29] = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
	$rules[30] = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
	$rules[31] = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);

    // cocok
    $rules[32] = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
    $rules[33] = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);
    $rules[34] = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
    $rules[35] = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);
    $rules[36] = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
    $rules[37] = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
    $rules[38] = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
    $rules[39] = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);
    $rules[40] = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
    $rules[41] = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);
    $rules[42] = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
    $rules[43] = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);
    $rules[44] = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
    $rules[45] = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);
    $rules[46] = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
    $rules[47] = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);
    $rules[48] = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
    $rules[49] = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
    $rules[50] = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
    $rules[51] = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);
    $rules[52] = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
    $rules[53] = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
    $rules[54] = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
    $rules[55] = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);
    $rules[56] = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
    $rules[57] = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);
    $rules[58] = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
    $rules[59] = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);
    $rules[60] = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
    $rules[61] = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
    $rules[62] = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
    $rules[63] = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);
    $rules[64] = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
    $rules[65] = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
    
    // sangat cocok
	$rules[66] = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
	$rules[67] = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);
	$rules[68] = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
    $rules[69] = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
	$rules[70] = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
    $rules[71] = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);
	$rules[72] = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
    $rules[73] = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);
	$rules[74] = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
	$rules[75] = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);
    $rules[76] = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
	$rules[77] = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
    $rules[78] = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
	$rules[79] = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
    $rules[80] = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);

?>