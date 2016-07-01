<?php
$dino= new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
$dino->exec("set names utf8");
$countP=$dino->query("select count(*) as br from postovi");
$brojP=$countP->fetchColumn();
  for($i=0;$i<$brojP;$i++) {
    if(isset($_POST['brisiPost'.$i])){
    $brisanje=$dino->query("delete FROM postovi WHERE id_posta=".$_POST['brisiPost'.$i]);
    if (!$brisanje) {
         $greska = $dino->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
    }
  }
  $countK=$dino->query("select count(*) from komentari where id_kom_kom IS NULL");
  $brojK=$countK->fetchColumn();
    for($i=0;$i<$brojK;$i++) {
      if(isset($_POST['brisiKom'.$i])){
        print $brojK;
        $brisanje=$dino->query("delete FROM komentari WHERE id_komentara=".$_POST['brisiKom'.$i]);
        if (!$brisanje) {
             $greska = $dino->errorInfo();
             print "SQL greška: " . $greska[2];
             exit();
        }
      }
    }
    $countKK=$dino->query("select count(*) from komentari where id_kom_kom IS NOT NULL");
    $brojKK=$countKK->fetchColumn();
      for($i=0;$i<$brojKK;$i++) {
        if(isset($_POST['brisiKnaK'.$i])){
          $brisanje=$dino->query("delete FROM komentari WHERE id_komentara=".$_POST['brisiKnaK'.$i]);
          if (!$brisanje) {
               $greska = $dino->errorInfo();
               print "SQL greška: " . $greska[2];
               exit();
          }
        }
      }
?>
