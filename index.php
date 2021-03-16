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
    <div id="header" class="container pt-3 bg-dark text-white">
        <h1 class="hidetext" align="center">BURTU JŪKLIS</h1>
        <div id="startbut">
            <button type="button" class="btn btn-outline-dark btn-block text-light"><h3>Sākt spēli</h3></button>
        </div>
    </div>
    <div id="main" class="container pt-3 bg-secondary text-white">
        <form action="/Liepaja/game.php" method="get">
            <div class="form-group">
                <label for="name">Jūsu vārds:</label>
                <input type="text" name="name" class="form-control" placeholder="Vārds" id="name" required>
            </div>
            <button type="submit" class="btn btn-outline-secondary btn-block text-light"><h4>Turpināt</h4></button>

        </form>
    </div>

    <footer>
        <h3 id="teamname" style="color: #5f5f5f;">©Hacker Meni</h3>
    </footer>

    <script src="scripts/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


</html>