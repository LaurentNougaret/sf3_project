<section id="account-pro-reviews">
    <div class="container">
                <div class="row" id="account-pro-reviews">
            <div class="col-xs-10 col-xs-offset-1">
                <h3 class="text-center">Les avis</h3>
                <hr>
                <?php foreach ($avis as $key=> $review): ?>
                    <!-- Quote 1 -->
                    <div class="item <?php if ($review['id'] == 1): echo "active"; endif; ?>">
                        <div class="col-xs-12 col-sm-8 col-md-7 review">
                            <h3><?php echo $review['proname'] ?></h3>
                            <p class="text-justify"><?php echo $review['review']; ?></p>
                            <small><?php echo $review['firstname'] . " " . $review['lastname'] . ", " . $review['city']; ?></small>
                        </div>

                        <div class="col-xs-12 col-sm-12">
                            <a data-toggle="collapse" data-target="#answer-pro<?php echo $key; ?>" ><button type="submit" class="btn btn-primary center-block modify-pro-review">Répondre</button></a>
                            <hr>
                            <div id="answer-pro<?php echo $key; ?>" class="collapse">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <div class="form-group">
                                            <label for="comment">Répondre cet avis :</label>
                                            <textarea class="form-control" rows="8" id="comment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Envoyer</button>
                                    </div>
                                </div>
                        </div>
                        </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>