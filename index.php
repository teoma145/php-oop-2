<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__.'/Views/header.php';
include __DIR__.'/Model/Movie.php';
$movies = Movie::fetchAll();
?>
<section class="container">
    <h2>movies</h2>
    <div class="row">
    <?php foreach($movies as $movie) 
    $movie->printcard($movie->formatCard());
    if($movie->title=='Gunfight at Rio Bravo'){
        $movie-> $sconto= 20;
    }
    echo $movie->$sconto
    ?>
</div>
</section>



<?php
include __DIR__.'/Views/footer.php';
?>

