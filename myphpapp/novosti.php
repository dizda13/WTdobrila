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
  <li class="traka"><a class="active" href="novosti.php">News</a></li>
  <li class="traka"><a class="traka2" href="kontakt.php">Contact</a></li>
  <li class="traka"><a class="traka2" href="oNama.php">Log in</a></li>
  </ul>
  <table>
    <th> Naziv </th>
    <th> Adresa </th>
    <th> Kontak tel </th>
    <th> Vrsta </th>
    <tr>
      <td> Sloga </td>
      <td> Tepebasina 1 </td>
      <td> 111111111</td>
      <td> Klub </td>
    </tr>
    <tr class="paran">
      <td> Bok </td>
      <td> Tepebasina 2 </td>
      <td> 222222222</td>
      <td> Klub </td>
    </tr>
    <tr>
      <td> Sami </td>
      <td> Tepebasina 3 </td>
      <td> 3333333333</td>
      <td> Kafana </td>
    </tr>
    <tr class="paran">
      <td> Chears </td>
      <td> Tepebasina 4 </td>
      <td> 444444444</td>
      <td> Caffe </td>
    </tr>
    <tr>
      <td> Korner </td>
      <td> Tepebasina 5 </td>
      <td> 55555555</td>
      <td> Pub </td>
    </tr>
  </table>
</div>
<script type="text/javascript" src="skriptica.js"></script>
  </BODY>
  </HTML>
