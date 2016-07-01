<?php
if(isset($_POST['ponPassword'])){
  /*$file = file_get_contents($_ENV['OPENSHIFT_DATA_DIR']."useri.txt");
  $user=$_POST['username'];
  $email=$_POST['Email'];
  $pass=$_POST['password'];
  $passHash=md5($pass);
  $file = $user.",".$email.",".$passHash.",".$file;
  file_put_contents($_ENV['OPENSHIFT_DATA_DIR']."useri.txt",$file);*/
  $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  $veza->exec("set names utf8");
  $pass=$_POST['password'];
  $passHash=md5($pass);
  $rezultat = $veza->query("insert into useri (username, email, password) VALUES ('".$_POST['username']."','".$_POST['Email']."','".$passHash."')");
  if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
}
?>
