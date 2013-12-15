<?php
echo "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN'
   'http://www.w3.org/TR/html4/strict.dtd'>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <title>CSV datei einlesen</title>
</head>
<body>";
        
$counter_zellen = 0;
$counter_zeilen = 0;
        
$fp = @fopen("formTest.csv","r");
if ($fp)
{
    echo "
    <table border='1'>";
    
        // 1. zeile ausgeben (spaltenkopf)
        $text = fgets($fp);
        $array = explode(";",$text);
        $counter_elemente = count($array)-1;
 
        echo "<tr>";
        while($counter_zellen < $counter_elemente)
        {
            echo "<td>".$array[$counter_zellen]."</td>";
            $counter_zellen++;
        }
        echo "</tr>";
        
    // restliche zeilen ausgeben (zeilen) => solange bis dateiende erreicht wurde
    while(!feof($fp))
    {
        $text = fgets($fp);
        $array = explode(";",$text);
        $counter_elemente = count($array);
        $counter_zellen = 1;
        echo "<tr>";
        // 1. zelle in der zeile
        echo "<td>".$array[0]."</td>";
        while($counter_zellen < $counter_elemente-1)
        {
            // restliche zellen in der zeile
            echo "<td>".$array[$counter_zellen]."</td>";
            $counter_zellen++;
            }
        echo "</tr>";
        // zeilenzähler erhöhen
        $counter_zeilen++;
    }
    // datei wieder schliessen (wichtig!!)
    fclose($fp);
    $counter_zellen = $counter_zellen - 1;
    echo "</table>";
}
else
{
    echo "daten-datei 'data.txt' nicht gefunden!";
}
echo "
</body>
</html>";
?>