<section id="info">
    <div class="container">
        <div class="title">
            <h1>Garage Creuzet Automobile</h1>
            <hr>
        </div>
            <div class="col-xs-12 col-sm-7 text-left garage">
                <img class="media-object img-rounded img-responsive"  src="http://i1248.photobucket.com/albums/hh481/ondine3/268cdd2f-a81d-42ee-b7b8-895a091e4b79_zpsk3iuquvw.jpg" alt="Garage" >
                <p class="description">Vente et achat véhicule neuf ou d'occasion, réparation véhicules toutes marques, </p>
                <input id="ratingadvice" value="4">
            </div>
            <div class="col-xs-12 col-sm-5 info">
                <h2>Informations</h2>
                <hr>
                <div class="googlemaps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.07694881635!2d4.84324061556704!3d45.74960327910534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea43d10e82bf%3A0x1ea55f4b5cc17646!2s33+Rue+Creuzet%2C+69007+Lyon!5e0!3m2!1sfr!2sfr!4v1492098930735" width="350" height="300" allowfullscreen></iframe>
                </div>
                <div class="col-xs-6">
                    <p>Adresse : </p>
                    <address>
                        33 rue Creuzet<br>
                        69007  Lyon
                    </address>
                </div>
                <div class="col-xs-6">
                    Horaires:<br>
                    Du lundi au jeudi:<br>
                    8h à 12h | 14h à 19.<br>
                    le vendredi:<br>
                    8h à 12h | 14h à 18h.<br>
                    Le samedi:<br>
                    9h30 à 14h.<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 reviews">
                <h2>Avis</h2>
                <hr class="underline">
                <div class="review">
                    <!-- foreach to get every review about this garage -->
                    <?php foreach ($avis as $review): ?>
                        <div class="row quote">
                            <div class="col-xs-3 text-center">
                                <img class="img-circle img-responsive" src="img/photo_fondateur.png">
                            </div>
                            <div class="col-xs-9">
                                <p class="text-justify"><?php echo $review['review']; ?></p>
                                <small><?php echo $review['firstname'] . " " . $review['lastname'] . ", " . $review['city']; ?></small>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>

    </div>
</section>