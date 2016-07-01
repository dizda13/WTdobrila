<?php session_start();
    $temp="";
    if(!isset($_SESSION['username']))
      $_SESSION['username']=$temp;
    if(!isset($_SESSION['klik']))
        $_SESSION['klik']=$temp;
    ?>
  <?php include "dodavanjeKom.php";?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Gdje na provod</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">
<link rel="stylesheet" type="text/css" href="logo.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY onload="mojeNov()">
  <p class="nedivljiv">0</p>
  <?php
    if($_SESSION['username']!="")
      $username="Hi, ".$_SESSION["username"];
    else
      $username="";
      if(isset($_POST['logout'])) {
      $_SESSION["username"]="";
      $username=$_SESSION["username"];
      print strtotime("now");
    }
    if(isset($_POST['brojNot'])){
  for($i=0;$i<$_POST['brojNot']+1;$i++) {
    if(isset($_POST['btn'.$i])){
      $_SESSION['klik']=$_POST['btn'.$i];
      $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
      $veza->exec("set names utf8");
      $update = $veza->query("update komentari set daLiProcitan=0 where id_posta=".$_POST['btn'.$i]);
    }
  }
}
$preusmer= new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
$preusmer->exec("set names utf8");
$nekaVeza=$preusmer->query("select count(*) as br from postovi");
$brojBtn=$nekaVeza->fetchColumn();
  for($i=0;$i<$brojBtn;$i++) {
    if(isset($_POST['pokaziV'.$i])){
      $_SESSION['klik']=$_POST['pokaziV'.$i];
      $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
      $veza->exec("set names utf8");
      if($_POST['userP'.$i]==$_SESSION['username'])
        $update = $veza->query("update komentari set daLiProcitan=0 where id_posta=".$_POST['pokaziV'.$i]);
      header('Location: http://gdjenaci-provod.rhcloud.com/mojeNovosti.php');
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
  <li class="traka"><a class="traka2" href="kontakt.php" id="contacts">Contact</a></li>
  <li class="traka"><a class="traka2" href="oNama.php" id="login">Log in</a></li>
  <li class="traka"><a class="active" href="mojeNovosti.php" id="mn">Moje novosti</a></li>
  <li class="traka"><a class="traka2" href="promijenaPass.php" id="phpProm">Promijeni password</a></li>
  </ul>
  <div id="postovi">
    <input name="kakoPisati" value="daLiKlik()" class="nedivljiv"></input>
     <?php
     $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
     $veza->exec("set names utf8");
     if($_SESSION['klik']=="")
     $rezultat = $veza->query("select id_posta, text, vrijeme, UNIX_TIMESTAMP(vrijeme) vrijeme2, broj, urlSlike,mozelKom,username from postovi where username='".$_SESSION['username']."' order by vrijeme desc");
     else {
       $rezultat = $veza->query("select id_posta, text, vrijeme, UNIX_TIMESTAMP(vrijeme) vrijeme2, broj, urlSlike,mozelKom,username from postovi where id_posta='".$_SESSION['klik']."' order by vrijeme desc");
       $_SESSION['klik']="";
     }
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
     $brojac=0;
     $koemn=0;
     foreach ($rezultat as $vijest) {
       $datum=date(DATE_ISO8601, $vijest['vrijeme2']);
       $slika=$vijest['urlSlike'];
       $tekst=$vijest['text'];
       $brKom=$veza->query("select count(*) as brKo from komentari where id_kom_kom IS NULL AND id_posta=".$vijest['id_posta']);
       $komentari=$veza->query("select username, text, id_kom_kom, id_komentara from komentari where id_posta=".$vijest['id_posta']." order by vrijeme asc");
       foreach ($brKom as $count)
         $brKo=$count['brKo'];
         $pokaziV="pokaziV".$koemn;
         $userBr="userP".$koemn;
       ?>
     <div class="livo">

       <b><p>Objavio: <?php echo $vijest['username'] ?></p></b>
       <form method="post">
       <input class="nedivljiv" name="<?php echo $userBr?>" value="<?php echo $vijest['username'] ?>"></input>
       <button class="bVise" value="<?php echo $vijest['id_posta']?>" name="<?php echo $pokaziV?>" type="submit">Pokazi vise</button>
     </form>
       <p><time class="vrijeme" datetime="<?php echo $datum?>"></time></p>
       <img src="<?php echo $slika?>" class="slika"></img>
       <p>
         <?php echo $tekst?>
       </p>

       <?php if($vijest['mozelKom']==1){ ?>
       <a class="komentari" onclick="pokaziKom(<?php echo $brojac?>)"> Komentara (<?php echo $brKo?>) </a>
       <form method="post" id="kkom" class="nedivljivKom">
         <input name="brojKomentara" value="<?php echo $brKo?>" class="nedivljiv"></input>
         <?php
         $i=0;
         foreach ($komentari as $komentar) {
           if($komentar['id_kom_kom']==NULL){
             $brKK=$veza->query("select count(*) as brKo from komentari where id_posta=".$vijest['id_posta']."AND id_kom_kom=".$komentar['id_komentara']);
           ?>
           <div class="tkom" >
           <p class="user" name="radiValjda"> <?php echo $komentar['username'] ?> </p>
           <p class="tk"> <?php echo $komentar['text'] ?> </p>
           <small class="komNaKom"> Komentar na komentar </small> </br>
           <?php
           $komVar=$veza->query("select username, text, id_kom_kom, id_komentara from komentari where id_posta=".$vijest['id_posta']." order by vrijeme asc");
             foreach ($komVar as $komentarcici) {
                 if($komentarcici['id_kom_kom']==$komentar['id_komentara']){
                 ?>
                 <small class="komNaKom" > <b><?php echo $komentarcici['username'] ?></b> </small></br>
                 <small class="komNaKom"> <?php echo $komentarcici['text'] ?> </small></br>
                 <?php
               }
             }
             $ime1="textKomNaKom_".$i;
             $ime2="dodKomNaKom_".$i;
             $ime3="id_commen_".$i;
           ?>
           <input name="<?php echo $ime3 ?>" value="<?php echo $komentar['id_komentara']?>" class="nedivljiv"></input>
           <textarea name="<?php echo $ime1?>" class="textKomentaraKom" id="textKomentara"></textarea>
           <button type="submit" name="<?php echo $ime2?>" id="dugme" value="<?php echo $vijest['id_posta']?>"><small>Dodaj</small></button>
         </div>
           <?php
           $i++;
           }
         }
         ?>
         <br><p> Napisi komentar </p>
         <textarea name="textKomentara" class="textKomentara" id="textKomentara"></textarea>
         <h3><button type="submit" name="dodavanjeKomntara" id="dugme" value="<?php echo $vijest['id_posta']?>">Dodaj</button></h3>
       </form>
    <?php }else{ $brojac--; } ?>
      </div>
     <?php
     $brojac++;
     $koemn++;
     }
     ?>
   </div>
</div>
<script type="text/javascript" src="skriptica.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</BODY>
</HTML>
