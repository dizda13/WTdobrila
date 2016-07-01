<?php include "dodavanjeUser.php";?>
<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Tutorijal 2, Zadatak 3</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">
<link rel="stylesheet" type="text/css" href="logo.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY onload="dugmeDaLI()">
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
      <label id="radi" onchange="brisiButton()"> <?php echo $username?> </label>
    <button name="logout" id="logout" type="submit" onclick="brisiButton()">Log out</button>
    </form>
  </div>
  </header>
  <ul class="glavnaT">
  <li class="traka"><a class="traka2" href="index.php">Home</a></li>
  <li class="traka"><a class="traka2" href="novosti.php">News</a></li>
  <li class="traka"><a class="active" href="kontakt.php">Contact</a></li>
  <li class="traka"><a class="traka2" href="oNama.php">Log in</a></li>
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
