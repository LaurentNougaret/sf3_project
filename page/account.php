<section id="account">
    <div class="container">
        <div class="row">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2>Votre profil</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2">
                        <a href="/?page=user_account_home">
                            <p><i class="fa fa-angle-double-left" aria-hidden="true"> </i>
                                Revenir à Mon Compte</p><br>
                        </a>
                    </div>
                </div>
        <form role="form" class="info">
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
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary save-account center-block">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php include "../inc/modalDeleteAccount.php"?>
