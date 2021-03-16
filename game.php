<!doctype html>
<html lang="lv">
<head>
    <meta charset="utf-8">
    <title>Hacker Meni</title>
    <meta name="description" content="Liepājas atklātas programmēšanas olimpiādes uzdevums">
    <meta name="author" content="Hacker Meni">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/index.css">
    <script src="scripts/jquery-3.6.0.js"></script>
</head>

<body background="src/bkg.jpg">
<div id="header" class="container pt-3 bg-dark text-white ">
    <h1 class="hidetext" align="center">BURTU JŪKLIS</h1>
    Welcome <?php echo $_GET["name"]; ?><br>
    <?php
        $filenum = rand(0, 4);

        $fp = fopen("places[".strval($filenum)."].txt", 'r');
        if ($fp) {
            $places = explode("\n", fread($fp, filesize("places[".strval($filenum)."].txt")));
        }
        fclose($fp);
        $places = str_replace(" ", "-", $places);
        $table = fill();
        echo "
        <table class=\"table table-bordered table-dark\" style='width: 50%; margin-bottom: 10px; text-align: center;' align='center'>
        <thead>
        <tr>
         <th>#</th>
        ";

        foreach ($table[0] as $value) {
            echo "<th>".chr($value)."</th>";
        }
        echo "</tr>
        </thead>
        <tbody>";
    foreach ($table as $row) {
        if ($row[0] != 65) { // if $row != A
            echo "<tr>";
            foreach($row as $col) {
                if ($col < 65) {
                    echo "<td><b>$col</b></td>";
                } else {
                    echo "<td>".chr($col)."</td>";
                }

            }
            echo "</tr>";
        }

    }
    echo "
    </tbody>
    </table>";






        switch ($filenum) {
            case 0:

                break;

            case 1:

                break;
            case 2:

                break;
            case 3:

                break;
            case 4:

                break;
        }

        //print_r($places);

        function fill() {
            $table = array(array());
            for ($i=0; $i<=19; $i++) {
                $table[0][] = $i+65;
            }
            for ($i=1; $i<=38; $i++) {
                for ($j=0; $j<=20; $j++) {
                    if ($j==0) {
                        $table[$i][$j] = $i;
                    } else {
                        $table[$i][$j] = rand(65, 90);
                    }

                }
            }
            return $table;
        }


    ?>
</div>

<script src="scripts/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


</html>