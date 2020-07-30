<?php
function tglindo($date){
    $blnindo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $thn = substr($date, 0, 4);
    $bln = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $blnindo[(int)$bln-1] . " ". $thn;        
    return($result);
}
?>