<?php

require "../config/Config.php";
require "../src/BddManager.php";
require "../src/ReviewManager.php";

$bdd = new \caradvisor\BddManager();
$reviewManager = new \caradvisor\ReviewManager($bdd);
$avis = $reviewManager->listReview();

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
    <link href="CSS/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/form.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>
        <?php
        switch ($page) {
            case 'index':
                echo 'Caradvisor : le site de comparaison des services de l\'automobile';
                break;
            case 'search':
                echo 'Caradvisor : rechercher votre professionnel';
                break;
            case 'form_review_sale_new':
                echo 'Caradvisor : déposez votre avis';
                break;
            case 'form_review_sale_used':
                echo 'Caradvisor : déposez votre avis';
                break;
            case 'form_review_repair':
                echo 'Caradvisor : déposez votre avis';
                break;
            case 'account':
                echo 'Caradvisor : votre profil';
                break;
            case 'legal':
                echo 'Caradvisor : mentions légales';
                break;
            case 'legal2':
                echo 'Caradvisor : conditions générales d\'\utilisation';
                break;
            case 'contact':
                echo 'Caradvisor : contactez-nous';
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
        <main>
            <?php include"../page/$file"; ?>
        </main>
    <!-- Call footer -->
    <footer>
        <?php include"../inc/footer.php"; ?>
    </footer>
    <a href="#banner" class="back-to-top">
        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
    </a>
    <!-- Latest compiled and minified JvaScript -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/scrollTo.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/back-to-top.js"></script>
    <script type="text/javascript" src="js/scrolling-nav.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>
</html>
