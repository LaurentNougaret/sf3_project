<div class="container reviewform">
    <div class="row">
        <div class="col-xs-12 col-sm-8 title text-center">
            <h1>Achat d'un véhicule neuf - Ajouter un avis</h1>
            <br>
            <p>Merci de remplir le formulaire afin de déposer un avis sur l'achat de votre véhicule. En déposant celui-ci et grâce à l'aide de <strong>CarAdvisor</strong>, vous contribuez grandement à l'amélioration du monde automobile et de ses acteurs. </p>
        </div>
        <div class=" col-sm-3 col-sm-offset-1">
            <div class="block-center">
                <a href="/?page=form_review_sale_used"><button type="button" class="btn btn-primary btn-lg btn-block center-block">ACHAT OCCASION</button></a>
            </div>
            <div class="block-center">
                <a href="/?page=form_review_repair"><button type="button" class="btn btn-primary btn-lg btn-block center-block">ENTRETIEN / REPARATION</button></a>
            </div>
        </div>
    </div>
    <!-- Form Name - Add Review -->
    <form action="" method="post" role="form" class="form-horizontal formReviewRepair">
        <fieldset>
            <div class="bloc">
                <h2 class="text-center">Informations sur l'entreprise</h2>
                <hr>
                <div class="form-group">
                    <label for="select" class="col-sm-3 control-label">Type de prestataire</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="select" id="select">
                            <option value="1">Concessionnaire</option>
                            <option value="2">Garagiste</option>
                            <option value="3">Agent</option>
                            <option value="3">Carrosserie</option>
                            <option value="3">Autre</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nom</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="name" id="name" placeholder="Nom de la société" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ville</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="city" id="city" placeholder="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Code Postal</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="postal" id="postal" placeholder="" type="text">
                    </div>
                </div>
            </div>
            <div class="bloc">
                <h2 class="text-center">Votre Expérience</h2>
                <hr>
                <div class="form-group">
                    <label for="select" class="col-sm-3 control-label">Mon véhicule</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="car" id="car">
                            <option value="Mon vehicule 1">Mon véhicule 1</option>
                            <option value="Mon véhicule 2">Mon véhicule 2</option>
                            <option value="Ajouter un nouveau véhicule">Ajouter un nouveau véhicule</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Note globale</label>
                    <div class="col-sm-7 example-01">
                        <input name="rating" id="rating" value="3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Titre</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="title" id="title" placeholder="Titre de mon avis" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Message</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="reviewBox" name="reviewBox" rows="7" placeholder="Décrivez votre experience..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-12 col-sm-3 control-label">Date de l'achat</label>
                    <div class="col-xs-3 col-sm-1">
                        <select name="appointment" id="appointment">
                            <option value="default" selected>Jour</option>
                            <?php
                            for ($menuday = 1; $menuday <= 31; $menuday++) {
                                ?>
                                <option value="<?php echo $menuday; ?>">
                                    <?php echo $menuday; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-3 col-sm-1">
                        <select name="MonthOfAppointment">
                            <option value="default" selected>Mois</option>
                            <?php
                            for ($menuday = 1; $menuday <= 12; $menuday++) { ?>
                                <option value="<?php echo $menuday; ?>">
                                    <?php echo $menuday; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-3 col-sm-1">
                        <select name="YearOfAppointment">
                            <option value="default" selected>Année</option>
                            <?php
                            for ($menuyear = date('Y'); $menuyear >= 1900; $menuyear--) {
                                ?>
                                <option value="<?php echo $menuyear; ?>">
                                    <?php echo $menuyear; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="bloc">
                <h2 class="text-center">Donnez votre avis</h2>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Quel type d'accueil avez vous eu ?</label>
                    <div class="col-sm-7 example-01">
                        <input name="ratingwelcome" id="ratingwelcome" value="4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Délai pour avoir un renseignement sur le véhicule :</label>
                    <div class="col-sm-7 example-01">
                        <input name="ratinginformation" id="ratinginformation" value="4">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Avez-vous eu les renseignements souhaités ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="information" id="information" value="option1" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="information" id="information1" value="option2" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Vous a-t-on proposé un essai ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="try" id="try" value="option3" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="try" id="try1" value="option4" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">L'essai était-il sur le véhicule souhaité (motorisation) ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="tryvehicule" id="tryvehicule" value="option5" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="tryvehicule" id="tryvehicule1" value="option6" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Vous a-t-on proposé une solution de financement ?</label>
                    <div class="col-sm-8">
                        <div class="radio-inline">
                            <label>
                                <input name="finance" id="finance" type="radio" data-toggle="collapse" data-target=".collapseOne:not(.in)"/> Oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="finance" type="radio" data-toggle="collapse" data-target=".collapseOne.in" checked=""/> Non
                            </label>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="collapseOne panel-collapse collapse">
                                <label for="" class="col-sm-3 control-label">Si oui, laquelle ?</label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="whatfinance" id="whatfinance" placeholder="" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dans quel mesure conseilleriez-vous votre vendeur ou marchand ?</label>
                    <div class="col-sm-7 example-01">
                        <input id="ratingadvice" value="4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Donnez un conseil à votre professionnel :</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="advicebox" name="advicebox" rows="5" placeholder="Votre message..."></textarea>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
