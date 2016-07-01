<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
      if(!isset($_SESSION['klik']))
          $_SESSION['klik']=$temp;
    ?>
<?php
if(isset($_POST['password'])){
  /*$file = file_get_contents($_ENV['OPENSHIFT_DATA_DIR']."useri.txt");
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $tekst = explode(",", $file);
  ?>
  <p> <?php echo count($tekst); ?>
    <?php
  for($i=0;$i<count($tekst);$i=$i+3)
  {
        if($tekst[$i]==$user)
        {
          $tekst[$i+2] = str_replace("\n", "", $tekst[$i+2]);
          $tekst[$i+2] = str_replace(" ", "", $tekst[$i+2]);
          if(md5($pass)==$tekst[$i+2])
          {
                $_SESSION["username"]=$user;
                $doslo=$user;
          }
          break;
        }
      }*/
      $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
      $veza->exec("set names utf8");
      $rezultat = $veza->query("select username, password from useri");
      if (!$rezultat) {
           $greska = $veza->errorInfo();
           print "SQL greška: " . $greska[2];
           exit();
      }
      $getUser=$_POST['username'];
      $getPass=$_POST['password'];
      foreach ($rezultat as $user) {
        if($getUser==$user[0])
        {
          if(md5($getPass)==$user[1])
          {
                $_SESSION["username"]=$getUser;
                $doslo=$getUser;
                header('Location: http://gdjenaci-provod.rhcloud.com/index.php');
          }
          break;
        }
  }
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
  <li class="traka"><a class="active" href="oNama.php" id="login">Log in</a></li>
  <li class="traka"><a class="traka2" href="mojeNovosti.php" id="mn">Moje novosti</a></li>
  <li class="traka"><a class="traka2" href="promijenaPass.php" id="phpProm">Promijeni password</a></li>
  </ul>
  <form class="okvir"  method="post">
  <div class="mojLab">
      <label>Username:
      <input class="cntr" type="text" name="username" id="user"></input><br/>
  </label>
    <div class="mojLab">
    <label > Password:
      <input class="cntr" type="text" name="password" id="pass"></input><br/>
    </label>
    </div>
    <div class="mojLab">
    <button type="submit" id="regis">Prijavi se</button>
    </div>
  </form>
</div>
<script type="text/javascript" src="skriptica.js"></script>
  </BODY>
  </HTML>
