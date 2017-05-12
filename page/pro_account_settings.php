<section class="pro">
    <div class="container">
        <div class="row" id="account-pro-reviews">
            <div class="col-xs-10 col-xs-offset-1">
                <h2 class="text-center">Paramètres</h2>
                <hr class="pro-review-underline">

                <div id="myaccountOptions" class="container color">
                    <!-- Back to previous page -->
                    <div class="row">
                        <div class="col-lg-5">
                            <a href="/?page=pro_account_home">
                                <p><i class="fa fa-angle-double-left" aria-hidden="true"> </i>
                                Revenir à Mon Compte</p><br>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="/?page=pro_change_password">
                                <div class="panel myaccountUserAccessProfile">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <i class="fa fa-key fa-5x" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="announcement-heading"></p>
                                                <p class="announcement-text">Changer mot de passe</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="" data-toggle="modal" data-target="#delete-account">
                                <div class="panel myaccountUserAccessCompanyPage">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <i class="fa fa-trash-o fa-5x" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="announcement-heading"></p>
                                                <p>Supprimer compte</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
</section>
<?php include "../inc/modalDeleteAccount.php"?>
<?php include "../inc/modalChangePassword.php"?>