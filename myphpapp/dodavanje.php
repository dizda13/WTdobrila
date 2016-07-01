<?php
if(isset($_POST['textVijesti'])){
$file = file_get_contents($_ENV['OPENSHIFT_DATA_DIR']."postovi.csv");
$datum=date(DATE_ISO8601, strtotime("now"));
$text=$_POST['textVijesti'];
if (isset($_POST['linkSlike'])) {
  $link=$_POST['linkSlike'];
  if (!filter_var($link, FILTER_VALIDATE_URL) === false) {
    if(strpos($link, ',')!==FALSE){
      $link = str_replace('"', '""', $link);
      $link = '"'.$link.'"';
    }
  } else {
    $link="http://www-tc.pbs.org/black-culture/lunchbox_plugins/s/photogallery/img/no-image-available.jpg";
  }
}
else {
  $link="http://www-tc.pbs.org/black-culture/lunchbox_plugins/s/photogallery/img/no-image-available.jpg";
}
$text = str_replace("\n", "<br>", $text);
if(strpos($text, ',')!==FALSE){
  $text = str_replace('"', '""', $text);
  $text = '"'.$text.'"';
}
$file = $datum.",".$link.",".$text."\n".$file;
file_put_contents($_ENV['OPENSHIFT_DATA_DIR']."postovi.csv",$file);
}

  /*if(isset($_POST['textVijesti'])){
    $veza = new PDO("mysql:dbname=mojProvd;host=127.6.180.2:3306", "admin8bDByfz", "");
    $veza->exec("set names utf8");
    if (isset($_POST['linkSlike'])) {
      $link=$_POST['linkSlike'];
      if (!filter_var($link, FILTER_VALIDATE_URL) === false) {
        if(strpos($link, ',')!==FALSE){
          $link = str_replace('"', '""', $link);
          $link = '"'.$link.'"';
        }
      } else {
        $link="http://www-tc.pbs.org/black-culture/lunchbox_plugins/s/photogallery/img/no-image-available.jpg";
      }
    }
    else {
      $link="http://www-tc.pbs.org/black-culture/lunchbox_plugins/s/photogallery/img/no-image-available.jpg";
    }
    $rezultat = $veza->query("INSERT INTO postovi (text, broj, urlSlike,mozelKom,username) VALUES (".$_POST['textVijesti'].", ".$_POST['broj'].", ".$link.",1,".$_SESSION['username'].")");
    if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
  }*/
?>
