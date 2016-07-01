<?php
/*
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
}*/

  if(isset($_POST['textVijesti']) && isset($_POST['newPost'])){
    $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
    $veza->exec("set names utf8");
    $link="";
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
    print $_POST['daLiKom'];
    $rezultat = $veza->query("insert into postovi (id_posta,text, broj, vrijeme, urlSlike,mozelKom,username) values (NULL,'".$_POST['textVijesti']."', '".$_POST['broj']."', CURRENT_TIMESTAMP, '".$link."','".$_POST['daLiKom']."','".$_SESSION['username']."')");
    if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
  }
?>
