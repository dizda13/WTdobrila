<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
      if(!isset($_SESSION['klik']))
          $_SESSION['klik']=$temp;
    ?>
<?php

if(isset($_POST['promijeni'])){
  $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  $veza->exec("set names utf8");
  $user = $veza->prepare("update useri set password= ? where username= ?");
  if (!$user) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
  print $_POST['password'];
  $pass=md5($_POST['password']);
  $user->bindValue(1, $pass , PDO::PARAM_STR);
  $user->bindValue(2, $_SESSION['username'] , PDO::PARAM_STR);
  $user->execute();
  if (!$user) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
  //$veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  //$veza->exec("set names utf8");
  //$update = $veza->query("update useri set password=".$pass." where username=".$_SESSION['username']);
}

if(isset($_POST['brojNot'])){
for($i=0;$i<$_POST['brojNot']+1;$i++) {
if(isset($_POST['btn'.$i])){
  $_SESSION['klik']=$_POST['btn'.$i];
  //$veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  //$veza->exec("set names utf8");
  //$update = $veza->query("update komentari set daLiProcitan=0 where id_posta=".$_POST['btn'.$i]);
    header('Location: http://gdjenaci-provod.rhcloud.com/mojeNovosti.php');
}
}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Gdje na provod</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">
<link rel="stylesheet" type="text/css" href="logo.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY onload="dugmeDaLI(); pokreniInterval()">
  <?php
    if($_SESSION['username']!="")
      $username="Hi, ".$_SESSION["username"];
    else
      $username="";
      if(isset($_POST['logout'])) {
      $_SESSION["username"]="";
      $username=$_SESSION["username"];
    }
  ?>
  <div class="container">
    <header>
    <div class="proba">
    <div class="pivo">
    <div class="rucka1"></div>
    <div class="rucka2"></div>
    <div class="rucka3"></div>
    <div class="krigla"></div>
    <div class="glavni"></div></div>
    <h1>GDJE NACI PROVOD</h1>
    <form method="post" action=''>
      <label id="radi" onchange="brisiButton()"><?php echo $username?></label>
    <button name="logout" id="logout" type="submit" onclick="brisiButton()">Log out</button></br>
    <label id="notify"> </label>
    <div class="dropdown" id="dropdown">
    <button onclick="pokaziListu()" id="pogledaj" type="button" name="btn0" class="dropbtn"> (0) </button>
    <div id="myDropdown" class="dropdown-content">
    </div>
  </div>
  <input name="brojNot" class="nedivljiv" value="" id="brojNot"></input>
    </form>
  </div>
  </header>
  <ul class="glavnaT">
  <li class="traka"><a class="traka2" href="index.php">Home</a></li>
  <li class="traka"><a class="traka2" href="novosti.php">News</a></li>
  <li class="traka"><a class="traka2" href="kontakt.php" id="contacts">Contact</a></li>
  <li class="traka"><a class="traka2" href="oNama.php" id="login">Log in</a></li>
  <li class="traka"><a class="traka2" href="mojeNovosti.php" id="mn">Moje novosti</a></li>
  <li class="traka"><a class="active" href="promijenaPass.php" id="phpProm">Promijeni password</a></li>
  </ul>
  <form class="okvir"  method="post">
  <div class="mojLab">
      <label>Trenutni password:
      <input class="cntr" type="text" name="trenPass" id="trenPass" onChange="trenutniPass()"></input><br/>
  </label>
  <div class="mojLab">
  <label > Novi password:
    <input class="cntr" type="text" name="password" id="pass" oninput="validNoviPass()"></input><br/>
  </label>
  </div>
  <div class="mojLab">
  <label > Ponovi novi password:
    <input class="cntr" type="text" name="ponPassword" id="ponPass" oninput="validNovipPass()"></input><br/>
  </label>
  </div>
    <div class="mojLab">
    <button type="submit" id="regis" name="promijeni" disabled>Promijeni</button>
    </div>
  </form>
</div>
<script type="text/javascript" src="skriptica.js"></script>
  </BODY>
  </HTML>
