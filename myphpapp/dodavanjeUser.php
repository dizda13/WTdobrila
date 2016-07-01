<?php
if(isset($_POST['ponPassword'])){
  $file = file_get_contents($_ENV['OPENSHIFT_DATA_DIR']."useri.txt");
  $user=$_POST['username'];
  $email=$_POST['Email'];
  $pass=$_POST['password'];
  $passHash=md5($pass);
  $file = $user.",".$email.",".$passHash.",".$file;
  file_put_contents($_ENV['OPENSHIFT_DATA_DIR']."useri.txt",$file);
  /*$veza = new PDO("mysql:dbname=mojProvd;host=127.6.180.2:3306", "admin8bDByfz", "");
  $veza->exec("set names utf8");
  $rezultat = $veza->query("INSERT INTO useri (username, email, password) VALUES (".$_POST['username'].",".$_POST['Email'].",".$_POST['password'].")");
  if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }*/
}
?>
