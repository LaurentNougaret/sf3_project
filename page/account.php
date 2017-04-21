<section id="account" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <form role="form" class="info">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2>Votre profil</h2>
                    </div>
                </div>
                <hr>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 ">
                    <div class="form-group">
                        <label for="name" class="visuallyhidden"></label>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="Nom" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                    <div class="form-group">
                        <label for="firstname" class="visuallyhidden"></label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                               placeholder="Prénom" tabindex="2">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 ">
                    <div class="form-group">
                        <label for="email" class="visuallyhidden"></label>
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="Email" tabindex="3">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 ">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Mot de passe" tabindex="4">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                    <div class="form-group">
                        <label for="password" class="visuallyhidden"></label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control" placeholder="Confirmez mot de passe"
                               tabindex="5">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 ">
                    <div class="form-group">
                        <label for="adress" class="visuallyhidden"></label>
                        <input type="text" name="adress" id="adress" class="form-control"
                               placeholder="Adresse" tabindex="6">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 ">
                    <div class="form-group">
                        <label for="postalcode" class="visuallyhidden"></label>
                        <input type="text" name="postalcode" id="postalcode" class="form-control"
                               placeholder="Code postal" tabindex="7">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                    <div class="form-group">
                        <label for="city" class="visuallyhidden"></label>
                        <input type="text" name="city" id="city" class="form-control"
                               placeholder="Ville" tabindex="8">
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 ">
                    <div class="form-group">
                        <label for="tel" class="visuallyhidden"></label>
                        <input type="tel" name="tel" id="tel" class="form-control"
                               placeholder="Téléphone" tabindex="9">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 ">
                    <button type="submit" class="btn btn-primary pull-right save-account">Enregistrer</button>
                </div>
                <div class="col-xs-6 ">
                    <button data-toggle="modal" data-target="#delete-account" type="button" class="btn btn-primary delete-account">Supprimer votre profil</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
<?php include "../inc/modalDeleteAccount.php"?>
