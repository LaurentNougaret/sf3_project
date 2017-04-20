<!-- Banner -->
<section id="banner" class="banner">
    <div class="container">
        <span class="background"></span>
    </div>
</section>
<!-- / Banner -->

<!-- Search -->
<section id="searchEngine">
    <div class="container">
        <h2 class="text-center">Trouvez votre professionnel de l'automobile</h2>
        <hr>
        <div id="SearchBar">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-2">
                    <form class="searchbar" action="search.php" method="GET">
                        <input type="text" class="form-control" name="query" placeholder="Chercher par professionnel" />
                    </form>
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-0 col-md-4">
                    <form class="searchbar" action="search.php" method="GET">
                        <input type="text" class="form-control" name="query" placeholder="Chercher par ville ou code postal"/>
                    </form>
                </div>
                <div class="col-xs-12 col-md-1"><a href="/?page=search"><button type="submit" class="btn btn-primary btn-search center-block">OK</button></a></div>
            </div>
        </div>
    </div>
</section>
<!-- / Search -->

<!-- Slider -->
<section id="slider">
    <div class="container">
        <div class='row'>
            <div class='col-md-offset-2 col-md-8'>
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner">
                        <?php foreach ($avis as $review): ?>
                            <!-- Quote 1 -->
                            <div class="item <?php if($review['id']==1): echo "active"; endif; ?>">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="img/photo_fondateur.png">
                                        </div>
                                        <div class="col-sm-9">
                                            <h3><?php echo $review['proname']?></h3>
                                            <p><?php echo $review['review']; ?></p>
                                            <small><?php echo $review['firstname'] . " " . $review['lastname'] . ", " . $review['city']; ?></small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Slider -->

<!-- Leave opinion -->
<section id="review" >
    <div class="container" >
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2><span>Déposer</span> vos Avis</h2>
                <hr>
            </div>
        </div>
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-4">
               <div class="block-center">
                     <a href="/?page=form_review_repair"><button type="button" class="btn btn-primary btn-lg btn-block center-block">ENTRETIEN / REPARATION</button></a>
               </div>
           </div>
            <div class="col-xs-12 col-md-4">
                <div class="block-center">
                    <a href="/?page=form_review_sale_new" ><button type="button" class="btn btn-primary btn-lg btn-block center-block">ACHAT NEUF</button></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 ">
                <div class="block-center">
                    <a href="/?page=form_review_sale_used"><button type="button" class="btn btn-primary btn-lg btn-block center-block">ACHAT OCCASION</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <p class="needconnect">Merci de vous inscrire <a href="/?page=inscription">ici</a> ou de vous connecter <a href="#" data-toggle="modal" data-target="#login-modal">ici</a> pour déposer un avis.</p>
            </div>
        </div>

    </div>
</section>
<!-- / Leave opinion -->

<!-- About -->
<section id="about">
    <div class="container">
        <div class="row ">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 bloktext">
                <div class="hauteurtitre">
                    <h2>À propos de <br>CarAdvisor</h2>
                    <img src="img/logo/logo.png" alt="logo de Caradvisor" id="logoabout">
                </div>
                <p class="text-justify">
                    <strong>CarAdvisor</strong> est le premier site automobile complètement indépendant qui vous permet de
                    donner un avis sur un professionnel du secteur (concessionnaire, garagiste indépendant, centre-auto,...).<br>
                    Basé sur un échange de témoignages et de notations vérifiés (certification AFNOR), <strong>CarAdvisor</strong> vous garantie
                    une totale transparence pour que vous puissiez choisir en toute simplicité qui s’occupera de votre véhicule.
                </p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1 bloktext">
                <div class="hauteurtitre text-right">
                    <h2>Le fondateur</h2>
                    <img src="img/photo_fondateur.png" alt="photo du fondateur" id="photofondateur">
                </div>
                <p class="text-justify">
                    Fort d’une expérience de plus de 20 ans dans le monde de l’automobile, <strong>Olivier Jacquet</strong> est un professionnel de l’animation
                    et de la gestion de réseau automobile. Sa volonté : faire en sorte que les bonnes adresses, tout comme les mauvaises, soient
                    connues grâce au partage des expériences de chacun afin d’améliorer la qualité de la relation client. En un mot changer la
                    vie de l’utilisateur automobile.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- / About -->

<!-- Values -->
<section id="values">
    <div class="container">
        <h2>Nos valeurs</h2>
        <hr>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                <h3>La confiance</h3>
                <img class="img-responsive" src="img/picto/trust.png" alt="image de confiance"/>
                <h4>... grâce à la transparence des avis</h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                <h3>La fiabilité</h3>
                <img class="img-responsive" src="img/picto/reliability.png" alt="image de fiabilité"/>
                <h4>... grâce à la vérification des avis</h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                <h3>La simplicité</h3>
                <img class="img-responsive" src="img/picto/simplicity.png" alt="image de simplicité"/>
                <h4>... déposez vos avis en un clic !</h4>
            </div>
        </div>
    </div>
</section>
<!-- /Values -->
