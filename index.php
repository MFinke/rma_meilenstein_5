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
      .radio-left1 {
      	width:120px;
      	margin: 15px auto;
      	text-align:left;
      }
      .radio-left2 {
      	width:530px;
      	margin: 15px auto;
      	text-align:left;
      }
      .radio-left3 {
      	width:150px;
      	margin: 15px auto;
      	text-align:left;
      }
      .radio-left4 {
      	width:90px;
      	margin: 15px auto;
      	text-align:left;
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
    <br>
    <p>
    <h3>Wer ist der Erfinder von Linux?</h3>
    <img src="scr/linus.png" width="30%" height="30%"><br>

    <div class="radio-left1">
      <input type="radio" name="kategorie1" value="11" />Steve Jobs<br>
      <input type="radio" name="kategorie1" value="12" />Bill Gates<br>
      <input type="radio" name="kategorie1" value="13" />Linus Torvalds
     </div>
    <p>
    
      <h3>Was bedeuted der Konsolenbefehl "chmod 644" unter Linux-Systemen?</h3>
      <img src="scr/pinguin.gif" width="15%" height="15%"><br>
      <div class="radio-left2">
      <input type="radio" name="kategorie2" value="21">Der Eigentümer darf lesen, schreiben und ausführen, alle anderen nur lesen.<br>
      <input type="radio" name="kategorie2" value="22">Der Eigentümer darf lesen und schreiben, alle anderen nur lesen.<br>
      <input type="radio" name="kategorie2" value="23">Eigentümer und Gruppe dürfen lesen und schreiben, der Rest nichts. 
      </div>
    <p>

      <h3>Was ist Ubuntu?</h3>
      <div>
      <img src="scr/ubuntu.png" width="15%" height="15%">
      </div>
      <div class="radio-left3">
      <input type="radio" name="kategorie3" value="31">Linux-Distrbution <br>
      <input type="radio" name="kategorie3" value="32">Ein Handy <br>
      <input type="radio" name="kategorie3" value="33">Ein Unix-System
      </div>
    </p>

      <h3>Welche Distribution ist eine Rolling-Release?</h3>
      <img src="scr/archlinux.png" width="15%" height="15%"><br>
       <div class="radio-left4">
      <input type="radio" name="kategorie4" value="41">Fedora<br>
      <input type="radio" name="kategorie4" value="42">Manjaro <br>
      <input type="radio" name="kategorie4" value="43">Kali<p></p>
      </div>
      ';
      


    if(!isset($_POST['hidden'])){
        echo $htmlDoc;
        echo '<input type="submit" name="Submit" value="Submit">';
        echo '<input type="reset" name="Reset" value="Reset">';
    }else{
      $vorname = $_POST['vorname'];
      $name = $_POST['name'];
      
        @$umfrage1 = $_POST['kategorie1'];
        @$umfrage2 = $_POST['kategorie2'];
        @$umfrage3 = $_POST['kategorie3'];
        @$umfrage4 = $_POST['kategorie4'];
      
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

        $filename1 = 'daten.csv';
        if (!file_exists($filename1)) {
              $firstData = "vorname;name;Frage 1;Frage 2;Frage 3;Frage 4";
              $fp = fopen($filename1,"a"); 
              //echo "1"; 
            if($fp){
                fwrite($fp,$firstData); 
                fclose($fp); 
              //echo "2";
          }
        }

        $fp = fopen("daten.csv","a");

        if($fp){
            fwrite($fp,$cvsData); 
            fclose($fp);
        }
        echo '<div><img src="scr/voting.jpg" width="12%" height="12%"></div>';

        echo '<p>Vielen Dank!';

        echo '<p><a href="auswertung.php">Hier geht es zur Auswertung</a><br>';
      }
    }

  ?>
  
  </form>
    <div>
    <!--
        <footer>
            <p>&copy; Copyright  by Mirko Finke</p> 
        </footer>
     -->
     <p>

    </div>
  </div>
  
</body>
</html>
