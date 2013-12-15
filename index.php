<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">


  <title>UMFRAGE</title>
  <meta name="description" content="">
  <meta name="author" content="Mirko Finke">

  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <style type="text/css">
      .aussen-box { 
        position:absolute;
        text-align:center;
        border: 5px solid #000000;
        background-color:#C0C0C0;
        width: 800px;
      }
  
  </style>
</head>

<body>
<form action="index.php" method="post">
  <div class="aussen-box">
    <div>
        
        <header>
            <h1>Umfrage</h1>
        </header>
        <p>
    

      <input type="hidden" name="hidden" value="yes">
  <?php
    $htmlDoc = '
        Vorname: <input type="text" name="vorname" size="30">
        Name: <input type="text" name="name" size="30">
    </div>
    <p><br>
    
    <h3>Wer war der Erfinder von Linux?</h3>
    <img src="scr/linus.png" width="30%" height="30%"><br>

    <div id="radio_left">
      <input type="radio" name="kategorie1" value="1-1" />Steve Jobs<br>
      <input type="radio" name="kategorie1" value="1-2" />Bill Gates<br>
      <input type="radio" name="kategorie1" value="1-3" />Linus Toarvards<---
    </div>
    </p>
    
      <h3>Was bedeuted der Konsolenbefehl "chmod 644" unter Linux-Systemen?</h3>
      <img src="scr/pinguin.gif" width="15%" height="15%"><br>
      <input type="radio" name="kategorie2" value="2-1">Der Eigentümer darf lesen, schreiben und ausführen, alle anderen nur lesen.<br>
      <input type="radio" name="kategorie2" value="2-2">Der Eigentümer darf lesen und schreiben, alle anderen nur lesen.<---<br>
      <input type="radio" name="kategorie2" value="2-3">Eigentümer und Gruppe dürfen lesen und schreiben, der Rest nichts. 
    </p>

      <h3>Was ist Ubuntu?</h3>
      <div>
      <img src="scr/ubuntu.png" width="15%" height="15%">
      </div>
      <input type="radio" name="kategorie3" value="3-1">Linux-Distrbution<--- <br>
      <input type="radio" name="kategorie3" value="3-2">Ein Handy <br>
      <input type="radio" name="kategorie3" value="3-3">Ein Unix-System
    </p>

      <h3>Welche Distribution ist eine Roling-Release?</h3>
      <img src="scr/archlinux.png" width="15%" height="15%"><br>

      <input type="radio" name="kategorie4" value="4-1">Fedora<br>
      <input type="radio" name="kategorie4" value="4-2">Manjaro<---<br>
      <input type="radio" name="kategorie4" value="4-3">Kali<p></p>
      ';
      


    if(!isset($_POST['hidden'])){
        echo $htmlDoc;
        echo '<input type="submit" name="Submit" value="Submit">';
        echo '<input type="reset" name="Reset" value="Reset">';
    }else{
      $vorname = $_POST['vorname'];
      $name = $_POST['name'];
      $umfrage1 = $_POST['kategorie1'];
      $umfrage2 = $_POST['kategorie2'];
      $umfrage3 = $_POST['kategorie3'];
      $umfrage4 = $_POST['kategorie4'];

      if( empty($vorname)){
          $vorname = "kein";
      }
      if(empty($name)){
          $name = "kein";
      }

      //echo $vorname;
      //echo $name;

      if( empty($umfrage1) || empty($umfrage2) || empty($umfrage3) || empty($umfrage4) ){
        echo $htmlDoc;
        Echo "<h4>Bitte beantworten Sie alle Fragen<br><h4>";
        echo '<input type="submit" name="Submit" value="Submit">';
        echo '<input type="reset" name="Reset" value="Reset">';
      }else{

        $cvsData = "\n" . $vorname . ";" . $name . ";" . $umfrage1 . ";" . $umfrage2 . ";" . $umfrage3 . ";" . $umfrage4;

        $filename1 = 'formTest.csv';
        if (!file_exists($filename1)) {
              $firstData = "vorname;name;umfrage1;umfrage2;umfrage3;umfrage4";
              $fp = fopen($filename1,"a"); 
              echo "1"; 
            if($fp){
                fwrite($fp,$firstData); 
                fclose($fp); 
              echo "2";
          }
        }

        $fp = fopen("formTest.csv","a");

        if($fp){
            fwrite($fp,$cvsData); 
            fclose($fp);
        }
        
        echo 'Vielen Dank!';

      }
    }

  ?>
  </form>
    <div>
        <footer>
            <p>&copy; Copyright  by Mirko Finke</p>
        </footer>
    </div>
  </div>
 
</body>
</html>
