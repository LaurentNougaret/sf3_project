<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="/?page=index"><img src="/img/logo/logo.png" alt="logo de Caradvisor"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
            <li >
                <a class="page-scroll" href="#page-top"></a>
            </li>
            <?php if ($_GET['page'] == "index" || $_GET['page'] == "inscription" || $_GET['page'] == "account-reviews" || $_GET['page'] == "account-cars" || $_GET['page'] == "account"): ?>
            <!-- If in index, use the scroll, if not use the link -->
            <?php if($_GET['page'] == "index"): ?>
            <li>
                <a class="page-scroll js-scrollTo" href="#review">Déposer un avis</a>
            </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "index" || $_GET['page'] == "inscription"): ?>
            <li>
                <a class="page-scroll " href="/?page=form_signup">Inscription</a>
            </li>
            <?php endif; ?>
            <?php if ($_GET['page'] == "index" || $_GET['page'] == "inscription"): ?>
            <li>
                <a class="page-scroll " href="/?page=inscription">Inscription</a>
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
            <li>
                <a class="page-scroll" href="#">Professionnels</a>
            </li>
        </ul>
    </div>
</nav>
<?php include "modalConnection.php"?>
