<section id="account-reviews">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h2 class="text-center">Vos avis</h2>
                <hr>
                <!-- Back to main page -->
                <div class="row">
                    <div class="col-lg-5 col-sm-offset-2">
                        <a href="/?page=user_account_home">
                            <p><i class="fa fa-angle-double-left" aria-hidden="true"> </i>
                                Revenir à Mon Compte</p><br>
                        </a>
                    </div>
                </div>
                <?php foreach ($avis as $review): ?>
                    <!-- Quote 1 -->
                    <div class="item <?php if ($review['id'] == 1): echo "active"; endif; ?>">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 review">
                            <h3><?php echo $review['proname'] ?></h3>
                            <p class="text-justify"><?php echo $review['review']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>