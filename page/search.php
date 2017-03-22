<!doctype html>
<html>
<head>
    <link href="../public/CSS/styleSearchBar.css" rel='stylesheet'>
    <link href="../public/CSS/bootstrap.css" rel='stylesheet'>
    <title>Barre de Recherche</title>
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <form class="searchbar" action="search.php" method="GET">
            <input type="text" class="form-control" name="query" placeholder="Chercher par professionnel " />
        </form>

        <form class="searchbar" action="search.php" method="GET">
            <input type="text" class="form-control" name="query" placeholder="Chercher par ville ou code postale" />
            <button type="submit" class="btn btn-default">OK</button>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>
</html>