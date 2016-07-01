<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
    ?>
<?php
if(isset($_POST['password'])){
  $file = file_get_contents($_ENV['OPENSHIFT_DATA_DIR']."useri.txt");
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
        }
  }
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
  <li class="traka"><a class="traka2" href="kontakt.php">Contact</a></li>
  <li class="traka"><a class="active" href="oNama.php">Log in</a></li>
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
