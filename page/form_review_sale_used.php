<section class="forms">
    <div class="container reviewform">
        <div class="row">
            <div class="col-xs-12 title text-center">
                <h1>Achat d'un véhicule d'occasion - Ajouter un avis</h1>
                <br>
                <p>Merci de remplir le formulaire afin de déposer un avis sur l'achat de votre véhicule. En déposant celui-ci et grâce à l'aide de <strong>CarAdvisor</strong>, vous contribuez grandement à l'amélioration du monde automobile et de ses acteurs. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-sm-offset-2 col-md-3 col-md-offset-3">
                <a href="/?page=form_review_sale_new" ><button type="button" class="btn btn-primary btn-lg btn-block center-block">ACHAT NEUF</button></a>
            </div>
            <div class="col-xs-12 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-0">
                <a href="/?page=form_review_repair"><button type="button" class="btn btn-primary btn-lg btn-block center-block">ENTRETIEN / REPARATION</button></a>
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
                        <div class="col-sm-7">
                            <input id="rating" value="3">
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
                        <div class="col-sm-7">
                            <input name="ratingwelcome" id="ratingwelcome" value="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Délai pour avoir un renseignement sur le véhicule :</label>
                        <div class="col-sm-7">
                            <input name="ratinginformation" id="ratinginformation" value="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Avez-vous eu les renseignements souhaités ?</label>
                        <div class="col-lg-8">
                            <div class="radio-inline">
                                <label>
                                    <input name="information" id="information" value="option1" type="radio">
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
                                    <input name="try" id="try" value="option3" type="radio">
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
                                    <input name="tryvehicule" id="tryvehicule" value="option5" type="radio">
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
                                    <input name="finance" id="finance" type="radio" data-toggle="collapse" data-target=".collapseOne.in" /> Non
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
                        <label class="col-sm-3 control-label">Vous a-t-on proposé une garantie ?</label>
                        <div class="col-sm-8">
                            <div class="radio-inline">
                                <label>
                                    <input name="garanty" id="garanty" type="radio" data-toggle="collapse" data-target=".collapseOne1:not(.in)"/> Oui
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input name="garanty" id="garanty" type="radio" data-toggle="collapse" data-target=".collapseOne1.in" /> Non
                                </label>
                            </div>
                            <div class="panel-group" id="accordion">
                                <div class="collapseOne1 panel-collapse collapse">
                                    <label for="" class="col-sm-3 control-label">Si oui, laquelle ?</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="why" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Dans quel mesure conseilleriez-vous votre vendeur ou marchand ?</label>
                        <div class="col-sm-7">
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
                <div class="form-group required">
                    <div class="col-xs-12 text-center">
                        <label class=" control-label" for="filebutton">Justificatif d'expérience</label>
                    </div>
                    <div class="col-xs-12 text-center">
                        <input id="filebutton" name="filebutton" class="input-file center-block" type="file">
                        <br><span class="help-block">Format de fichier accepté: JPG, PDF</span><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-justify">
                        <div class="checkbox">
                            <label class="agree" for="iagree-0">
                                <input name="iagree" id="iagree-0" value="1" type="checkbox">
                                Je certifie que cet avis reflète ma propre expérience et mon opinion authentique sur ce Garage,
                                que je ne suis pas lié personnellement ni professionnellement à cet établissement et que je n'ai reçu aucune compensation financière ou autre de celui-ci pour écrire cet avis.
                                Je comprends que CarAdvisor applique une politique de tolérance zéro sur les faux avis
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Button - Save review -->
                <div class="form-group required">
                    <label class="control-label" for="saveReviewButton"></label>
                    <div class="col-xs-12">
                        <button id="saveReviewButton" name="saveReviewButton" class="btn btn-primary btn-block center-block" type="submit">Envoyer votre avis</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
