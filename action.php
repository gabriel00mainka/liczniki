<?php
if(isset($_POST['select1']))
{
    $action1 = $_POST['select1'];
    switch ($action1) 
    {
        case 'wykres':
            header("Location: wykres.php");
            break;
        case 'dane':
            header("Location: dane.php");
            break;
        // case 'wybierz_opcje':
        //     echo "Wybierz opcję!";
        //     break;
        default:
            echo "Wróć do strony głównej i uzupełnij od nowa wszystkie opcje!</br>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang=\"pl-PL\">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
        <title>Błąd</title>
        <link rel="stylesheet" href="styl.css" type="text/css">
    </head>
        
    <body>
        <div class="center">
            <input type="button" style="width:200px; height:40px;" value="Powrót do strony głównej" onClick="location.href='index.html';">
            </br>
        </div>
    </body>
</html>