<section id="account-reviews">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h2 class="text-center">Vos avis</h2>
                <hr>
                <?php foreach ($avis as $review): ?>
                    <!-- Quote 1 -->
                    <div class="item <?php if ($review['id'] == 1): echo "active"; endif; ?>">
                        <div class="col-xs-12 col-sm-7 col-md-7 review">
                            <h3><?php echo $review['proname'] ?></h3>
                            <p class="text-justify"><?php echo $review['review']; ?></p>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2 col-sm-2 col-sm-offset-1">
                            <button id="review_delete_btn" type="button" class="btn btn-primary center-block delete-review">Supprimer</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>