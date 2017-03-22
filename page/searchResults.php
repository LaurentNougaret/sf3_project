<html>
<head>
    <title></title>
    <link href="../CSS/styleResults.css" rel='stylesheet'>
    <link href="../CSS/bootstrap.css" rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<!-- Comments before results -->
<div class="titlePageResults">
</div>
<div class="container">
    <div class="row">
        <!-- Left-box with filters options -->
        <div class="col-sm-3 col-md-3">
            <a href="#" class="btn btn-primary btn-block">Filtrer les résultats</a> <!--why link?-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Localization</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body"></div>
                <!-- list of options -->
                <ul>
                    <li>Par ville</li>
                    <li>Par code postale</li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Type de service</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body"></div>
                <!-- list of options -->
                <ul>
                    <li>Achats/Ventes</li>
                    <li>Entretien</li>
                    <li>Leasing</li>
                    <li>Tous</li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Marque</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body"></div>
                <!-- list of options -->
                <ul>
                    <li>Renault</li>
                    <li>Citroën</li>
                    <li>Peugeut</li>
                    <li>Audi</li>
                    <li>Mercedez</li>
                    <li>Volkswagen</li>
                    <li>Fiat</li>
                    <li>Tous</li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Type de service</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body"></div>
                <!-- list of options -->
                <ul>
                    <li>Révision</li>
                    <li>Freinage</li>
                    <li>Embrayage</li>
                    <li>Batterie</li>
                    <li>Roulement</li>
                    <li>Etc</li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Note globale</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body"></div>
                <!-- list of options -->
                <ul>
                    <li>1 étoile</li>
                    <li>2 étoiles</li>
                    <li>3 étoiles</li>
                    <li>4 étoiles</li>
                    <li>5 étoiles</li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Type de véhicule</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body"></div>
                <!-- list of options -->
                <ul>
                    <li>Voiture</li>
                    <li>Camion</li>
                    <li>Vans</li>
                    <li>Motorhome</li>
                    <li>Anciens</li>
                    <li>Etc</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Garage Creuzet Automobiles</h3>
                    <!-- <div class="pull-right">
                         <button type="button" class="close" aria-label="Close">
                           <span aria-hidden="true">×</span>
                         </button>
                     </div>-->
                </div>
                <div class="rate1">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                        <!-- If starts don't appear, we should show the grade in numbers from 1 to 5
                        <p>5/5</p>
                        -->
                    </div>
                    <div class="rateRecommendOrNot">
                        <h4>100% recommendé</h4>
                    </div>
                    <div class="rateXavis">
                        <h4>37 avis</h4>
                    </div>
                </div>
                    <div class="listOfResults">
                        <div class="eachResult">

                            <div class="description">
                                <h4>Garage Creuzet Automobiles</h4>
                                <address>
                                    33 rue Creuzet<br>
                                    69007 Lyon
                                </address>
                                Horaires:<br>
                                Du lundi au jeudi:<br>
                                8h à 12h | 14h à 19.<br>
                                le vendredi:<br>
                                8h à 12h | 14h à 18h.<br>
                                Le samedi: 9h30 à 14h.<br>
                            </div>
                            <div class="descriptionServices">
                                <h4>Services:</h4>
                                Véhicule de courtoisie, Facilités de paiement, Dépannage,...<br>
                                Autres services :<br>
                                Nettoyage interieur et exterieur de la voiture <br>
                            </div>

                            <div class="Map">
                                <img src="http://i1248.photobucket.com/albums/hh481/ondine3/map_zpscsjdz1ag.jpg" class="googleMap">
                            </div>
                        </div>
                    </div>
                        <div class="buttonVoirPLus">
                            <a href="#" class="btn btn-info btn-block">Voir plus d'information</a>
                        </div>
                </div>
            <!-- Second result-->
            </div>
        <div class="col-sm-9 col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Garage Creuzet Automobiles</h3>
                    <!-- <div class="pull-right">
                         <button type="button" class="close" aria-label="Close">
                           <span aria-hidden="true">×</span>
                         </button>
                     </div>-->
                </div>
                <div class="rate1">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                        <!-- If starts don't appear, we should show the grade in numbers from 1 to 5
                        <p>5/5</p>
                        -->
                    </div>
                    <div class="rateRecommendOrNot">
                        <h4>100% recommendé</h4>
                    </div>
                    <div class="rateXavis">
                        <h4>37 avis</h4>
                    </div>
                </div>
                <div class="listOfResults">
                    <div class="eachResult">

                        <div class="description">
                            <h4>Garage Creuzet Automobiles</h4>
                            <address>
                                33 rue Creuzet<br>
                                69007 Lyon
                            </address>
                            Horaires:<br>
                            Du lundi au jeudi:<br>
                            8h à 12h | 14h à 19.<br>
                            le vendredi:<br>
                            8h à 12h | 14h à 18h.<br>
                            Le samedi: 9h30 à 14h.<br>
                        </div>
                        <div class="descriptionServices">
                            <h4>Services:</h4>
                            Véhicule de courtoisie, Facilités de paiement, Dépannage,...<br>
                            Autres services :<br>
                            Nettoyage interieur et exterieur de la voiture <br>
                        </div>

                        <div class="Map">
                            <img src="http://i1248.photobucket.com/albums/hh481/ondine3/map_zpscsjdz1ag.jpg" class="googleMap">
                        </div>

                    </div>
                </div>
                <div class="buttonVoirPLus">
                    <a href="#" class="btn btn-info btn-block">Voir plus d'information</a>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</body>
</html>