<?php
require "../FPDF/fpdf.php"; 
include "../control/tgl.php"; //pemanggilan tanggal untuk convert ke format d F Y
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'goceng');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$from=$_POST['from'];
$end=$_POST['end'];
{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}


class mypdf extends FPDF{

    function header(){
        $from=$_POST['from'];
        $end=$_POST['end'];

        $dari=''.tglindo("$_POST[from]").'';
        $sampai=''.tglindo("$_POST[end]").'';
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(220,230,0);
        // $this->SetTextColor(220,50,50);
        $this->setfont('Arial','B',12);
        $this->cell(276,5,'GOCENG SANTUY',0,0,'C');
        $this->Ln();
        $this->setfont('Arial','B',12);
        $this->cell(276,10,'JL SANTUY NO 81 YOGYAKARTA',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(276,15,'Telp. 085273264949',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(276,30,'LAPORAN REKAPITULASI PEMASUKAN',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(131,35,$dari,0,0,'R');
        $this->cell(11,35,'S/D',0,0,'R');
        $this->cell(40,35,$sampai,0,0,'R');
        $this->Ln(2);
        $this->Cell(276,1,'','B',1,'C');
        $this->Cell(276,1,'','B',0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->setY(-15);
        $this->setfont('Arial','',8);
        $this->cell(0,10,'Page '.$this->Pageno().'/{nb}',0,0,'C');
    }
    Function headerTable(){
        $this->setfont('Times','B',12);
        $this->SetFillColor(220,220,0);
        // $this->SetTextColor(220,50,50);
        $this->SetDrawColor(0,80,180);
        // $this->SetLineWidth(.3);
        $this->cell(10,7,'No',1,0,'C',true);
        $this->cell(40,7,'Tanggal',1,0,'C',true);
        $this->cell(120,7,'Kategori',1,0,'C',true);
        $this->cell(50,7,'Pemasukan',1,0,'C',true);
        $this->cell(40,7,'Saldo Pemasukan',1,0,'C',true);
        $this->Ln();
       
        
    } 
            function viewtable($con, $from, $end){
            $this->setfont('Times','',12); 
            $query=mysqli_query($con,"select * from uangmasuk order by tanggal asc");
            while($lihat = mysqli_fetch_array($query)){
            $total_masuk = $lihat['jumlah'];
            @$hitung+ = $total_masuk;
            @$saldo = $saldo + $lihat['jumlah'];
            @$hitung1+=$total_keluar;
            $keseluruhan=$hitung-$hitung1;
            $tglinv=''.tglindo("$lihat[tanggal]").'';
            @$no++;

            
            $this->cell(10,7, @$no, 1, 0,'C');
            $this->Cell(40,7, $tglinv,1,0,'C');
            $this->Cell(120,7,$lihat['kategori'],1,0,'L');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(50, 7, "".number_format($lihat['jumlah']).",00", 1, 0,'R');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(40, 7, "".number_format(@$saldo).",00", 1, 0,'R');
            $this->Ln();
            
        }

            $this->Cell(170, 7, 'JUMLAH', 1,0,'C',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L',true);
            $this->Cell(50, 7, "".number_format(@$hitung).",00", 1, 0,'R',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L');
            $this->Cell(40, 7, "".number_format(@$keseluruhan).",00", 1, 0,'R',true);
            $this->Ln(); 
}

            //MENAMPILKAN PENGELUARAN
        Function headerTabel(){
        $from=$_POST['from'];
        $end=$_POST['end'];

        $dari=''.tglindo("$_POST[from]").'';
        $sampai=''.tglindo("$_POST[end]").'';
        $this->setfont('Arial','B',12);
        $this->cell(276,30,'LAPORAN REKAPITULASI PENGELUARAN',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(131,35,$dari,0,0,'R');
        $this->cell(11,35,'S/D',0,0,'R');
        $this->cell(40,35,$sampai,0,0,'R');
        $this->Ln(2);
        $this->Cell(276,1,'','B',1,'C');
        $this->Cell(276,1,'','B',0,'C');
        $this->Ln(20);
        $this->setfont('Times','B',12);
        $this->SetFillColor(220,220,0);
        // $this->SetTextColor(220,50,50);
        $this->SetDrawColor(0,80,180);
        // $this->SetLineWidth(.3);
        $this->cell(10,7,'No',1,0,'C',true);
        $this->cell(40,7,'Tanggal',1,0,'C',true);
        $this->cell(120,7,'Kategori',1,0,'C',true);
        $this->cell(50,7,'Pengeluaran',1,0,'C',true);
        $this->cell(40,7,'Saldo Pengeluaran',1,0,'C',true);
        $this->Ln();
       
        
    } 

    function viewtabel($con, $from, $end){
        $this->setfont('Times','',12); 
        $query=mysqli_query($con,"select * from uangkeluar order by tanggal asc");
            while($lihat=mysqli_fetch_array($query)){
            $total_keluar=$lihat['jumlah'];
            @$hitung+=$total_keluar;
            @$saldo = $saldo + $lihat['jumlah'];
            @$hitung1+=$total_masuk;
            $keseluruhan=$hitung-$hitung1;
            $tglinv=''.tglindo("$lihat[tanggal]").'';
            @$no++;

            
            $this->cell(10,7, @$no, 1, 0,'C');
            $this->Cell(40,7, $tglinv,1,0,'C');
            $this->Cell(120,7,$lihat['kategori'],1,0,'L');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(50, 7, "".number_format($lihat['jumlah']).",00", 1, 0,'R');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(40, 7, "".number_format(@$saldo).",00", 1, 0,'R');
            $this->Ln();
            
        }

            $this->Cell(170, 7, 'JUMLAH', 1,0,'C',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L',true);
            $this->Cell(50, 7, "".number_format(@$hitung).",00", 1, 0,'R',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L');
            $this->Cell(40, 7, "".number_format(@$keseluruhan).",00", 1, 0,'R',true);
            $this->Ln(); 

        }

            //MENAMPILKAN SALDO TOTAL
         Function headerTabell(){
        $from=$_POST['from'];
        $end=$_POST['end'];

        $dari=''.tglindo("$_POST[from]").'';
        $sampai=''.tglindo("$_POST[end]").'';
        $this->setfont('Arial','B',12);
        $this->cell(276,30,'LAPORAN REKAPITULASI TOTAL KEUANGAN',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(131,35,$dari,0,0,'R');
        $this->cell(11,35,'S/D',0,0,'R');
        $this->cell(40,35,$sampai,0,0,'R');
        $this->Ln(2);
        $this->Cell(276,1,'','B',1,'C');
        $this->Cell(276,1,'','B',0,'C');
        $this->Ln(20);
        $this->setfont('Times','B',12);
        $this->SetFillColor(220,220,0);
        // $this->SetTextColor(220,50,50);
        $this->SetDrawColor(0,80,180);
        // $this->SetLineWidth(.3);
      
        $this->cell(70,7,'URAIAN',1,0,'C',true);
        $this->cell(70,7,'PEMASUKAN',1,0,'C',true);
        $this->cell(70,7,'PENGELUARAN',1,0,'C',true);
        $this->cell(50,7,'SALDO TOTAL',1,0,'C',true);
        $this->Ln();
       
        
    } 
    function viewtabell($con, $from, $end){
        $this->setfont('Times','',12); 
        
        $totmasuk = mysqli_query($con,"select SUM(jumlah) AS total, tanggal from uangmasuk");
        $r = mysqli_fetch_array($totmasuk);
        $totmasuk1 = mysqli_query($con,"select SUM(jumlah) AS total2, tanggal from uangkeluar");
        $r1 = mysqli_fetch_array($totmasuk1);
        $keseluruhan=$r+$r1;

        
            
        

            $this->Cell(70, 7, 'JUMLAH', 1,0,'C',true);
            $this->Cell(0.001 ,9,'Rp.',1,0,true);
            $this->Cell(70, 7, "".number_format($r['total']).",00", 1, 0,'R',true);
            $this->Cell(0.001 ,7,'Rp.',1,0,true);
            $this->Cell(70, 7, "".number_format($r1['total2']).",00", 1, 0,'R',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,true);
            $this->Cell(50, 7, "".number_format($r['total'] - $r1['total2']).",00", 1, 0,'R',true);

            $this->Ln(); 

        
         //menampilkan fungsi format tanggal Indonesia
              $bulan = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
              $waktu[1]=date("d",time());
              $waktu[2]=date("m",time());
              $waktu[3]=date("Y",time());
              $tanggalini="$waktu[1] ".$bulan[$waktu[2]-1]." $waktu[3]";
        // mencetak tanggal
        $this->Ln(4);
        $this->Cell(266,15,' YOGYAKARTA, '.$tanggalini,0,1, 'R');
      
        $this->Cell(258,1,'BENDAHARA',0,1, 'R');  
        $this->Ln(5);
       
            $this->Cell(272,30,'MUHAMMAD MURDIFIN',0,1,'R');
        }
        
    }

   


$pdf = new mypdf();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewtable($con, $from, $end);
$pdf->headerTabel();
$pdf->viewtabel($con, $from, $end);
$pdf->headerTabell();
$pdf->viewtabell($con, $from, $end);
$pdf->Output();   