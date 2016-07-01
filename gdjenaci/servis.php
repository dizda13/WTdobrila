<?php
  $veza = new PDO("mysql:dbname=gdjenaci;host=127.9.150.2:3306", "adminhTVRNKM", "frnmtf1d4Rfl");
  $veza->exec("set names utf8");

  if(isset($_GET['autor'])) {
    $autor = $_GET['autor'];
    $x = isset($_GET['x']) ? intval($_GET['x']) : 10;

    $user = $veza->prepare('select * from useri where username = ?');
    if (!$user) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
    $user->bindValue(1, $autor, PDO::PARAM_STR);
    $user->execute();
    if(count($user->fetchAll()) == 0) {
      http_response_code(404);
      print '{
        "code":404,
        "message":"Nema autora!"
      }';
      exit();
    }

    $vijesti = $veza->prepare('select postovi.text as tekst, postovi.vrijeme as vrijeme, postovi.urlSlike as slika FROM postovi WHERE postovi.username = ? ORDER BY postovi.vrijeme DESC LIMIT ?');
    if (!$vijesti) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
    $vijesti->bindValue(1, $autor, PDO::PARAM_STR);
    $vijesti->bindValue(2, $x, PDO::PARAM_INT);
    $vijesti->execute();
    $rezultat = $vijesti->fetchAll(PDO::FETCH_ASSOC);
    if(count($rezultat) == 0) {
      http_response_code(404);
      print '{
        "code":404,
        "message":"Nema vijesti!"
      }';
      exit();
    }
    print "{ \"vijesti\": " . json_encode($rezultat) . "}";
  } else {
    http_response_code(400);
    print '{
      "code":400,
      "message":"Parametar autor je obavezan!"
    }';
  }



?>
