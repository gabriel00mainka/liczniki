<!DOCTYPE html>
<html lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Wyswietlanie z bazy</title>
</head>
    
<body>
<input type="button" value="Refresh Page" onClick="window.location.reload()"></br></br>
<input type="button" value="Powrót" onClick="location.href='index.html';"></br></br>
<div>    
<table width="1000" align="center" border="1" bordercolor="#d5d5d5"  cellpadding="0" cellspacing="0">
        <tr>
        <?php
            ini_set("display_errors", 0);
            require_once "dbconnect.php";
	    $polaczenie = mysqli_connect($host, $user, $password);
            mysqli_query($polaczenie, "SET CHARSET utf8");
            mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            mysqli_select_db($polaczenie, $database);
            
            $zapytanietxt = "SELECT * FROM baza";
            $rezultat1 = mysqli_query($polaczenie, $zapytanietxt);
            $ile1 = mysqli_num_rows($rezultat1);

                    echo "wykonano ".$ile1." pomiarów";
                if ($ile1>=1) 
                {
                    echo<<<END
                    <td width="20" align="center" bgcolor="e5e5e5">date</td>
                    <td width="100" align="center" bgcolor="e5e5e5">measurement</td>
                    </tr><tr>
                    END;
                }

                for ($i = 1; $i <= $ile1; $i++) 
                {
                
                $row = mysqli_fetch_assoc($rezultat1);
                $a1 = $row['date'];
                $a2 = $row['measurement'];
                        
                
                echo<<<END
                <td width="20" align="center">$a1</td>
                <td width="100" align="center">$a2</td>
                </tr><tr>
                END;        
                }
            echo"</br>";
        ?>
        
</tr>
</table>
</div>

</body>
</html>


