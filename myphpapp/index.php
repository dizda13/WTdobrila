<?php include "dodavanje.php";?>
<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Gdje na provod</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">
<link rel="stylesheet" type="text/css" href="logo.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>

<BODY onload="promijeni()">
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
  <li class="traka"><a class="active" href="index.php">Home</a></li>
  <li class="traka"><a class="traka2" href="novosti.php">News</a></li>
  <li class="traka"><a class="traka2" href="kontakt.php">Contact</a></li>
  <li class="traka"><a class="traka2" href="oNama.php">Log in</a></li>
  </ul>
  <form class="okvir" method="post" id="noviPost">
  <label><h2><b> Dodaj novi post </b></h2></label><br>
  <h3><label> Link slike</label><br><input name="linkSlike" class="links" type="text" id="sli"></input></h3><br>
  <h3><label> Tekst</label><br><textarea name="textVijesti" id="tekst"></textarea><br></h3>
  <h3><label> Kratica</label><br><input name="kratica" id="kratica" class="links" type="text" oninput="validBroj()"></textarea><br></h3>
  <h3><label> Broj</label><br><input name="broj" id="broj" class="links" type="text" oninput="validBroj()"></textarea><br></h3>
  <h3><button class="dodaj" type="submit" id="dugme">Dodaj</button></h3>
</form>
<form class="dropdown" onchange="upDate()" method="post">
  Filter
  <select id="lista" name="filter" type="submit">
    <option value="4">sve novosti</option>
    <option value="1">današnje novosti</option>
    <option value="2">novosti ove sedmice</option>
    <option value="3">novosti ovog mjeseca</option>
    <option value="5">alphabet</option>
  </select><br>
  Po <input type="radio" name="algo1" id="algo1" value="Datum" onchange="vratiDatum()" checked> Datumu </input>
  <input type="radio" name="algo2 " id="algo2" value="Abeceda" onchange="sortiraj()"> Abecedno<br> </input>
</FORM>
 <div id="postovi">
    <?php
      $file = fopen($_ENV['OPENSHIFT_DATA_DIR']."postovi.csv","r+");
      while(! feof($file))
      {
          $sve=fgetcsv($file);
          $temp=count($sve);
          $datum=$sve[0];
          if($datum=="")
            break;
          $slika=$sve[1];
          $tekst=$sve[2];
          ?>
        <div class="livo">
          <p><time class="vrijeme" datetime="<?php echo $datum?>"></time></p>
          <img src="<?php echo $slika?>" class="slika"></img>
          <p>
            <?php echo $tekst?>
          </p>
        </div>
        <?php
      }
    fclose($file);
    /*$veza = new PDO("mysql:dbname=mojProvd;host=127.6.180.2:3306", "admin8bDByfz", "");
    $veza->exec("set names utf8");
    $rezultat = $veza->query("select id_posta, text, vrijeme, UNIX_TIMESTAMP(vrijeme) vrijeme2, broj, urlSlike,mozelKom,username from postovi order by vrijeme desc");
    if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }

    foreach ($rezultat as $vijest) {
      $datum=date(DATE_ISO8601, $vijest['vrijeme2']);
      $slika=$vijest['urlSlike'];
      $tekst=$vijest['text'];
      ?>
    <div class="livo">
      <p><time class="vrijeme" datetime="<?php echo $datum?>"></time></p>
      <img src="<?php echo $slika?>" class="slika"></img>
      <p>
        <?php echo $tekst?>
      </p>
    </div>
    <?php
  }*/
    ?>
  </div>
</div>
</div>
  <script type="text/javascript" src="skriptica.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  </BODY>
  </HTML>
