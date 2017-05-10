<section class="pro">
    <div class="container">
        <div class="row" id="account-pro-reviews">
            <div class="col-xs-12 text-center">
                <h2 class="pro_account">ACCES PROFESSIONNELS</h2>
            </div>
            <div class="col-xs-12">
                <h2 class="text-center">Les Avis</h2>
                <hr class="pro-review-underline">
                <?php foreach ($avis as $key=> $review): ?>
                    <!-- Quote 1 -->
                    <div class="item <?php if ($review['id'] == 1): echo "active"; endif; ?>">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 review">
                            <p class="text-justify"><?php echo $review['review']; ?></p>
                            <small><?php echo $review['firstname'] . " " . $review['lastname'] . ", " . $review['city']; ?></small>
                        </div>
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary center-block modify-pro-review" data-toggle="collapse" data-target="#answer-pro<?php echo $key; ?>">Répondre</button>
                            <hr class="pro-review-underline">
                            <div id="answer-pro<?php echo $key; ?>" class="collapse">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2 pro-answer">
                                    <div class="form-group">
                                        <label for="comment">Répondre à cet avis :</label>
                                        <textarea class="form-control" rows="8" id="comment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default center-block btn-send">Envoyer</button>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>