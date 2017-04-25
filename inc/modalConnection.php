<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img id="img_logo" src="img/logo/logo.png">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">
                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                        <label for="login_username" class="visuallyhidden"></label>
                        <input id="login_username" class="form-control" type="text" placeholder="Nom d'utilisateur" required>
                        <label for="login_password" class="visuallyhidden"></label>
                        <input id="login_password" class="form-control" type="password" placeholder="Mot de passe" required>
                        <div class="checkbox text-center">
                            <label>
                                <input type="checkbox">Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <a href="/?page=account"><button type="button" class="btn btn-conn btn-primary btn-lg btn-block">Connexion</button></a>
                        </div>
                        <div class="text-center">
                            <button id="login_lost_btn" type="button" class="btn btn-link">Mot de passe oublié?</button>
                            <a href="/?page=inscription"><button id="login_register_btn" type="button" class="btn btn-link">Inscription</button></a>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <label for="lost_email" class="visuallyhidden"></label>
                        <input id="lost_email" class="form-control" type="text" placeholder="Email" required>
                    </div>
                    <div id="login-btn" class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-conn">Envoyer</button>
                        </div>
                        <div class="text-center">
                            <button id="lost_login_btn" type="button" class="btn btn-link">Connexion</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->
            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->