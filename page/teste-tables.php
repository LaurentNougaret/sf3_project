<div class="container">
<form action="" method="post" role="form">
<div class="PanelCollection">
    <div class="panel panel-success" id="panel">
        <div class="panel-heading collapseable" data-toggle="collapse" data-target="##QuestionForm">
            <h3 class="panel-title">Donnez votre avis</h3>
        </div>
        <input type="hidden" name="Sme_Product_Number_1" value="" id="Sme_Product_Number_1">
        <div id="QuestionForm" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-12 control-label">
                        <h2 class="test">Répondre les questions suivantes</h2>
                    </label>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th width="80px">QUESTION</th>
                        <th>
                            <input type="hidden" name="tanP1" id="tan" value="">
                        </th>
                        <th>
                            <input type="hidden" name="tanP1" id="tan" value="">
                        </th>
                        <th>
                            <input type="hidden" name="tanP1" id="tan" value="">
                        </th>
                    </tr>
                    <tr id="Qus_1" title="Question 1" data-toggle="popover" data-content="Type de prestataire">
                        <td>Type de prestataire<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group required">

                                <select id="dealerType" name="dealerType" class="form-control required">
                                    <option value="1">Concessionnaire</option>
                                    <option value="2">Garagiste</option>
                                    <option value="3">Agent</option>
                                    <option value="3">Carrosserie</option>
                                    <option value="3">Etc</option>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr id="Qus_2" title="Question 2" data-toggle="popover" data-content="">
                        <td>Nom<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessName" name="businessName" placeholder="Nom de la societè" class="form-control input-md" required="" type="text">
                            </div>
                        </td>
                        <td>"Identifiant" Societé<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessID" name="businessID" placeholder="SIRET?" class="form-control input-md" required="" type="text">
                            </div>
                        </td>
                    </tr>
                    <tr id="Qus_2" title="Question 2" data-toggle="popover" data-content="">
                        <td>Email<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessID" name="businessID" placeholder="E-mail" class="form-control input-md" required="" type="email">
                            </div>
                        </td>
                        <td>Adresse<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessID" name="businessID" placeholder="Adresse" class="form-control input-md" required="" type="text">
                            </div>
                        </td>
                    </tr>
                    <tr id="Qus_2" title="Question 2" data-toggle="popover" data-content="">
                        <td>Ville<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessID" name="businessID" placeholder="Ville" class="form-control input-md" required="" type="text">
                            </div>
                        </td>
                        <td>Code Postale<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <div class="col-md-2">
                                <select id="selectZipCode" name="selectZipCode" class="form-control">
                                    <option value="1">69001</option>
                                    <option value="2">69002</option>
                                    <option value="3">69003</option>
                                </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr id="Qus_2" title="Question 2" data-toggle="popover" data-content="">
                        <td>Pays<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessID" name="businessID" placeholder="Pays" class="form-control input-md" required="" type="email">
                            </div>
                        </td>
                        <td>Téléphone<span style="color:red">*</span>
                        </td>
                        <td>
                            <div class="form-group controls">
                                <input id="businessID" name="businessID" placeholder="Téléphone" class="form-control input-md" required="" type="text">
                            </div>
                        </td>
                    </tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <button type="submit" class="button btn-primary">Submit</button>
</form>
</div>