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

	    $dataPoints = array();
	//echo "$row['date']</br>";
	    for($i = 0; $i < $ile; $i++)
	    {
	    	$y = $row['measurement'];
	    	array_push($dataPoints, array("x" => $i, "y" => $y));
		$row = mysqli_fetch_assoc($rezultat);
	    }                
?>

<!DOCTYPE html>
<html lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Wykres</title>
<link rel="stylesheet" href="styl.css" type="text/css">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	zoomEnabled: true,
	title: {
		text: "Zużycie energii"
	},
	axisX:{
	title: "Numer pomiaru"
	},
	axisY:{
	title: "Zużycie [kWh]"	
	},
	data: [{
		type: "area",     
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
    
<body>

<input type="button" value="Zobacz tabelę" onClick="location.href='dane.php';"></br></br>
<input type="button" value="Powrót do strony głównej" onClick="location.href='index.html';"></br></br>

</br>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>
