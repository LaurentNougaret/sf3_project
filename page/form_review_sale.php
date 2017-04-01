<form class="form-horizontal formReviewSale">
    <fieldset>
        <!-- Form Name - Sign up form -->
        <legend>Ajouter un avis</legend>

        <!-- Select Type of service -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="dealerType">Type de prestataire</label>
            <div class="col-md-2">
                <select id="dealerType" name="dealerType" class="form-control">
                    <option value="1">Concessionnaire</option>
                    <option value="2">Garagiste</option>
                    <option value="3">Agent</option>
                    <option value="3">Carrosserie</option>
                    <option value="3">Etc</option>
                </select>
            </div>
        </div>

        <!-- Text input - Business Name -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="businessName">Nom</label>
            <div class="col-md-2">
                <input id="businessName" name="businessName" placeholder="Nom de la societè" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input - First Name -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="businessID">"Identifiant" societé</label>
            <div class="col-md-2">
                <input id="businessID" name="businessID" placeholder="SIRET? Dire à l'utilisateur où trouver cet information" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input - E-mail address -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="emailaddress">E-mail</label>
            <div class="col-md-2">
                <input id="emailaddress" name="emailaddress" placeholder="E-mail de l'entreprise" class="form-control input-md" required="" type="email">
            </div>
        </div>

        <!-- Text input - Adresse -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="address">Adresse</label>
            <div class="col-md-2">
                <input id="address" name="address" placeholder="L'adresse de l'entreprise" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Select City -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="selectCity">Ville</label>
            <div class="col-md-2">
                <select id="selectCity" name="selectCity" class="form-control">
                    <option value="Paris">Paris</option>
                    <option value="Lyon">Lyon</option>
                </select>
            </div>
        </div>

        <!-- Select Zip Code -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="selectZipCode">Code Postale</label>
            <div class="col-md-2">
                <select id="selectZipCode" name="selectZipCode" class="form-control">
                    <option value="1">69001</option>
                    <option value="2">69002</option>
                    <option value="3">69003</option>
                </select>
            </div>
        </div>

        <!-- Select Country -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="selectCountry">Pays</label>
            <div class="col-md-2">
                <select id="selectCountry" name="selectCountry" class="form-control">
                    <option value="1">France</option>
                    <option value="2">Suisse</option>
                    <option value="3">Belgique</option>
                    <option value="3">Etc</option>
                </select>
            </div>
        </div>

        <!-- Text input - Telephone number -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="landlineBusiness">Téléphone</label>
            <div class="col-md-2">
                <input id="landlineBusiness" name="landlineBusiness" placeholder="Le numéro de téléphone de l'entreprise" class="form-control input-md" required="" type="tel">

            </div>
        </div>

        <h4>Votre expérience</h4>

        <!-- Rating: Type of transaction - Buying/Selling -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Type de transaction:</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    Achat
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    Vente
                </label>
            </div>
        </div>

        <!-- Select Vehicle -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="selectCity">Véhicule:</label>
            <div class="col-md-2">
                <select id="selectCity" name="selectCity" class="form-control">
                    <option value="Mon vehicule 1">Mon véhicule 1</option>
                    <option value="Mon véhicule 2">Mon véhicule 2</option>
                    <option value="Ajouter un nouveau véhicule">Ajouter un nouveau véhicule</option>
                </select>
            </div>
        </div>

        <!-- Rating: stars -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Votre note globale:</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>

    <h4>Donnez-nous plus de détails. Comment avez vous trouvé:</h4>

        <!-- Rating: detail experience: Welcoming -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">L'accueil</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>
        <!-- Rating: detail experience: Quality of service -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Qualité de la prestation</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>
        <!-- Rating: detail experience: Staff -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Personnel</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>
        <!-- Rating: detail experience: Localization -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Facilité d'access</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>
        <!-- Rating: detail experience: Quality & Price -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Rapport qualité/prix</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>
        <!-- Rating: detail experience: Time -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios">Temps d'execution</label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="oneStar" checked="checked" type="radio">
                    1 étoile
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="twoStar" type="radio">
                    2 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="threeStar" type="radio">
                    3 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fourStar" type="radio">
                    4 étoiles
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="fiveStar" type="radio">
                    5 étoiles
                </label>
            </div>
        </div>

        <!-- Text input - Date of appointment -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="birthday">Date ou duréé de votre expérience</label>
            <div class="col-md-2">
                <input id="birthday" name="birthday" placeholder="Format DD/MM/AAAA" class="form-control input-md" required="" type="date">
                <input id="birthday" name="birthday" placeholder="Duréé de _____ au _______" class="form-control input-md" required="" type="date">
            </div>
        </div>

        <!-- Review box -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="reviewBox">Votre commentaire:</label>
            <div class="col-md-3">
                <textarea class="form-control" id="reviewBox" name="reviewBox">Décrivez votre experience...</textarea>
            </div>
        </div>

        <!-- Add File Button -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="filebutton">Justificatif d'expérience</label>
            <div class="col-md-4">
                <input id="filebutton" name="filebutton" class="input-file" type="file">
                <br><span class="help-block">Format de fichier accepté: JPG, PDF</span><br>
                <small class="help-block">Veuillez vous envoyer une copie de la facture, tickets de caisse, photos ou tous les documents que vous jugez necessaires pour ....<br>
                Ces documents ne seront JAMAIS publiés et seulement la societé prestataire de service y aura access. Ils serviront aussi à ... (securité, fiabilité)<br>
            Pour savoir plus sur notre politique de "certification des avis" (?????), cliquez ici.</small>
            </div>
        </div>

        <!-- Terms of service Checkbox -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="iagree"></label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="iagree-0">
                        <input name="iagree" id="iagree-0" value="1" type="checkbox">
                        Je suis d'accord avec les termes de confidentialité et conditions de service
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