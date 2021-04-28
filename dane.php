<?php
            ini_set("display_errors", 0);
            require_once "dbconnect.php";
	    $polaczenie = mysqli_connect($host, $user, $password);
            mysqli_query($polaczenie, "SET CHARSET utf8");
            mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            mysqli_select_db($polaczenie, $database);

	    $zapytanie = "SELECT * FROM baza";
	    $rezultat = mysqli_query($polaczenie, $zapytanie);
	    $ile = mysqli_num_rows($rezultat);

	  //  $dataPoints = array();

	  //  for($i = 0; $i < $ile; $i++)
	  //  {
	  //  	$y = $row['measurement'];
	 //   	array_push($dataPoints, array("x" => $i, "y" => $y));
	//	$row = mysqli_fetch_assoc($rezultat);
	   // }                
?>

<!DOCTYPE html>
<html lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Wyswietlanie w tabeli</title>
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
    
<body>
<input type="button" value="Zczytaj aktualny stan licznika" onClick="window.location.reload()"></br></br>
<input type="button" value="Zobacz wykres" onClick="location.href='wykres.php';"></br></br>
<input type="button" value="Powrót do strony głównej" onClick="location.href='index.html';"></br></br>
<div>    
<table width="1000" align="center" border="1" bordercolor="#8a8a8a"  cellpadding="0" cellspacing="0">
        <tr>
        <?php
            //ini_set("display_errors", 0);
            //require_once "dbconnect.php";
	    //$polaczenie = mysqli_connect($host, $user, $password);
           // mysqli_query($polaczenie, "SET CHARSET utf8");
            //mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            //mysqli_select_db($polaczenie, $database);
            
            $zapytanie1 = "SELECT * FROM baza ORDER BY date DESC LIMIT 20";
	    $zapytanie2 = "SELECT * FROM baza";

            $rezultat = mysqli_query($polaczenie, $zapytanie1);
	    $rezultat2 = mysqli_query($polaczenie, $zapytanie2);

            $ile = mysqli_num_rows($rezultat);
	    $ile2 = mysqli_num_rows($rezultat2);

                    echo "Wykonano ".$ile2." pomiarów.</br>";
		    echo "Najnowszych ".$ile." pomiarów:";
                if ($ile>=1) 
                {
                    echo<<<END
                    <td width="20" align="center" bgcolor="#ffffff">data pomiaru</td>
                    <td width="50" align="center" bgcolor="#ffffff">stan licznika [kWh]</td>
                    </tr><tr>
                    END;
                }

                for ($i = 1; $i <= $ile; $i++) 
                {
                
                $row = mysqli_fetch_assoc($rezultat);
                $a1 = $row['date'];
                $a2 = $row['measurement'];
		
                echo<<<END
                <td width="20" align="center" bgcolor="#ffffff">$a1</td>
                <td width="50" align="center" bgcolor="#ffffff">$a2</td>
                </tr><tr>
                END;        
                }
            echo"</br>";



        ?>
</tr>
</table>
</div>
</br>


</body>
</html>


