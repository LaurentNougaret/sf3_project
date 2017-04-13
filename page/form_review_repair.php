<div class="container reviewform">
    <div class="row">
        <div class="col-xs-12 col-sm-8 title text-center">
            <h1>Entretien ou réparation d'un véhicule - Ajouter un avis</h1>
            <br>
            <p>Merci de remplir le formulaire afin de déposer un avis sur l'entretien ou la réparation de votre véhicule. En déposant celui-ci et grâce à l'aide de <strong>CarAdvisor</strong>, vous contribuez grandement à l'amélioration du monde automobile et de ses acteurs. </p>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="block-center">
                <a href="/?page=form_review_sale_new" ><button type="button" class="btn btn-primary btn-lg btn-block center-block">ACHAT NEUF</button></a>
            </div>
            <div class="block-center">
                <a href="/?page=form_review_sale_used"><button type="button" class="btn btn-primary btn-lg btn-block center-block">ACHAT OCCASION</button></a>
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
                    <label for="" class="col-xs-12 col-sm-3 control-label">Date de la prise en charge</label>
                    <div class="col-xs-3 col-sm-1">
                        <select name="appointment" id="appointment"">
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
                    <label for="" class="col-sm-3 control-label">Pour quel type d'intervention votre véhicule a été pris en charge ?</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="typeintervention" name="typeintervention" placeholder="Changement de pneus, révision ..." type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Temps d'attente pour avoir un rendez-vous :</label>
                    <div class="col-md-1">
                        <select name="appointment">
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
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Délai de prise en charge de votre véhicule sur place:</label>
                    <div class="col-sm-7 example-01">
                        <input name="ratingdelay" id="ratingdelay" value="3">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Vous a-t-on bien expliqué le type d'intervention que votre véhicule allait subir ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="intervention" id="intervention" value="option1" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="intervention" id="intervention1" value="option2" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Vous a-t-on bien communiqué le montant de l'intervention ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="comunication" id="comuncation" value="option3" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="comunication" id="comunication1" value="option4" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Vous a-t-on fait signer un document pour permettre l'intervention ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="document" id="document" value="option5" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="document" id="document1" value="option6" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">A-t-on bien respecté le devis ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="quotation" id="quotation" value="option7" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="quotation" id="quotation1" value="option8" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Vous a-t-on proposé un véhicule de remplacement ?</label>
                    <div class="col-lg-8">
                        <div class="radio-inline">
                            <label>
                                <input name="replace" id="replace" value="option9" checked="" type="radio">
                                oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="replace" id="replace1" value="option10" type="radio">
                                non
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">A-t-on bien respecté le délai de réparation ?</label>
                    <div class="col-sm-8">
                        <div class="radio-inline">
                            <label>
                                <input name="delayreplace" id="delayreplace" type="radio" data-toggle="collapse" data-target=".collapseOne.in" checked=""/> Oui
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="delayreplace" id="delayreplace1" type="radio" data-toggle="collapse" data-target=".collapseOne:not(.in)"/> Non
                            </label>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="collapseOne panel-collapse collapse">
                                <label for="" class="col-sm-3 control-label">Si non, pourquoi ?</label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="whydelay" id="whydelay" placeholder="" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dans quel état votre véhicule a-t-il été restitué ?</label>
                    <div class="col-sm-7 example-01">
                        <input id="ratingclean" value="3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dans quel mesure conseilleriez-vous votre professionnel ?</label>
                    <div class="col-sm-7 example-01">
                        <input id="ratingadvice" value="3">
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
