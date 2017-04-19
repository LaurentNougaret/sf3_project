<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 bloc">
            <h3 class="text-center">Vos avis</h3>
            <hr class="colorgraph">
            <?php foreach ($avis as $review): ?>
            <!-- Quote 1 -->
            <div class="item <?php if($review['id']==1): echo "active"; endif; ?>">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-2">
                            <h3><?php echo $review['proname']?></h3>
                            <p class="text-justify"><?php echo $review['review']; ?></p>
                            <small><?php echo $review['firstname'] . " " . $review['lastname'] . ", " . $review['city']; ?></small>
                        </div>
                    </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
