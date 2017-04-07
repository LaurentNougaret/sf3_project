<div class="container">
    <div class="newcarReview">
        <h1>Véhicule Neuf - Ajouter un avis</h1>
    </div>
    <br>
    <p>Merci de remplir le formulaire afin de déposer un avis sur l'achat de votre véhicule neuf. En déposant celui-ci et grâce à l'aide de <strong>CarAdvisor</strong>, vous contribuez grandement à l'amélioration du monde automobile et de ses acteurs. </p>
    <!-- Form Name - Add Review -->
    <form action="" method="post" role="form" class="form-horizontal formReviewSale">
        <fieldset>
            <div class="PanelCollection">
                <div class="panel panel-default" id="panel">
                    <div class="panel-heading collapseable" data-toggle="collapse">
                        <h1 class="panel-title">Informations sur l'entreprise</h1>
                    </div>
                    <input type="hidden" name="" value="" id="">
                    <div id="QuestionForm" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <tr id="TypeDePrestataire" title="Type de prestataire">
                                    <td>Type de prestataire<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group required">
                                            <select id="TypePrest" name="TypePrest" class="form-control required">
                                                <option value="1">Concessionnaire</option>
                                                <option value="2">Garagiste</option>
                                                <option value="3">Agent</option>
                                                <option value="3">Carrosserie</option>
                                                <option value="3">Autre</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr id="BusinessName" title="BusinessName">
                                    <td class="tdlabel">Nom<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessName" name="businessName" placeholder="Nom de la societè" class="form-control input-md" required="" type="text">
                                        </div>
                                    </td>
                                    <td class="tdlabel">Numéro SIRET<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessID" name="businessID" placeholder="SIRET" class="form-control input-md" required="" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr id="" title="">
                                    <td class="tdlabel">Email<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessEmail" name="businessEmail" placeholder="E-mail" class="form-control input-md" required="" type="email">
                                        </div>
                                    </td>
                                    <td class="tdlabel">Adresse<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessAdress" name="businessAdress" placeholder="Adresse" class="form-control input-md" required="" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr id="" title="">
                                    <td class="tdlabel">Ville<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="BusinessCity" name="BusinessCity" placeholder="Ville" class="form-control input-md" required="" type="text">
                                        </div>
                                    </td>
                                    <td class="tdlabel">Code Postal<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessZipCode" name="businessZipCode" placeholder="Code postal" class="form-control input-md" required="" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr id="" title="">
                                    <td class="tdlabel">Pays<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessCountry" name="businessCountry" placeholder="Pays" class="form-control input-md" required="" type="email">
                                        </div>
                                    </td>
                                    <td class="tdlabel">Téléphone<span style="color:red">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group controls">
                                            <input class="col-md-11" id="businessPhone" name="businessPhone" placeholder="Téléphone" class="form-control input-md" required="" type="text">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="PanelCollection">
                    <div class="panel panel-default" id="panel">
                        <div class="panel-heading collapseable" data-toggle="collapse" data-target="">
                            <h1 class="panel-title">Votre expérience</h1>
                        </div>
                        <input type="hidden" name="" value="" id="">
                        <div id="QuestionForm" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                </div>
                                <table class="table table-hover table-responsive">
                                    <!-- Type of Vehicle -->
                                    <tr id="TypeOfVehicle" title="Type Of Vehicle">
                                        <td width="200px">Type de véhicule<span style="color:red">*</span>
                                        </td>
                                        <td>
                                            <!-- Select Vehicle -->
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <select id="selectCity" name="selectCity" class="form-control">
                                                        <option value="Mon vehicule 1">Mon véhicule 1</option>
                                                        <option value="Mon véhicule 2">Mon véhicule 2</option>
                                                        <option value="Ajouter un nouveau véhicule">Ajouter un nouveau véhicule</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Global Evaluation -->
                                    <tr id="GlobalRating" title="Global Rating">
                                        <td width="200px">Note globale<span style="color:red">*</span>
                                        </td>
                                        <td>
                                            <!-- Rating: stars -->
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Review's Title -->
                                    <tr id="TitleOfReview" title="Title Of Review">
                                        <td width="200px">Titre<span style="color:red">*</span>
                                        </td>
                                        <td>
                                            <!-- Title box -->
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <input id="Title" name="Title" placeholder="Titre résumant votre avis"
                                                           class="form-control input-md" required="" type="text">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- TextArea - Write your opinion -->
                                    <tr id="WriteOpinion" title="Write Your Opinion">
                                        <td>Votre avis<span style="color:red">*</span>
                                        </td>
                                        <td>
                                            <!-- TextArea - Review box -->
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="reviewBox" name="reviewBox" rows="7" cols="30" placeholder="Décrivez votre experience..."></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Date of appointment -->
                                    <tr id="DateOfAppointment" title="DateOfAppointment">
                                        <td>Date de l'achat<span style="color:red">*</span>
                                        </td>
                                        <td>
                                            <!-- Select Date of appointment -->
                                            <div class="form-group">
                                                <div class="col-md-1">
                                                    <select name="DayOfAppointment">
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
                                                <div class="col-md-1">
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
                                                <div class="col-md-1">
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
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="PanelCollection">
                        <div class="panel panel-default" id="panel">
                            <div class="panel-heading collapseable">
                                <h3 class="panel-title">Donnez votre avis</h3>
                            </div>
                            <input type="hidden" name="" value="" id="">
                            <div id="QuestionForm" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table table-responsive table-hover">
                                        <tr id="SpecificQuestion1" title="Specific Question 1">
                                            <td width="300px">1) Quel type d'accueil avez-vous eu?<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                                                            Horrible
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="twoStar" type="radio">
                                                            Médiocre
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="threeStar" type="radio">
                                                            Moyen
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fourStar" type="radio">
                                                            Très bien
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fiveStar" type="radio">
                                                            Excellent
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr id="SpecificQuestion2" title="Specific Question 1">
                                            <td>2) Temps d'attente pour obtenir un renseignement<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="oneStar" type="radio">
                                                            Horrible
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="twoStar" type="radio">
                                                            Médiocre
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="threeStar" type="radio">
                                                            Moyen
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fourStar" type="radio">
                                                            Très bien
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fiveStar" type="radio">
                                                            Excellent
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="SpecificQuestion3" title="Specific Question 3">
                                            <td>3) Accueil vendeur<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="oneStar" type="radio">
                                                            Horrible
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="twoStar" type="radio">
                                                            Médiocre
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="threeStar" type="radio">
                                                            Moyen
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fourStar" type="radio">
                                                            Très bien
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fiveStar" type="radio">
                                                            Excellent
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="SpecificQuestion4" title="Specific Question 4">
                                            <td>4) Vous a t'on proposé un essai?<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="oneStar" type="radio">
                                                            Oui
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="twoStar" type="radio">
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="SpecificQuestion5" title="Specific Question 5">
                                            <td>5) Est-ce que vous pu essayer le véhicule (motorisation souhaitée)?<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="Yes" type="radio">
                                                            Oui
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="No" type="radio">
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="SpecificQuestion6" title="Specific Question 6">
                                            <td>6) Vous a t'on proposé une solution de financement?<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="Yes" type="radio">
                                                            Oui
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="No" type="radio">
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="SpecificQuestion7" title="Specific Question 7">
                                            <td>7)  Avez-vous obtenu les renseignements que vous souhaitiez?<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="oneStar" type="radio">
                                                            Horrible
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="twoStar" type="radio">
                                                            Médiocre
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="threeStar" type="radio">
                                                            Moyen
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fourStar" type="radio">
                                                            Très bien
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fiveStar" type="radio">
                                                            Excellent
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="SpecificQuestion8" title="Specific Question 8">
                                            <td>8)  Dans quelle mesure conseillerez vous votre vendeur et marchand?<span style="color:red">*</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="oneStar" type="radio">
                                                            Horrible
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="twoStar" type="radio">
                                                            Médiocre
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="threeStar" type="radio">
                                                            Moyen
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fourStar" type="radio">
                                                            Très bien
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="fiveStar" type="radio">
                                                            Excellent
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Add File Button -->
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="filebutton">Justificatif d'expérience</label>
                            <div class="col-md-4">
                                <input id="filebutton" name="filebutton" class="input-file" type="file">
                                <br><span class="help-block">Format de fichier accepté: JPG, PDF</span><br>
                                <small class="help-block"></small> <!-- Explanation about what kind of documents should the client upload -->
                            </div>
                        </div>
                        <!-- Terms of service Checkbox -->
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="iagree"></label>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label for="iagree-0">
                                        <input name="iagree" id="iagree-0" value="1" type="checkbox">
                                         Je certifie que cet avis reflète ma propre expérience et mon opinion authentique sur ce Garage,
                                        que je ne suis pas lié personnellement ni professionnellement à cet établissement et que je n'ai reçu aucune compensation financière ou autre de celui-ci pour écrire cet avis.
                                        Je comprends que CarAdvisor applique une politique de tolérance zéro sur les faux avis
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Button - Save review -->
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="saveReviewButton"></label>
                            <div class="col-md-4">
                                <button id="saveReviewButton" name="saveReviewButton" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>

        </fieldset>
    </form>
</div>
