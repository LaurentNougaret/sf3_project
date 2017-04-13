<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 navy3">
            <form role="form">
                <h3>Inscription</h3>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="nom" id="nome" class="form-control input-lg" placeholder="Nom" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="prénom" id="prénom" class="form-control input-lg" placeholder="Prénom" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="4">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirmez mot de passe" tabindex="6">
                        </div>
                    </div>
                </div>

                <!--vehicule 1-->
                <h3>Véhicule n°1</h3>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="marque1" id="marque" class="form-control input-lg" placeholder="Marque" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="modele1" id="modele1" class="form-control input-lg" placeholder="Modéle" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="annee1" id="annee1" class="form-control input-lg" placeholder="Année" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="kilometrage1" id="kilometrage1" class="form-control input-lg" placeholder="Kilométrage" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="immatriculation" id="immatriculation" class="form-control input-lg" placeholder="Immatriculation" tabindex="1">
                        </div>
                    </div>
                </div>

                <!--/ vehicule 1-->

                <!--vehicule 2-->
                <a data-toggle="collapse" data-target="#demo" ><span class="glyphicon glyphicon-plus"></a></span><h3 class="plus">Véhicule n°2</h3>
                <hr class="colorgraph">
                <div id="demo" class="collapse">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="marque2" id="marque2" class="form-control input-lg" placeholder="Marque" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="modele2" id="modele2" class="form-control input-lg" placeholder="Modéle" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="annee2" id="annee2" class="form-control input-lg" placeholder="Année" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="kilometrage2" id="kilometrage2" class="form-control input-lg" placeholder="Kilométrage" tabindex="2">
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="immatriculation" id="immatriculation" class="form-control input-lg" placeholder="Immatriculation" tabindex="1">
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ vehicule 2-->

                <div class="row">
                    <div class="col-xs-8 col-sm-12 col-md-12">
                       En cliquant sur  <strong class="label label-primary">inscription</strong>,vous acceptez les  <a href="#" data-toggle="modal" data-target="#t_and_c_m">Conditions d'utilisation</a> en vigueur sur ce site, y compris notre politique sur les cookies.
                    </div>
                </div>

                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <input type="submit" value="Inscription" class="btn btn-primary btn-block btn-lg" tabindex="7">
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>