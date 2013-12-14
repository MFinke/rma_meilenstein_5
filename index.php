<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">


  <title>HTML</title>
  <meta name="description" content="">
  <meta name="author" content="Mirko Finke">


  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
    <header>
      <h1>HTML</h1>
    </header>
    
    <p>

    <div id="user">
    Vorname: <input type="text" name="Betreff" size="30">
    Name: <input type="text" name="Betreff" size="30">
    </div>
    <p><br>
    <form action="input_radio.htm">
      <h3>Wer war der Erfinder von Linux?</h3>
      <img src="scr/linus.png" width="30%" height="30%"><br>
      <input type="radio" name="kategorie" value="tools">Steve Jobs<br>
      <input type="radio" name="kategorie" value="tools">Bill Gates<br>
      <input type="radio" name="kategorie" value="tools">Linus Toarvards<---
    </p>
    </form>


    <h3>Was bedeuted der Konsolenbefehl "chmod 644" unter Linux-Systemen?</h3>
    <img src="scr/pinguin.gif" width="15%" height="15%"><br>
    <form action="input_radio.htm">
      <input type="radio" name="kategorie" value="tools">Der Eigentümer darf lesen, schreiben und ausführen, alle anderen nur lesen.<br>
      <input type="radio" name="kategorie" value="tools">Der Eigentümer darf lesen und schreiben, alle anderen nur lesen.<---<br>
      <input type="radio" name="kategorie" value="tools">Eigentümer und Gruppe dürfen lesen und schreiben, der Rest nichts. 
    </p>
    </form>
    
    <h3>Was ist Ubuntu?</h3>
    <img src="scr/ubuntu.png" width="15%" height="15%"><br>
    <form action="input_radio.htm">
      <input type="radio" name="kategorie" value="tools">Linux-Distrbution<--- <br>
      <input type="radio" name="kategorie" value="tools">Ein Handy <br>
      <input type="radio" name="kategorie" value="tools">Ein Unix-System
    </p>
    </form>

    <h3>Welche Distribution ist eine Roling-Release?</h3>
    <img src="scr/archlinux.png" width="15%" height="15%"><br>
    <form action="input_radio.htm">
      <input type="radio" name="kategorie" value="tools">Fedora<br>
      <input type="radio" name="kategorie" value="tools">Manjaro<---<br>
      <input type="radio" name="kategorie" value="tools">Kali
    </p>
    </form>
    <input type="submit" name="Submit" value="Submit">
    <input type="reset" name="Reset" value="Reset">



    <div>
    <footer>
     <p>&copy; Copyright  by Mirko Finke</p>
     <input type="hidden" name="ver" value="2">
     
     <?php
      if(isset($_POST["ver"])) {
        echo "sind nciht leer";
      }else{
        echo "sind leer";
      } 
     ?>

    </footer>
  </div>
</body>
</html>
