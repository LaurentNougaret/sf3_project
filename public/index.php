<?php

$page = (isset($_GET['page']) ? $_GET['page'] : "index");
$file = $page . ".php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css">

    
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <!-- Call page titles -->
    <title>
        <?php
        switch ($page) {
            case 'index';
                echo 'Caradvisor : le site de comparaison des services de l\'automobile';
                break;
            case 'search';
                echo 'Caradvisor : recherchez votre professionnel';
                break;
            case 'account';
                echo 'Caradvisor : vôtre compte';
                break;
            case 'contact';
                echo 'Caradvisor : contactez-nous';
                break;
            case 'opinion';
                echo 'Caradvisor : déposez votre avis';
                break;
        }
        ?>
    </title>
</head>
<body>
  
    <!-- Call header -->
    <header>
        <?php include"../inc/header.php"; ?>
    </header>

    <!-- Call page content -->
    <div class="bloc container-fluid ">
        <main>
            <?php include"../page/$file"; ?>
        </main>
    </div>

    <!-- Call footer -->
    <footer>
        <?php include"../inc/footer.php"; ?>
    </footer>


    <!-- Latest compiled and minified JvaScript -->

    <!-- Ajoutez vos liens vers dossiers js ici -->



    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/scrolling-nav.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>
</html>
