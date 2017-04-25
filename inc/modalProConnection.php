<div class="modal fade" id="login-modal-pro" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <p class="modalTitle">Car<span>Advisor</p>
            </div>
            <!-- Begin # DIV Form -->
            <div id="div-pro-forms">
                <!-- Begin # Login Form -->
                <form id="login-pro-form">
                    <div class="modal-body">
                        <label for="login_pro_username" class="visuallyhidden"></label>
                        <input id="login_pro_username" class="form-control" type="text" placeholder="Nom d'utilisateur" required>
                        <label for="login_pro_password" class="visuallyhidden"></label>
                        <input id="login_pro_password" class="form-control" type="password" placeholder="Mot de passe" required>
                        <div class="checkbox text-center">
                            <label>
                                <input type="checkbox">Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <a href="/?page=index"><button type="button" class="btn btn-conn btn-primary btn-lg btn-block">Connexion</button></a>
                        </div>
                        <div class="text-center">
                            <button id="login_pro_lost_btn" type="button" class="btn btn-link">Mot de passe oublié?</button>
                            <a href="/?page=pro_inscription"><button id="login_pro_register_btn" type="button" class="btn btn-link">Inscription</button></a>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-pro-form" style="display:none;">
                    <div class="modal-body">
                        <input id="lost_pro_email" class="form-control" type="text" placeholder="Email" required>
                    </div>
                    <div id="login-pro-btn" class="modal-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-conn">Envoyer</button>
                        </div>
                        <div class="text-center">
                            <button id="lost_pro_login_btn" type="button" class="btn btn-link">Connexion</button>
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
