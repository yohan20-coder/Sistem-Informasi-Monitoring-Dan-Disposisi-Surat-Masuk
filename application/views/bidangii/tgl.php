<?php

function bulan_indo($bln)
{
    $bln = (int) $bln;
    $bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

    return $bulan[$bln];
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl,8,2);
    $bulan = bulan_indo(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);

    return $tanggal.' '.$bulan.' '.$tahun;

}

?>