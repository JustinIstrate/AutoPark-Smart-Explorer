<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Smart Explorer</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        crossorigin="anonymous">
</head>

<body
    style="background-image: url('../homePage/background.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center top;">
    <!-- asa incluzi componente -->
    <?php include '../common/navBar.php'; ?>
    <div class="container text-center">
        <h1>AutoPark Smart Explorer</h1>
        <p>Recurgand la un API REST/GraphQL propriu, sa se realizeze un instrument Web de vizualizare adecvata si de
            comparare multi-criteriala a datelor publice privind parcul auto din Romania pentru ultimii 10 ani.
            Statisticile, plus vizualizarile generate – minim 3 maniere, plus cele cartografice pe baza unor servicii
            Web specializate – vor putea fi exportate in formatele CSV, WebP si SVG.<a href="../about/about.php">Apasa
                aici</a> pentru a vedea documentatia acestui proiect.</p>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>

</html>