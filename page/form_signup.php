<form class="formSignUp form-horizontal">
    <fieldset>
        <!-- Form Name - Sign up form -->
        <legend>Crééz votre compte</legend>

        <!-- Mr or Mrs -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="radios"></label>
            <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                    <input name="radios" id="radios-0" value="monsieur" checked="checked" type="radio">
                    M
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="madame" type="radio">
                    Mme
                </label>
                <label class="radio-inline" for="radios-1">
                    <input name="radios" id="radios-1" value="mlle" type="radio">
                    Mlle
                </label>
            </div>
        </div>

        <!-- Text input - Last Name -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="lastname">Nom</label>
            <div class="col-md-2">
                <input id="lastname" name="lastname" placeholder="Nom" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Text input - First Name -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="firstname">Prénom</label>
            <div class="col-md-2">
                <input id="firstname" name="firstname" placeholder="Votre prénom" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Text input - Birthday -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="birthday">Date de naissance</label>
            <div class="col-md-2">
                <input id="birthday" name="birthday" placeholder="Votre date de naissance" class="form-control input-md" required="" type="date">
                <span class="help-block">Format DD/MM/AAAA</span>
            </div>
        </div>

        <!-- Text input - E-mail address -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="emailaddress">E-mail</label>
            <div class="col-md-2">
                <input id="emailaddress" name="emailaddress" placeholder="E-mail" class="form-control input-md" required="" type="email">
            </div>
        </div>

        <!-- Text input - Mot de passe -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="emailaddress">Crééz votre mot de passe</label>
            <div class="col-md-2">
                <input id="password" name="password" placeholder="Mot de passe" class="form-control input-md" required="" type="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label" for="emailaddress">Répétez mot de passe</label>
            <div class="col-md-2">
                <input id="password" name="password" placeholder="Mot de passe" class="form-control input-md" required="" type="password">
            </div>
        </div>

        <!-- Text input - Adresse -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="address">Adresse</label>
            <div class="col-md-2">
                <input id="address" name="address" placeholder="Votre adresse" class="form-control input-md" required="" type="text">
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

        <!-- Text input - Landline telephone number -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="telephoneHome">Téléphone fixe</label>
            <div class="col-md-2">
                <input id="landline" name="landline" placeholder="Votre numéro de téléphone fixe" class="form-control input-md" required="" type="tel">
            </div>
        </div>

        <!-- Text input - Mobile phone number -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="telephoneMobile">Téléphone portable</label>
            <div class="col-md-2">
                <input id="telephoneMobile" name="telephoneMobile" placeholder="Votre numéro de téléphone portable" class="form-control input-md" required="" type="tel">
            </div>
        </div>

        <!-- Text input - Identifiez votre vehicule -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="immatriculation">Identifiez votre véhicule</label>
            <div class="col-md-2">
                <input id="immatriculation" name="immatriculation" placeholder="Numéro d'immatriculation de votre véhicule" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Terms of service & Newsletter Checkboxes -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="iagree"></label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="iagree-0">
                        <input name="iagree" id="iagree-0" value="1" type="checkbox">
                        Je suis d'accord avec les termes de confidentialité et conditions de service
                    </label>
                </div>
                <div class="checkbox">
                    <label for="iagree-1">
                        <input name="iagree" id="iagree-1" value="2" type="checkbox">
                        Oui, je souhaite m'abonner à la newsletter et recevoir, gratuitement, les ......
                    </label>
                </div>
            </div>
        </div>

        <!-- Button - Save review -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="saveReviewButton"></label>
            <div class="col-md-4">
                <button id="saveReviewButton" name="saveReviewButton" class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </div>
    </fieldset>
</form>
