<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">


  <title>AUSWERTUNG</title>
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
<div class="aussen-box">
<body>
  

  <table border="0">
  <colgroup>
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">

  <?php

$countt=0;

$gesamt=0;

$frage11=0;
$frage12=0;
$frage13=0;
$frage21=0;
$frage22=0;
$frage23=0;
$frage31=0;
$frage32=0;
$frage33=0;
$frage41=0;
$frage42=0;
$frage43=0;

$array = file('daten.csv');

//Arrays werden zeilenweise abgearbeitet

  foreach($array as $row)
  {
    //$fields[5] = str_replace('/n',"",$fields[5]);
    //echo $fields[5]. "<p>";
    //teilt die Reihe in spalten auf! trenner = Semikolon (;)
    $fields=explode(';',$row); 

  //Anführungszeichen entfernen
    //$fields[0] = str_replace('','',$fields[0]);
    //$fields[1] = str_replace('','',$fields[1]);
    //$fields[2] = str_replace('','',$fields[2]);
    //$fields[3] = str_replace('','',$fields[3]);
    //$fields[4] = str_replace('','',$fields[4]);
    $fields[5] = str_replace("\n","",$fields[5]);
    

    if($countt==0){
      //echo $fields[5];
      $countt++;
    }else{
      switch ($fields[2]) {
        case '11':
          $frage11++;
          break;
        case '12':
          $frage12++;
          break;
        case '13':
          $frage13++;
          break;
        }
      switch ($fields[3]) {
        case '21':
          $frage21++;
          break;
        case '22':
          $frage22++;
          break;
        case '23':
          $frage23++;
          break;
        }
        switch ($fields[4]) {
        case '31':
          $frage31++;
          break;
        case '32':
          $frage32++;
          break;
        case '33':
          $frage33++;
          break;
        }
        switch ($fields[5]) {
        case '41':
          $frage41++;
          break;
        case '42':
          $frage42++;
          break;
        case '43':
          $frage43++;
          break;
        }
        //echo ($fields[1]) . "<----1----<p>";
        //echo ($fields[2]) . "<----2----<p>";
        //echo ($fields[3]) . "<----3----<p>";
        //echo ($fields[4]) . "<----4----<p>";
        //echo ($fields[5]) . "<----5----<p>";
        //echo bin2hex($fields[5]);
    }
}
$gesamt=($frage11+$frage12+$frage13+$frage21+$frage22+$frage23+$frage31+$frage32+$frage33+$frage41+$frage42+$frage43);
//echo $fields[5]. "<p>";
//echo $frage42. "<p>";
//echo $frage43. "<p>";
echo '<table border="1" bordercolor="#ffffff" style="background-color:#C0C0C0" width="100%" cellpadding="1" cellspacing="3">
  <tr>
    <td></td>
    <td>Antwort 1-1</td>
    <td>Antwort 1-2</td>
    <td>Antwort 1-3</td>
    <td>Insgesamt</td>
  </tr>
  <tr>
    <td>Frage 1</td>
    <td>' . $frage11 . " (" . round(100*$frage11/$gesamt) . "%)" . '</td>
    <td>' . $frage12 . " (" . round(100*$frage12/$gesamt) . "%)" . '</td>
    <td>' . $frage13 . " (" . round(100*$frage13/$gesamt) . "%)" . '</td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td>Antwort 2-1</td>
    <td>Antwort 2-2</td>
    <td>Antwort 2-3</td>
    <td></td>
  </tr>
  <tr>
    <td>Frage 2</td>
    <td>' . $frage21 . " (" . round(100*$frage21/$gesamt) . "%)" . '</td>
    <td>' . $frage22 . " (" . round(100*$frage22/$gesamt) . "%)" . '</td>
    <td>' . $frage23 . " (" . round(100*$frage23/$gesamt) . "%)" . '</td>
    <td></td>
  </tr>
   <tr>
    <td></td>
    <td>Antwort 3-1</td>
    <td>Antwort 3-2</td>
    <td>Antwort 3-3</td>
    <td></td>
  </tr>
  <tr>
    <td>Frage 3</td>
    <td>' . $frage31 . " (" . round(100*$frage31/$gesamt) . "%)" . '</td>
    <td>' . $frage32 . " (" . round(100*$frage32/$gesamt) . "%)" . '</td>
    <td>' . $frage33 . " (" . round(100*$frage33/$gesamt) . "%)" . '</td>
    <td></td>
  </tr>
 <tr>
    <td></td>
    <td>Antwort 4-1</td>
    <td>Antwort 4-2</td>
    <td>Antwort 4-3</td>
    <td></td>
  </tr>
  <tr>
    <td>Frage 4</td>
    <td>' . $frage41 . " (" . round(100*$frage41/$gesamt) . "%)" . '</td>
    <td>' . $frage42 . " (" . round(100*$frage42/$gesamt) . "%)" . '</td>
    <td>' . $frage43 . " (" . round(100*$frage43/$gesamt) . "%)" . '</td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>' . (($gesamt)/4) . ' (100%)
    </td>
  </tr>
</table>

';
//________________________________FPDF_________________________________________
/** 
    * Festlegen des Verzeichnisses, wo die 
    */ 
    define('FPDF_FONTPATH', 'font/'); 
    /** 
    * Laden der FPDF Class 
    */ 
    include('fpdf17/fpdf.php'); 
    /** 
    * Neues Objekt erstellen 
    */ 
    $pdf = new FPDF(); 
    /** 
    * Beginnen mit den erstellen von PDF Dokument. 
    */ 
    $pdf->Open(); 
    /** 
    * Eine Seite in PDF Dokument hinzufügen. 
    */ 
    $pdf->AddPage(); 
    /** 
    * Das Logo einbinden, das Logo muss die Maße 
    */ 
    //$pdf->Image('logo.jpg', '130', '30', '0', '0'); 
    //$pdf->Ln(18); 
    /** 
    * Überschrift mit der Schriftart "Arial" 
    */ 
    $pdf->SetFont('Arial', 'B', 18); 
    $pdf->Write(4, "Umfrageergebnis"); 
    $pdf->Ln(10); 
    $pdf->SetFont('Arial', '', 12); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Cell(30,5,"Antwort 1-1",1); 
    $pdf->Cell(30,5,"Antwort 1-2",1); 
    $pdf->Cell(30,5,"Antwort 1-3",1); 
    $pdf->Cell(30,5,"Insgesamt",1); 
    $pdf->Ln(); 
    $pdf->Cell(30,5,"Frage 1",1); 
    $pdf->Cell(30,5,$frage11 . " (" . round(100*$frage11/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage12 . " (" . round(100*$frage12/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage13 . " (" . round(100*$frage13/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Ln(); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Cell(30,5,"Antwort 2-1",1); 
    $pdf->Cell(30,5,"Antwort 2-2",1); 
    $pdf->Cell(30,5,"Antwort 2-3",1); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Ln(); 
    $pdf->Cell(30,5,"Frage 2",1); 
    $pdf->Cell(30,5,$frage21 . " (" . round(100*$frage21/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage22 . " (" . round(100*$frage22/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage23 . " (" . round(100*$frage23/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Ln(); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Cell(30,5,"Antwort 3-1",1); 
    $pdf->Cell(30,5,"Antwort 3-2",1); 
    $pdf->Cell(30,5,"Antwort 3-3",1); 
    $pdf->Cell(30,5,"",1); 
     $pdf->Ln(); 
    $pdf->Cell(30,5,"Frage 3",1); 
    $pdf->Cell(30,5,$frage31 . " (" . round(100*$frage31/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage32 . " (" . round(100*$frage32/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage33 . " (" . round(100*$frage33/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,"",1); 
     $pdf->Ln(); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Cell(30,5,"Antwort 4-1",1); 
    $pdf->Cell(30,5,"Antwort 4-2",1); 
    $pdf->Cell(30,5,"Antwort 4-3",1); 
    $pdf->Cell(30,5,"",1); 
    $pdf->Ln(); 
    $pdf->Cell(30,5,"Frage 4",1); 
    $pdf->Cell(30,5,$frage41 . " (" . round(100*$frage41/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage42 . " (" . round(100*$frage42/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,$frage43 . " (" . round(100*$frage43/$gesamt) . "%)",1); 
    $pdf->Cell(30,5,(($gesamt)/4)." (100%)",1); 
    /** 
    * Das PDF Dokument ausgeben. 
    */ 
    $pdf->Output("ergebnis.pdf"); 
    ?> 
    </form>
    <br>
    <a href="ergebnis.pdf">DOWNLOAD</a><br>
      <div>
        <!--
          <footer>
             <p>&copy; Copyright  by Mirko Finke</p> 
          </footer>
        -->
        <p></p>
    </div>

  </div>
</div>
</body>
</html>
