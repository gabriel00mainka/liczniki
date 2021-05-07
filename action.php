<?php
if(isset($_POST['select1']))
{
    $action1 = $_POST['select1'];
    switch ($action1) 
    {
        case 'wykres':
            session_start();
            $_SESSION['date_start'] = $_POST['date_start'];
            $_SESSION['date_stop'] = $_POST['date_stop'];
            $_SESSION['time_start'] = $_POST['time_start'];
            $_SESSION['time_stop'] = $_POST['time_stop'];
            header("Location: wykres.php");
            exit();
            break;
        case 'tabela':
            session_start();
            $_SESSION['date_start'] = $_POST['date_start'];
            $_SESSION['date_stop'] = $_POST['date_stop'];
            $_SESSION['time_start'] = $_POST['time_start'];
            $_SESSION['time_stop'] = $_POST['time_stop'];
            header("Location: dane.php");
            exit();
            break;
        // case 'wybierz_opcje':
        //     echo "Wybierz opcję!";
        //     break;
        default:
            echo "Wróć do strony głównej i uzupełnij od nowa wszystkie opcje!</br>";
            // $date_start = $_POST['date_start'];
            // echo "czas od $date_start";
            break;
    }
}

        exec('cd /var/www/html/liczniki');
        $a = exec('python3 1.py');
        echo $a;

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
            
            <!-- <form action="dane.php" method="post">
            <input type=submit value="Tak! To moje imie">
            <input type="hidden" name="date_start" value="<?php echo $date_start;?>" />
        </form> -->
        </br>
        </div>
    </body>
</html>