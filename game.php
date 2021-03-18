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
        $filenum = 0;
        $fp = fopen("places[".strval($filenum)."].txt", 'r');
        if ($fp) {
            $places = explode("\n", fread($fp, filesize("places[".strval($filenum)."].txt")));
        }
        fclose($fp);
        $table = fill();
        $table = insertwords($table, $places);



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
                        if (intval($col) != 0) {
                            echo "<td><b>$col</b></td>";
                        } else {
                            echo "<td>".$col."</td>";
                        }
                }
                echo "</tr>";
            }

        }
        echo "
        </tbody>
        </table>";
        function insertwords($table, $places) {
            $words = count($places);
            for($i=0; $i<$words; $i+=2) {
                list($c1, $r1, $c2, $r2) =  explode("-", $places[$i+1]);
                $c1 = ord($c1)-64;
                $c2 = ord($c2)-64;
                if($c1 - $c2 > 0) {
                    $table = insertword($table, $places[$i], $c1, $r1, 0);
                } else if ($c1 - $c2 < 0) {
                    $table = insertword($table, $places[$i], $c1, $r1, 2);
                } else {
                    if($r1 - $r2 > 0) {
                        $table = insertword($table, $places[$i], $c1, $r1, 1);
                    } else {
                        $table = insertword($table, $places[$i], $c1, $r1, 3);
                    }
                }

            }
            return $table;
        }

        function insertword($table, $place, $c1, $r1, $way){
            $place = strtoupper($place);
            $insert = explode(" ", $place);
            $wlen = count($insert);
            switch($way) {
                case 0:
                    for($i = 0; $i<$wlen; $i++) {
                       $table[$r1][$c1-$i] = $insert[$i];
                    }
                    break;
                case 1:
                    for($i = 0; $i<$wlen; $i++) {
                        $table[$r1-$i][$c1] = $insert[$i];

                    }
                    break;
                case 2:
                    for($i = 0; $i<$wlen; $i++) {
                        $table[$r1][$c1 + $i] = $insert[$i];
                    }
                    break;
                case 3:
                    for($i = 0; $i<$wlen; $i++) {
                        $table[$r1+$i][$c1] = $insert[$i];
                    }
                    break;

            }
            return $table;
        }


        function fill() {
            $table = array(array());
            for ($i=0; $i<=19; $i++) {
                $table[0][] = $i+65;
            }
            for ($i=1; $i<=38; $i++) {
                for ($j=0; $j<=20; $j++) {
                    if ($j==0) {
                        $table[$i][$j] = strval($i);
                    } else {
                        $table[$i][$j] = chr(rand(65, 90));
                    }

                }
            }
            return $table;
        }


    ?>
</div>
<div class="fixed">
    <form id="checkform" method="post">
        <div class="form-group">
            <label for="Pos1">Vārda sākuma burts:</label>
            <input type="text" name="Pos1" class="form-control" placeholder="A1..." id="Pos1" required>
            <br>
            <label for="Pos2">Vārda beigas burts:</label>
            <input type="text" name="Pos2" class="form-control" placeholder="A2..." id="Pos2" required>
            <input type="hidden" name="fileId" value="<?php echo $filenum; ?>">
        </div>
        <button type="submit" class="btn btn btn-outline-secondary btn-block" name="checkBtn" id="checkBtn"><h4>Pārbaudīt</h4></button>

    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
       $('#checkform').submit(function (e) {
          e.preventDefault();
          $.ajax({
              type: "POST",
              url: 'check.php',
              data: $(this).serialize(),
              success: function (response)
              {
                  if (jsonData.success == "1")
                  {
                      alert('Success!');
                  }
                  else
                  {
                      alert('Invalid word!');
                  }
              }
          });
       });
    });
</script>

<script src="scripts/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


</html>