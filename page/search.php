<!doctype html>
<html>
<head>
    <link href="../public/CSS/styleSearchBar.css" rel='stylesheet'>
    <title>Search Bar</title>
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <form class="searchbar" action="search.php" method="GET">
            <input type="text" class="form-control" name="query" placeholder="Chercher par professionnel" />
        </form>

        <form class="searchbar" action="search.php" method="GET">
            <input type="text" class="form-control" name="query" placeholder="Chercher par ville ou code postale" />
            <button type="submit" class="btn btn-default">OK</button>
        </form>
    </div>
</div>

</body>
</html>