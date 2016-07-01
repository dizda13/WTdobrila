<?php
if(isset($_POST['brojKomentara'])){
$i=0;
while($i<$_POST['brojKomentara']){
if(isset($_POST['dodKomNaKom_'.$i])){
  $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  $veza->exec("set names utf8");
  $textKom=$_POST['textKomNaKom_'.$i];
  if($_SESSION['username']=="")
    $ime="guest";
  else {
    $ime=$_SESSION['username'];
  }
  $user=$veza->query("select username as un from postovi where id_posta=".$_POST['dodKomNaKom_'.$i]);
  if($_SESSION['username']!=$user->fetchColumn())
    $rezultat = $veza->query("insert into komentari (id_posta, id_kom_kom, username, vrijeme, text) VALUES (".$_POST['dodKomNaKom_'.$i].",".$_POST['id_commen_'.$i].",'".$ime."',CURRENT_TIMESTAMP,'".$textKom."')");
  else
    $rezultat = $veza->query("insert into komentari (id_posta, id_kom_kom, username, vrijeme, text, daLiProcitan) VALUES (".$_POST['dodKomNaKom_'.$i].",".$_POST['id_commen_'.$i].",'".$ime."',CURRENT_TIMESTAMP,'".$textKom."', 0)");
  if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
  }
  $i++;
}
}
if(isset($_POST['dodavanjeKomntara'])){
  $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  $veza->exec("set names utf8");
  $textKom=$_POST['textKomentara'];
  if($_SESSION['username']=="")
    $ime="guest";
  else {
    $ime=$_SESSION['username'];
  }

  $user=$veza->query("select username as un from postovi where id_posta=".$_POST['dodavanjeKomntara']);

  if($_SESSION['username']!=$user->fetchColumn())
    $rezultat = $veza->query("insert into komentari (id_posta, username, vrijeme, text) VALUES (".$_POST['dodavanjeKomntara'].",'".$ime."',CURRENT_TIMESTAMP,'".$textKom."')");
    else {
      $rezultat = $veza->query("insert into komentari (id_posta, username, vrijeme, text,daLiProcitan) VALUES (".$_POST['dodavanjeKomntara'].",'".$ime."',CURRENT_TIMESTAMP,'".$textKom."', 0)");
    }
  if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
}
?>
