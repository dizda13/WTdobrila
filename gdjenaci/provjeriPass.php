<?php
$veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
$veza->exec("set names utf8");
$notifi = $veza->prepare("select username as user, password as pass FROM useri");
if (!$notifi) {
     $greska = $veza->errorInfo();
     print "SQL greška: " . $greska[2];
     exit();
}
$notifi->execute();
print "{ \"useri\": " . json_encode($notifi->fetchAll(PDO::FETCH_ASSOC)) . "}";
?>
