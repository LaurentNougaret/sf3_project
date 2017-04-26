<section class="pro">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="pro_account">ACCES PROFESSIONNELS</h2>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 bloc">
                <form role="form">
                    <h2 class="text-center">Votre profil</h2>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
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
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="profirstname" class="visuallyhidden"></label>
                                <input type="text" name="profirstname" id="profirstname" class="form-control" placeholder="Nom Prestataire">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="proemail" class="visuallyhidden"></label>
                                <input type="email" name="proemail" id="proemail" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="propassword" class="visuallyhidden"></label>
                                <input type="password" name="propassword" id="propassword" class="form-control" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="propasswordconfirmation" class="visuallyhidden"></label>
                                <input type="password" name="propasswordconfirmation" id="propasswordconfirmation" class="form-control" placeholder="Confirmez mot de passe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="proadress" class="visuallyhidden"></label>
                                <input type="text" name="proadress" id="proadress" class="form-control" placeholder="Adresse" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="procity" class="visuallyhidden"></label>
                                <input type="text" name="procity" id="procity" class="form-control " placeholder="Ville" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="propostalcode" class="visuallyhidden"></label>
                                <input type="email" name="propostalcode" id="propostalcode" class="form-control" placeholder="Code postal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="prophone" class="visuallyhidden"></label>
                                <input type="password" name="prophone" id="prophone" class="form-control" placeholder="Telephone fixe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="siret" class="visuallyhidden"></label>
                                <input type="text" name="siret" id="siret" class="form-control" placeholder="N °Siret">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="brand" class="visuallyhidden"></label>
                                <input type="text" name="brand" id="brand" class="form-control" placeholder="Marque">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="prodescription" class="visuallyhidden"></label>
                                <textarea class="form-control" rows="7" id="prodescription" placeholder="Ajouter une description" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 text-center update-photo">
                        <label class=" control-label" for="filebutton">Ajoutez une photo de votre établissement </label>
                        <div>
                            <input id="filebutton" name="filebutton" class="input-file center-block" type="file" accept=".jpg, .png, .jpeg">
                            <br><span class="help-block">Formats de fichiers acceptés: JPG, JPEG, PNG.</span><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary save-pro-btn center-block">Enregistrer</button>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2 text-center delete-pro-account">
                            <p>Pour supprimer votre profil, veuillez cliquer <a href="" data-toggle="modal" data-target="#delete-account">ici.</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include "../inc/modalDeleteAccount.php"?>
