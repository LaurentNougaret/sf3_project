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
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <!-- Local CSS -->
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/account.css">
    <link rel="stylesheet" href="CSS/account-cars.css">
    <link rel="stylesheet" href="CSS/account-reviews.css">
    <link rel="stylesheet" href="CSS/scrolling-nav.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/connexion.css">
    <link rel="stylesheet" href="CSS/inscription.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/info.css">
    <link rel="stylesheet" href="CSS/account.css">
    <link rel="stylesheet" href="CSS/pro.css">
    <!-- External CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.min.css'>
    <link rel="stylesheet" type="text/css" href='//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css'>
    <!-- Datepicker -->
    <link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="CSS/datepicker.css">
    <title>
        <?php
        switch ($page) {
            case 'index':
                echo 'Caradvisor : le site de comparaison des services de l\'automobile';
                break;
            case 'inscription':
                echo 'Caradvisor : inscrivez-vous';
                break;
            case 'search':
                echo 'Caradvisor : recherchez votre professionnel';
                break;
            case 'form_review_sale_new':
                echo 'Caradvisor : déposez votre avis Achat neuf';
                break;
            case 'form_review_sale_used':
                echo 'Caradvisor : déposez votre avis Achat occasion';
                break;
            case 'form_review_repair':
                echo 'Caradvisor : déposez votre avis Entretien Réparation';
                break;
            case 'contact':
                echo 'Caradvisor : contactez-nous';
                break;
            case 'account':
                echo 'Caradvisor : votre profil';
                break;
            case 'legal':
                echo 'Caradvisor : mentions légales';
                break;
            case 'cgu':
                echo 'Caradvisor : conditions générales d\'utilisation';
                break;
            case 'account-reviews':
                echo 'Caradvisor : vos avis';
                break;
            case 'account-cars':
                echo 'Caradvisor : vos véhicules';
                break;
            case 'info':
                echo 'Caradvisor : informations sur le professionnel';
                break;
            }
        ?>
    </title>
    <link rel="icon" type="image/png" href="../public/img/favicon.ico" />
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
    <!-- Latest compiled and minified JavaScript (Bootstrap & JQuery) -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <!-- External JS -->
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js'></script>
    <!-- Local JS -->
    <script type="text/javascript" src="js/rating.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/scrollTo.js"></script>
    <script type="text/javascript" src="js/banner.js"></script>
    <script type="text/javascript" src="js/back-to-top.js"></script>
    <script type="text/javascript" src="js/scrolling-nav.js"></script>
    <script type="text/javascript" src="js/js_modal.js"></script>
    <script type="text/javascript" src="js/js_modalpro.js"></script>
    <script type="text/javascript" src="js/cookieconsent.js"></script>
    <script type="text/javascript" src="js/closing_responsive_menu.js"></script>
    <!-- Datepicker -->

    <script type="text/javascript" src="js/datepicker.js"></script>
</body>
</html>
