
<div class="col-12 col-md-4 col-lg-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $content ?>
            </p>
            <div class="d-flex justify-content-between align-items-flex-start">
                <?= $custom ?>
                <div>
                <?= $genres ?>
                </div>
                <div>
                <?= $original_language?>
                </div>
                <div><?= $template ?></div>
                
            </div>
            <div>quantita:<?= $quantity?>prezzo:<?= $price?>
            <?php if($sconto>0){?>  
                prezzo scontato
            <?php }    ?>    
            </div>

        </div>
    </div>
</div>