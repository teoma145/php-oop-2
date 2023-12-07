
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
                <?php
                if (isset($genres)) {
                        echo $genres;
                    }
                ?>
                </div>
                <div>
                <?php
                if (isset($original_language)) {
                        echo $original_language;
                    }
                ?>
                </div>
                <div><?= $template?></div>
                
            </div>
            <div>quantita:<?= $quantity?>prezzo:<?= $price?>
            <?php if($sconto>5){?>  
                prezzo scontato
            <?php }    ?>    
            </div>
            <?php 
            if (isset($error) && $error) {?>
                    <div class="alert alert-danger ">
                    <?= $error?>  
                    </div>
                    <?php }?>
            <div>
            
            </div>

        </div>
    </div>
</div>