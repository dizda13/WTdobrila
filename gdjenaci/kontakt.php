<?php include "dodavanjeUser.php";?>
<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
      if(!isset($_SESSION['klik']))
          $_SESSION['klik']=$temp;
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Gdje na provod</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">
<link rel="stylesheet" type="text/css" href="logo.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY onload="dugmeDaLI(); pokreniInterval();">
  <?php
    if($_SESSION['username']!="")
      $username="Hi, ".$_SESSION["username"];
    else
      $username="";
      if(isset($_POST['logout'])) {
      $_SESSION["username"]="";
      $username=$_SESSION["username"];
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
  <li class="traka"><a class="active" href="kontakt.php" id="contacts">Contact</a></li>
  <li class="traka"><a class="traka2" href="oNama.php" id="login">Log in</a></li>
  <li class="traka"><a class="traka2" href="mojeNovosti.php" id="mn">Moje novosti</a></li>
  <li class="traka"><a class="traka2" href="promijenaPass.php" id="phpProm">Promijeni password</a></li>
  </ul>
  <ul class="linkovi">
    <li><b>Linkovi:</b></li>
    <li>
      <a class="proba" href="https://www.facebook.com/"><img class="bulit" src="http://www.mojatvojamajica.hr/wp-content/uploads/2013/03/znak-krigla-piva.png"></img>Facebook</a>
    </li>
    <li>
      <a class="proba" href="https://twitter.com/">
        <img class="bulit" src="http://www.mojatvojamajica.hr/wp-content/uploads/2013/03/znak-krigla-piva.png"></img>Twitter
      </a>
    </li>
    <li>
      <a class="proba" href="https://www.instagram.com/">
        <img class="bulit" src="http://www.mojatvojamajica.hr/wp-content/uploads/2013/03/znak-krigla-piva.png"></img>Instagram
      </a>
    </li>
  </ul>
  <form class="okvir"  method="post">
  <div class="mojLab">
      <label>Username:
      <input class="cntr" type="text" name="username" id="user" oninput="validUser()"></input><br/>
  </label>
  </div>
    <div class="mojLab">
    <label> Email:
      <input class="cntr" type="text" name="Email" id="email" oninput="validEmail()"></input><br/>
    </label>
    </div>
    <div class="mojLab">
    <label > Password:
      <input class="cntr" type="text" name="password" id="pass" oninput="validPass()"></input><br/>
    </label>
    </div>
    <div class="mojLab">
    <label > Ponovi password:
      <input class="cntr" type="text" name="ponPassword" id="ponPass" oninput="validpPass()"></input><br/>
    </label>
    </div>
    <div class="mojLab">
    <button type="submit" id="regis" disabled>Registruj se</button>
    </div>
  </form>
  <script type="text/javascript" src="skriptica.js"></script>
</div>
  </BODY>
  </HTML>
