<?php
  $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  $veza->exec("set names utf8");
  $notifi = $veza->prepare("select komentari.id_posta as post, postovi.username as user FROM komentari, postovi WHERE daLiProcitan=1 AND komentari.id_posta = postovi.id_posta ORDER BY komentari.vrijeme DESC ");
  if (!$notifi) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
  $notifi->execute();
  print "{ \"komentari\": " . json_encode($notifi->fetchAll(PDO::FETCH_ASSOC)) . "}";
  /*$useri=[];
  $notifikacije=[[]];
  foreach ($komentari as $komentar) {
    $j=0;
    for($i=0;$i<count($useri);$i++){
      if($komentar['user']!=$useri[$i])
        $j++;
    }
    if(count($useri)==$j)
      array_push($useri, $komentar['user']);
  }

  for($i=0;$i<count($useri);$i++){
    $postovi = $veza->query("select komentari.id_posta as post, postovi.username as user FROM komentari, postovi WHERE daLiProcitan=1 AND komentari.id_posta = postovi.id_posta ORDER BY komentari.vrijeme DESC ");

    print $useri[$i]; ?></br><?php
    foreach ($postovi as $userKom) {
        if($userKom['user']==$useri[$i])
          print $userKom['post'];
    }
  }*/

?>
