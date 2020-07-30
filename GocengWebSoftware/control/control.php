<?php
$page = isset($_GET['page']) ? $_GET['page'] : "";
	if ($page=="home" xor $page == "" ) {
		include "view/sambutan.php";
	} 

//Beranda
   elseif ($page == "beranda") {
    include "view/page/beranda/beranda.php";
  }

//kas masuk
   elseif ($page == "kas-masuk") {
    include "view/page/kas-masuk/kas-masuk.php";
  }
   elseif ($page == "form-add-kas-masuk") {
    include "view/page/kas-masuk/form-add-kas-masuk.php";
  }
  elseif ($page == "proses-add-kas-masuk") {
    include "view/page/kas-masuk/proses-add-kas-masuk.php";
  }
  elseif ($page == "form-edit-kas-masuk") {
    include "view/page/kas-masuk/form-edit-kas-masuk.php";
  }
  elseif ($page == "form-cetak-kas-masuk") {
    include "view/page/kas-masuk/form-cetak-kas-masuk.php";
  }
  elseif ($page == "proses-hapus-kas-masuk") {
    include "view/page/kas-masuk/proses-hapus-kas-masuk.php";
  }
  elseif ($page == "proses-ubah-kas-masuk") {
    include "view/page/kas-masuk/proses-ubah-kas-masuk.php";
  }

//kas keluar
   elseif ($page == "kas-keluar") {
    include "view/page/kas-keluar/kas-keluar.php";
  }
   elseif ($page == "form-add-kas-keluar") {
    include "view/page/kas-keluar/form-add-kas-keluar.php";
  }
  elseif ($page == "proses-add-kas-keluar") {
    include "view/page/kas-keluar/proses-add-kas-keluar.php";
  }
  elseif ($page == "form-edit-kas-keluar") {
    include "view/page/kas-keluar/form-edit-kas-keluar.php";
  }
  elseif ($page == "form-cetak-kas-keluar") {
    include "view/page/kas-keluar/form-cetak-kas-keluar.php";
  }
  elseif ($page == "proses-hapus-kas-keluar") {
    include "view/page/kas-keluar/proses-hapus-kas-keluar.php";
  }
  elseif ($page == "proses-ubah-kas-keluar") {
    include "view/page/kas-keluar/proses-ubah-kas-keluar.php";
  }
//laporan kas masuk
  elseif ($page == "laporan-kas-masuk") {
    include "view/page/laporan-kas-masuk/laporan-kas-masuk.php";
  }
//laporan kas keluar
  elseif ($page == "laporan-kas-keluar") {
    include "view/page/laporan-kas-keluar/laporan-kas-keluar.php";
  }
  //laporan kas keluar
  elseif ($page == "laporan-rekapitulasi") {
    include "view/page/laporan-rekapitulasi/laporan-rekapitulasi.php";
  }
  //administrator
  elseif ($page == "administrator") {
    include "view/page/administrator/administrator.php";
  }
  elseif ($page == "form-add-admin") {
    include "view/page/administrator/form-add-admin.php";
  }
  elseif ($page == "proses-add-admin") {
    include "view/page/administrator/proses-add-admin.php";
  }
  elseif ($page == "form-edit-admin") {
    include "view/page/administrator/form-edit-admin.php";
  }
  elseif ($page == "proses-edit-admin") {
    include "view/page/administrator/proses-edit-admin.php";
  }
  elseif ($page == "proses-hapus-admin") {
    include "view/page/administrator/proses-hapus-admin.php";
  }
?>
