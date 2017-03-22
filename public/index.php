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
    <!--liens Amor-->
    <link href="/public/CSS/scrolling-nav.css" rel="stylesheet">
    <!--/liens Amor-->
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
<div class="container-fluid">
    <!-- Call header -->
    <header>
        <?php include "../inc/header.php"; ?>
    </header>

    <!-- Call page content -->
    <main>
        <div class="container-fluid">
            <?php include "../page/$file"; ?>
        </div>
    </main>

    <!-- Call footer -->
    <footer>
        <?php include "../inc/footer.php"; ?>
    </footer>
</div>

<!-- Latest compiled and minified JvaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<!-- Ajoutez vos liens vers dossiers js ici -->
<script type="text/javascript" src="js/"></script>

    <!--liens Amor-->
    <!-- jQuery -->
    <script src="/public/js/jquery.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="/public/js/jquery.easing.min.js"></script>
    <script src="/public/js/scrolling-nav.js"></script>
    <!--/liens Amor-->

</body>
</html>