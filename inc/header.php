<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll"><img src="/img/logo/logo.png" alt="logo de Caradvisor"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <!-- If in index, use the scroll, if not use the link -->
            <?php if($_GET['page'] == "index" || $_GET['page'] == ""): ?>
            <li>
                <a class="page-scroll js-scrollTo" href="#review">Déposez un avis</a>
            </li>
            <?php endif; ?>
            <?php if($_GET['page'] != "index" and $_GET['page'] != "" and $_GET['page'] != "pro_inscription" and $_GET['page'] != "pro_account" and $_GET['page'] != "pro_account_reviews" and $_GET['page'] != "pro_connection" and $_GET['page'] != "account" and $_GET['page'] != "account-cars"  and $_GET['page'] != "account-reviews"): ?>
                <li>
                    <a class="page-scroll js-scrollTo" href="/?page=index#review">Déposez un avis</a>
                </li>
            <?php endif; ?>
            <!-- Show inscription btn when on index, or empty url -->
            <?php if($_GET['page'] == "index" || $_GET['page'] == ""): ?>
            <li>
                <a class="page-scroll " href="/?page=inscription">Inscription</a>
            </li>
            <?php endif; ?>
            <?php if($_GET['page'] == "index" || $_GET['page'] == "inscription" || $_GET['page'] == ""): ?>
            <li>
                <a href="#"  data-toggle="modal" data-target="#login-modal">Connexion</a>
            </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "account-reviews" || $_GET['page'] == "account-cars"): ?>
                <li>
                    <a class="page-scroll" href="/?page=account">Votre profil</a>
                </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "account-cars" || $_GET['page'] == "account"): ?>
                <li>
                    <a class="page-scroll" href="/?page=account-reviews">Vos avis</a>
                </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "account" || $_GET['page'] == "account-reviews"): ?>
                <li>
                    <a class="page-scroll" href="/?page=account-cars">Vos véhicules</a>
                </li>
            <?php endif; ?>
            <?php if ($_GET['page'] != "pro_account" and $_GET['page'] != "pro_account_reviews"): ?>
            <li>
                <a href="#" class="page-scroll" data-toggle="modal" data-target="#login-modal-pro">Accès professionnels</a>
            </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "pro_account"): ?>
            <li>
                <a class="page-scroll" href="/?page=pro_account_reviews">Vos avis</a>
            </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "pro_account_reviews"): ?>
                <li>
                    <a class="page-scroll" href="/?page=pro_account">Votre profil</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php include "modalConnection.php"?>
<?php include "modalProConnection.php"?>
